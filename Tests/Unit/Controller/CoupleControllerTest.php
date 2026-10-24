<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

use SchwarzWeissReutlingen\CoupleManager\Controller\CoupleController;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository;
use SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository;
use TYPO3\CMS\Core\Http\ResponseFactory;
use TYPO3\CMS\Core\Http\StreamFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3Fluid\Fluid\View\ViewInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for the CoupleController.
 */
class CoupleControllerTest extends UnitTestCase
{
    /**
     * For a couple that hides its results, detailAction must not query the
     * repository and assigns the couple plus an empty results set.
     *
     * @test
     */
    public function detailActionAssignsCoupleAndEmptyResultsWhenResultsAreHidden(): void
    {
        $couple = new Couple();
        $couple->setHideResults(true);

        $controller = new CoupleController($this->createMock(CoupleRepository::class), $this->createMock(ResultRepository::class));

        $assigned = [];
        $view = $this->createMock(ViewInterface::class);
        $view->expects(self::exactly(3))
            ->method('assign')
            ->willReturnCallback(static function (string $key, mixed $value) use (&$assigned, $view): ViewInterface {
                $assigned[$key] = $value;

                return $view;
            });

        $property = new \ReflectionProperty(ActionController::class, 'view');
        $property->setAccessible(true);
        $property->setValue($controller, $view);
        $controller->injectResponseFactory(new ResponseFactory());
        $controller->injectStreamFactory(new StreamFactory());

        $controller->detailAction($couple);

        self::assertSame(['couple' => $couple, 'results' => [], 'futureTournaments' => []], $assigned);
    }
}
