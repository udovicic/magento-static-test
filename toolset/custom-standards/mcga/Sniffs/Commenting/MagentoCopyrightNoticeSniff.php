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
 * Requires removal of original copyright notice when copy files over.
 */
class MagentoCopyrightNoticeSniff implements Sniff
{

    public function register()
    {
        return [
            T_DOC_COMMENT_STRING
        ];
    }


    /**
     * @inheritDoc
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $commentLine = strtolower($tokens[$stackPtr]['content']);

        if (strpos($commentLine, 'copyright') === false) {
            return;
        }

        if (strpos($commentLine, 'magento') === false) {
            return;
        }

        $phpcsFile->addWarning(
            'Original Magento copyright notice must be removed',
            $stackPtr,
            'InvalidCopyrightNotice'
        );
    }
}
