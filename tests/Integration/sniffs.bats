#!/usr/bin/env bats

@test "Check there are all required sniffs" {
    expected=$(cat SNIFFS.txt)
    actual=$(./vendor/bin/phpcs --standard=src/ruleset.xml -e)
    diff -u <(echo "$expected") <(echo "$actual")
    [ "$actual" = "$expected" ]
}
