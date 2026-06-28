<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

use SchwarzWeissReutlingen\CoupleManager\Controller\ResultController;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for the ResultController.
 */
class ResultControllerTest extends UnitTestCase
{
    /**
     * @test
     */
    public function showActionAssignsGivenResultToView(): void
    {
        $result = new Result();
        $controller = new ResultController();

        $view = $this->createMock(ViewInterface::class);
        $view->expects(self::once())->method('assign')->with('result', $result);

        $property = new \ReflectionProperty(ActionController::class, 'view');
        $property->setAccessible(true);
        $property->setValue($controller, $view);

        $controller->showAction($result);
    }
}
