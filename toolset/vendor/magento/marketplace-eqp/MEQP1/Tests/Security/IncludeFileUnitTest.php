<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Class MEQP1_Tests_Security_IncludeFileUnitTest
 */
class MEQP1_Tests_Security_IncludeFileUnitTest extends AbstractSniffUnitTest
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
            7 => 1,
            9 => 1,
            10 => 1,
            12 => 1,
            13 => 1,
            15 => 1,
            17 => 1,
            23 => 1,
            24 => 1,
            28 => 1,
            34 => 1,
        ];
    }
}
