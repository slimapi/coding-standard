<?php

declare(strict_types=1);

namespace SlimAPI\Sniffs\TypeHints;

use PHPUnit\Framework\Attributes\DataProvider;
use SlevomatCodingStandard\Sniffs\TestCase;

class DeclareStrictTypesSniffTest extends TestCase
{
    public function testMissingDeclareStrictTypes(): void
    {
        $report = self::checkFile(__DIR__ . '/fixtures/DeclareStrictTypesMissing.php');
        self::assertNoSniffErrorInFile($report);
    }

    #[DataProvider('failingExamples')]
    public function testErrors(string $file): void
    {
        $report = self::checkFile($file);

        self::assertSniffError(
            $report,
            3,
            DeclareStrictTypesSniff::CODE_INCORRECT_WHITESPACE_AROUND_DECLARE,
            'There must be no whitespace around parentheses in declare(strict_types=1);',
        );

        $report->disableCaching();
        $report->fixer->fixFile();

        self::assertStringEqualsFile(
            __DIR__ . '/fixtures/DeclareStrictTypes.fixed.php',
            $report->fixer->getContents(),
        );
    }

    /**
     * @return array<int, array<int,string>>
     */
    public static function failingExamples(): array
    {
        return [
            [__DIR__ . '/fixtures/DeclareStrictTypesA.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesAD.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesAE.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesAF.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesB.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesBD.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesBE.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesBF.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesC.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesCD.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesCE.php'],
            [__DIR__ . '/fixtures/DeclareStrictTypesCF.php'],
        ];
    }
}
