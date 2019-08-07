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
class ConstantsPHPDocFormattingSniff implements Sniff
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        return [
            T_CONST,
            T_STRING
        ];
    }

    /**
     * @inheritDoc
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr]['code'] != T_CONST
            && !($tokens[$stackPtr]['content'] == 'define' && $tokens[$stackPtr+1]['code'] == T_OPEN_PARENTHESIS)
        ) {
            return;
        }

        $constNamePtr = $phpcsFile->findNext(
            ($tokens[$stackPtr]['code'] === T_CONST) ? T_STRING : T_CONSTANT_ENCAPSED_STRING,
            $stackPtr + 1,
            null,
            false,
            null,
            true
        );
        $constName = strtolower(trim($tokens[$constNamePtr]['content'], " '\""));

        $commentStartPtr = $phpcsFile->findPrevious(T_DOC_COMMENT_OPEN_TAG, $stackPtr - 1, null, false, null, true);
        if ($commentStartPtr === false) {
            return;
        }

        $commentCloserPtr = $tokens[$commentStartPtr]['comment_closer'];
        for ($i = $commentStartPtr; $i <= $commentCloserPtr; $i++) {
            $token = $tokens[$i];

            // Not an interesting string
            if ($token['code'] !== T_DOC_COMMENT_STRING) {
                continue;
            }

            // Comment is the same as constant name
            $docComment = trim(strtolower($token['content']), ',.');
            if ($docComment === $constName) {
                continue;
            }

            // Comment is exactly the same as constant name
            $docComment = str_replace(' ', '_', $docComment);
            if ($docComment === $constName) {
                continue;
            }

            // We have found at lease one meaningful line in comment description
            return;
        }

        $phpcsFile->addWarning(
            'Constants must have short description if they add information beyond what the constant name supplies.',
            $stackPtr,
            'MissingConstantPHPDoc'
        );
    }
}
