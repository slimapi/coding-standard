<?php

declare(strict_types=1);

namespace SlimAPI\Sniffs\WhiteSpace;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Checks multiple consecutive newlines in a file.
 * Source: MediaWiki. I didn't want to add dependency to whole package (because of one sniff and without test).
 * @link https://github.com/wikimedia/mediawiki-tools-codesniffer/blob/3d4ac09/MediaWiki/Sniffs/WhiteSpace/MultipleEmptyLinesSniff.php
 */
class MultipleEmptyLinesSniff implements Sniff
{
    public const CODE_MULTIPLE_EMPTY_LINES = 'MultipleEmptyLines';

    /**
     * @return array|mixed[]
     */
    public function register(): array
    {
        return [
            T_WHITESPACE,
        ];
    }

    // phpcs:ignore SlevomatCodingStandard.TypeHints
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($stackPtr > 2
            && $tokens[$stackPtr - 1]['line'] < $tokens[$stackPtr]['line']
            && $tokens[$stackPtr - 2]['line'] === $tokens[$stackPtr - 1]['line']
        ) {
            // This is the first whitespace token on a line
            // and the line before this one is not empty,
            // so this could be the start of a multiple empty line block.

            /** @var int $next */
            $next = $phpcsFile->findNext(T_WHITESPACE, $stackPtr, null, true);
            $lines = $tokens[$next]['line'] - $tokens[$stackPtr]['line'];
            if ($lines > 1) {
                // If the next non T_WHITESPACE token is more than 1 line away,
                // then there were multiple empty lines.
                $error = 'Multiple empty lines should not exist in a row; found %s consecutive empty lines.';
                $fix = $phpcsFile->addFixableError(
                    $error,
                    $stackPtr,
                    self::CODE_MULTIPLE_EMPTY_LINES,
                    [$lines],
                );

                if ($fix) {
                    $phpcsFile->fixer->beginChangeset();
                    $i = $stackPtr;
                    while ($tokens[$i]['line'] !== $tokens[$next]['line']) {
                        $phpcsFile->fixer->replaceToken($i, '');
                        $i++;
                    }
                    $phpcsFile->fixer->addNewlineBefore($i);
                    $phpcsFile->fixer->endChangeset();
                }
            }

            // Skip all whitespace we already checked above
            return $next + 1;
        }
    }
}
