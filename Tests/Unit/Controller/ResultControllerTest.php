<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

use SchwarzWeissReutlingen\CoupleManager\Controller\ResultController;
use PHPUnit\Framework\Attributes\Test;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository;
use TYPO3\CMS\Core\Http\ResponseFactory;
use TYPO3\CMS\Core\Http\StreamFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3Fluid\Fluid\View\ViewInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for the ResultController.
 */
class ResultControllerTest extends UnitTestCase
{
    #[Test]
    public function showActionAssignsGivenResultToView(): void
    {
        $result = new Result();
        $controller = new ResultController($this->createMock(CoupleRepository::class), $this->createMock(ResultRepository::class));

        $view = $this->createMock(ViewInterface::class);
        $view->method('render')->willReturn('');
        $view->expects(self::once())->method('assign')->with('result', $result);

        $property = new \ReflectionProperty(ActionController::class, 'view');
        $property->setAccessible(true);
        $property->setValue($controller, $view);
        $controller->injectResponseFactory(new ResponseFactory());
        $controller->injectStreamFactory(new StreamFactory());

        $controller->showAction($result);
    }
}
