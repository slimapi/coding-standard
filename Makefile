MIN_MAKE_VERSION := 3.81

ifneq ($(MIN_MAKE_VERSION),$(firstword $(sort $(MAKE_VERSION) $(MIN_MAKE_VERSION))))
$(error GNU Make $(MIN_MAKE_VERSION) or higher required)
endif

.DEFAULT_GOAL:=help

ROOT_DIR := $(dir $(realpath $(lastword $(MAKEFILE_LIST))))
EXEC := docker compose exec app

##@ Init
.PHONY: run

run: ## Start the app container in attached mode.
	@docker compose up --always-recreate-deps --build --force-recreate

##@ Development
.PHONY: test ec cs cbf stan unit cov bash

test: bats ec cs stan cov ## Execute all checkers and tests

bats: ## Run BATS (Bash Automated Testing System)
	@$(EXEC) bats tests/Integration

ec: ## Run EC (EditorConfig Checker)
	@$(EXEC) ec

cs: ## Run PHP Coding Standards Checker
	@$(EXEC) phpcs

cbf: ## Run PHP Coding Standards Fixer
	@$(EXEC) phpcbf

stan: ## Run PHPStan (PHP Static Analysis Tool)
	@$(EXEC) phpstan

unit: ## Run PHPUnit tests
	@$(EXEC) phpunit --no-coverage

cov: ## Run PHPUnit tests with code coverage
	@$(EXEC) phpunit
	@echo "\nLOCATION: $(ROOT_DIR)public/coverage/index.html"

bash: ## Access the application container’s shell
	@$(EXEC) bash

##@ Documentation
.PHONY: doc sniffs

doc: ## Generate Code Style Guide (STANDARD.md)
	@$(EXEC) phpcs --generator=Markdown > STANDARD.md

sniffs: ## Generate list of all used Sniffs (SNIFFS.txt)
	@$(EXEC) phpcs -e > SNIFFS.txt

.PHONY: help
help:
	@awk 'BEGIN {FS = ":.*##"; printf "Usage: make \033[36mTARGET [ARG...]\033[0m\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-25s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' $(MAKEFILE_LIST)
