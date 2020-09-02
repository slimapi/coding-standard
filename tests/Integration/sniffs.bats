#!/usr/bin/env bats

@test "Check there are all required sniffs" {
    expected=$(cat sniffs.txt)
    actual=$(./vendor/bin/phpcs --standard=src/ruleset.xml -e)
    diff -u <(echo "$actual") <(echo "$expected")
    [ "$actual" = "$expected" ]
}
