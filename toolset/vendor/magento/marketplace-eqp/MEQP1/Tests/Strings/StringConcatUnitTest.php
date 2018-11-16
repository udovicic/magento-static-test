<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Class MEQP1_Tests_Strings_StringConcatUnitTest
 */
class MEQP1_Tests_Strings_StringConcatUnitTest extends AbstractSniffUnitTest
{
    /**
     * @inheritdoc
     */
    public function getErrorList()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function getWarningList()
    {
        return [
            3 => 1,
            4 => 1,
            6 => 1,
            10 => 1,
            11 => 1,
            15 => 1,
        ];
    }
}
