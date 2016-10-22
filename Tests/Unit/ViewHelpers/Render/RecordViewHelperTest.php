<?php
namespace FluidTYPO3\Vhs\Tests\Unit\ViewHelpers\Render;

/*
 * This file is part of the FluidTYPO3/Vhs project under GPLv2 or later.
 *
 * For the full copyright and license information, please read the
 * LICENSE.md file that was distributed with this source code.
 */

use FluidTYPO3\Vhs\Tests\Unit\ViewHelpers\AbstractViewHelperTest;

/**
 * Class RecordViewHelperTest
 */
class RecordViewHelperTest extends AbstractViewHelperTest
{

    /**
     * @test
     */
    public function requiresUid()
    {
        $record = ['hasnouid' => 1];
        $mock = $this->getMockBuilder($this->getViewHelperClassName())->setMethods(['renderRecord'])->getMock();
        $mock->expects($this->never())->method('renderRecord');
        $result = $mock->render($record);
        $this->assertNull($result);
    }

    /**
     * @test
     */
    public function delegatesToRenderRecord()
    {
        $record = ['uid' => 1];
        $mock = $this->getMockBuilder($this->getViewHelperClassName())->setMethods(['renderRecord'])->getMock();
        $mock->expects($this->once())->method('renderRecord')->with($record)->willReturn('rendered');
        $result = $mock->render($record);
        $this->assertEquals('rendered', $result);
    }
}
