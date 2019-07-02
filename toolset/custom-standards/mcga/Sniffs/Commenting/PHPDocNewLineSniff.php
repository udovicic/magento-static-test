<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace mcga\Sniffs\Commenting;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

/**
 * Detects PHPDoc formatting for constants.
 */
class PHPDocNewLineSniff implements Sniff
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        return [
            T_DOC_COMMENT_OPEN_TAG
        ];
    }

    /**
     * @inheritDoc
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $searchPtr = $stackPtr;
        $previousNewLine = false;
        while (--$searchPtr) {
            if ($tokens[$searchPtr]['code'] === T_WHITESPACE && $tokens[$searchPtr]['content'] === "\n") {
                // We have found the new line before the DocBlock
                if ($previousNewLine === true) {
                    return;
                } else {
                    $previousNewLine = true;
                }

                continue;
            }

            if ($tokens[$searchPtr]['code'] === T_SEMICOLON) {
                // We have encounter ; before new line
                $phpcsFile->addWarning(
                    'DocBlock and preceding statement must be separated with the new line',
                    $stackPtr,
                    'MissingNewLinePHPDoc'
                );
            }

            if ($tokens[$searchPtr]['code'] !== T_WHITESPACE) {
                // We have found something else, other than ;
                return;
            }
        }
    }
}
