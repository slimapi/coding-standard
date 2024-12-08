# ✅ SlimAPI Coding Standard
[![PHP Version][img-php-version]][link-packagist]
[![Release][img-release]][link-release]
[![License][img-license]][link-license]
[![Build][img-build]][link-build]
[![Code Coverage][img-coverage]][link-coverage]
[![PHPStan][img-phpstan]][link-phpstan]

A PHP coding standard for better code **readability**, **consistency**, and adherence to **best practices**.

## ✨ Features

- **Modern Standards**: Built on [PER Coding Style 2.0][link-per] and [Slevomat Coding Standard][link-slevomat-coding-standard].
- **Customizable Rules**: Check the [ruleset.xml](src/ruleset.xml) for details on the applied standards.
- **Full Sniff List**: Explore the [sniffs list](SNIFFS.txt) for a comprehensive overview.

## 📘 Documentation

Dive into our [Code Style Guide](STANDARD.md) for a detailed explanation of our coding practices.

## 📦 Installation

1. Add the dependency to your project:
    ```bash
    composer require --dev slimapi/coding-standard
    ```
2. Create a `phpcs.yml` file in the project root:
    ```xml
    <ruleset name="PHP_CodeSniffer">
        <rule ref="./vendor/slimapi/coding-standard/src/ruleset.xml"/>
        <file>src</file>
    </ruleset>
    ```

## 🛠️ Local Development & Testing
Clone the repo, then use the power of `make` to simplify your workflow:

```bash
make help  # See all available commands
make run   # Start the app container
make test  # Run tests and code checkers
```


## 📜 License

This project is licensed under the terms specified in the [LICENSE][link-license] file.

## 🌟 Get Involved

We welcome contributions and suggestions! Please report any issues in the [issue tracker][link-issue-tracker].

[link-build]: https://github.com/slimapi/coding-standard/actions
[link-coverage]: https://codecov.io/gh/slimapi/coding-standard
[link-issue-tracker]: https://github.com/slimapi/coding-standard/issues
[link-license]: LICENSE.md
[link-packagist]: https://packagist.org/packages/slimapi/coding-standard
[link-phpstan]: phpstan.neon
[link-per]: https://www.php-fig.org/per/coding-style/
[link-release]: https://github.com/slimapi/coding-standard/tags
[link-slevomat-coding-standard]: https://github.com/slevomat/coding-standard/tree/master/SlevomatCodingStandard/Sniffs

[img-build]: https://img.shields.io/github/actions/workflow/status/slimapi/coding-standard/.github/workflows/ci.yml?branch=master&style=flat-square&label=Build
[img-coverage]: https://img.shields.io/codecov/c/github/slimapi/coding-standard/master?style=flat-square&label=Coverage
[img-license]: https://img.shields.io/github/license/slimapi/coding-standard?style=flat-square&label=License&color=blue
[img-php-version]: https://img.shields.io/packagist/dependency-v/slimapi/coding-standard/php?label=PHP&style=flat-square
[img-phpstan]: https://img.shields.io/badge/style-%209%20%28strict%29-brightgreen.svg?&label=PHPStan&style=flat-square
[img-release]: https://img.shields.io/github/v/tag/slimapi/coding-standard.svg?label=Release&style=flat-square
