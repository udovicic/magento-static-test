<?php
/**
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Class MEQP1_Tests_SQL_SlowQueryUnitTest
 */
class MEQP1_Tests_SQL_SlowQueryUnitTest extends AbstractSniffUnitTest
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
            7 => 1,
            12 => 1,
            22 => 1,
        ];
    }

    /**
     * @inheritdoc
     */
    public function shouldSkipTest()
    {
         return true;
    }
}
