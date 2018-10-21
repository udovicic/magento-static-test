<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Class MEQP2_Tests_NamingConventions_ReservedWordsUnitTest
 */
class MEQP2_Tests_NamingConventions_ReservedWordsUnitTest extends AbstractSniffUnitTest
{
    /**
     * @inheritdoc
     */
    public function getErrorList()
    {
        return [
            2 => 1,
            4 => 1,
            6 => 1,
            8 => 1,
            10 => 1,
            12 => 1,
            14 => 1,
            16 => 1,
            18 => 1,
            20 => 1,
            22 => 1,
        ];
    }

    /**
     * @inheritdoc
     */
    public function getWarningList()
    {
        return [];
    }
}
