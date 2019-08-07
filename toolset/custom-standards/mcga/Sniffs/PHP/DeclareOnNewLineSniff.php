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

namespace mcga\Sniffs\PHP;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

/**
 * Enforces declare strict types to be on line of its own
 */
class DeclareOnNewLineSniff implements Sniff
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        return [
            T_DECLARE
        ];
    }

    /**
     * @inheritDoc
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr + 2]['code'] !== T_STRING || $tokens[$stackPtr + 2]['content'] !== 'strict_types' ) {
            return;
        }

        if ($stackPtr >= 2 && $tokens[$stackPtr - 2]['code'] === T_OPEN_TAG) {
            return;
        }

        $phpcsFile->addWarning(
            'declare(strict_types) must have one empty line between <?php and itself',
            $stackPtr,
            'declareNewLineMissing'
        );
    }
}
