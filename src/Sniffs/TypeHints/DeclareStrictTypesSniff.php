<?php

declare(strict_types=1);

namespace SlimAPI\Sniffs\TypeHints;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\TokenHelper;

/**
 * Checks whitespace around parentheses in construct declare(strict_types=1);
 * @link https://github.com/squizlabs/PHP_CodeSniffer/pull/1682
 */
class DeclareStrictTypesSniff implements Sniff
{
    public const CODE_INCORRECT_WHITESPACE_AROUND_DECLARE = 'IncorrectWhitespaceAroundDeclare';

    /**
     * @return array|mixed[]
     */
    public function register(): array
    {
        return [
            T_OPEN_TAG,
        ];
    }

    /**
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     * @param File $phpcsFile
     * @param int $openTagPointer
     */
    public function process(File $phpcsFile, $openTagPointer): void
    {
        $declarePointer = TokenHelper::findNext($phpcsFile, T_DECLARE, $openTagPointer);
        if ($declarePointer === null) {
            return; // missing `declare` construct, will catch SlevomatCodingStandard.TypeHints.DeclareStrictTypes
        }

        $semicolonPointer = TokenHelper::findNext($phpcsFile, T_SEMICOLON, $declarePointer);
        $strictTypesContent = TokenHelper::getContent($phpcsFile, $declarePointer, $semicolonPointer);
        $match = preg_match('/declare\(strict_types\s*=\s*1\);/i', $strictTypesContent);
        if ($match !== 1) {
            $format = 'declare(strict_types=1);';

            $fix = $phpcsFile->addFixableError(
                "There must be no whitespace around parentheses in $format",
                $declarePointer,
                self::CODE_INCORRECT_WHITESPACE_AROUND_DECLARE,
            );

            if ($fix) {
                $phpcsFile->fixer->beginChangeset();
                for ($i = $declarePointer; $i <= $semicolonPointer; $i++) {
                    $phpcsFile->fixer->replaceToken($i, '');
                }

                $phpcsFile->fixer->addContentBefore($declarePointer, $format);
                $phpcsFile->fixer->endChangeset();
            }
        }
    }
}
