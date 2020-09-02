<?php

declare(strict_types=1);

namespace SlimAPI\Tests\Functional\Sniffs\TypeHints;

use Exception;
use SlimAPI\Sniffs\TypeHints\DeclareStrictTypesSniff;
use SlimAPI\Tests\Functional\TestCase;

class DeclareStrictTypesSniffTest extends TestCase
{
    public function testMissingDeclareStrictTypes(): void
    {
        $report = self::checkFile(__DIR__ . '/fixtures/DeclareStrictTypesMissing.php', ['enabled' => true]);
        self::assertNoSniffErrorInFile($report);
    }

    /**
     * @dataProvider failingExamples
     * @param string $file
     * @throws Exception
     */
    public function testErrors(string $file): void
    {
        $report = self::checkFile($file, ['enabled' => true]);

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

    public function failingExamples(): array
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
