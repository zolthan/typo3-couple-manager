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
use TYPO3\CMS\Extbase\Persistence\Generic\Qom\AndInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
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

    #[Test]
    public function listSuccessActionSkipsResultsWithoutParticipantCount(): void
    {
        $upperQuarter = new Result();
        $upperQuarter->setPosition(4);
        $upperQuarter->setParticipantCount(20);
        $withoutParticipants = new Result();
        $withoutParticipants->setPosition(4);
        $withoutParticipants->setParticipantCount(0);

        $queryResult = $this->createMock(QueryResultInterface::class);
        $queryResult->method('toArray')->willReturnOnConsecutiveCalls([], [], [], [$upperQuarter, $withoutParticipants]);
        $constraint = $this->createMock(ConstraintInterface::class);
        $query = $this->createMock(QueryInterface::class);
        foreach (['equals', 'in', 'lessThanOrEqual', 'greaterThan'] as $method) {
            $query->method($method)->willReturn($constraint);
        }
        $query->method('logicalAnd')->willReturn($this->createMock(AndInterface::class));
        $query->method('setOrderings')->willReturnSelf();
        $query->method('matching')->willReturnSelf();
        $query->method('execute')->willReturn($queryResult);
        $resultRepository = $this->createMock(ResultRepository::class);
        $resultRepository->method('createQuery')->willReturn($query);
        $controller = new ResultController($this->createMock(CoupleRepository::class), $resultRepository);

        $assigned = [];
        $view = $this->createMock(ViewInterface::class);
        $view->method('render')->willReturn('');
        $view->method('assign')->willReturnCallback(function (string $key, mixed $value) use (&$assigned, $view) {
            $assigned[$key] = $value;
            return $view;
        });

        $property = new \ReflectionProperty(ActionController::class, 'view');
        $property->setValue($controller, $view);
        $property = new \ReflectionProperty(ActionController::class, 'settings');
        $property->setValue($controller, []);
        $controller->injectResponseFactory(new ResponseFactory());
        $controller->injectStreamFactory(new StreamFactory());

        $controller->listSuccessAction();

        self::assertSame([$upperQuarter], $assigned['goodOnes']);
    }
}
