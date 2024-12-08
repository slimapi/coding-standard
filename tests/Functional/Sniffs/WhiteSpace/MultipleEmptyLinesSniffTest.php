<?php

declare(strict_types=1);

namespace SlimAPI\Sniffs\WhiteSpace;

use SlevomatCodingStandard\Sniffs\TestCase;

class MultipleEmptyLinesSniffTest extends TestCase
{
    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/fixtures/MultipleEmptyLines.php');

        self::assertSame(3, $report->getErrorCount());

        self::assertNoSniffError($report, 1);
        self::assertNoSniffError($report, 2);
        self::assertNoSniffError($report, 3);
        self::assertNoSniffError($report, 4);

        self::assertSniffError(
            $report,
            8,
            MultipleEmptyLinesSniff::CODE_MULTIPLE_EMPTY_LINES,
            'Multiple empty lines should not exist in a row; found 2 consecutive empty lines.',
        );

        self::assertSniffError(
            $report,
            12,
            MultipleEmptyLinesSniff::CODE_MULTIPLE_EMPTY_LINES,
            'Multiple empty lines should not exist in a row; found 2 consecutive empty lines.',
        );

        self::assertSniffError(
            $report,
            22,
            MultipleEmptyLinesSniff::CODE_MULTIPLE_EMPTY_LINES,
            'Multiple empty lines should not exist in a row; found 3 consecutive empty lines.',
        );

        self::assertAllFixedInFile($report);
    }
}
