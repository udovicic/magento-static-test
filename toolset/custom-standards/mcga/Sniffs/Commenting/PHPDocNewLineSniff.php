<?php
/**
 * Tools for static testing Magento code
 * Copyright (C) 2019 Stjepan Udovičić
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
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
