# SlimAPI Coding Standard
[![PHP Version][img-php-version]][link-packagist]
[![Release][img-release]][link-release]
[![License][img-license]][link-license]
[![Build][img-build]][link-build]
[![Code Coverage][img-coverage]][link-coverage]
[![PHPStan][img-phpstan]][link-phpstan]

PHP coding standard for better code readability, consistency and good programming practises.

* Based on [PSR-1][link-psr-1], [PSR-12][link-psr-12] and [Slevomat Coding Standard][link-slevomat-coding-standard]
* For more details which standards are used, look at [src/ruleset.xml](src/ruleset.xml)
* For full list of sniffs, look at [sniffs.txt](sniffs.txt)

## Code Style Guide
The guide is automatically generated and available at [standard.md](standard.md).

## Local Development & Testing
```bash
$ docker compose up
$ docker compose exec app composer.sh test
```

## License
See [LICENSE][link-license] file for more information.

[link-build]: https://github.com/slimapi/coding-standard/actions
[link-coverage]: https://codecov.io/gh/slimapi/coding-standard
[link-issue-tracker]: https://github.com/slimapi/coding-standard/issues
[link-license]: LICENSE.md
[link-packagist]: https://packagist.org/packages/slimapi/coding-standard
[link-phpstan]: phpstan.neon
[link-psr-12]: https://www.php-fig.org/psr/psr-12/
[link-psr-1]: https://www.php-fig.org/psr/psr-1
[link-release]: https://github.com/slimapi/coding-standard/tags
[link-slevomat-coding-standard]: https://github.com/slevomat/coding-standard/tree/master/SlevomatCodingStandard/Sniffs
[link-slevomat-issue]: https://github.com/slevomat/coding-standard/issues/62
[link-slim]: http://www.slimframework.com

[img-build]: https://img.shields.io/github/actions/workflow/status/slimapi/coding-standard/.github/workflows/ci.yml?branch=master&style=flat-square&label=Build
[img-coverage]: https://img.shields.io/codecov/c/github/slimapi/coding-standard/master?style=flat-square&label=Coverage
[img-license]: https://img.shields.io/github/license/slimapi/coding-standard?style=flat-square&label=License&color=blue
[img-php-version]: https://img.shields.io/packagist/dependency-v/slimapi/coding-standard/php?label=PHP&style=flat-square
[img-phpstan]: https://img.shields.io/badge/style-%208%20%28strict%29-brightgreen.svg?&label=PHPStan&style=flat-square
[img-release]: https://img.shields.io/github/v/tag/slimapi/coding-standard.svg?label=Release&style=flat-square
