<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

use SchwarzWeissReutlingen\CoupleManager\Controller\CoupleController;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
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

        $controller = new CoupleController();

        $view = $this->createMock(ViewInterface::class);
        $view->expects(self::exactly(3))
            ->method('assign')
            ->withConsecutive(
                ['couple', $couple],
                ['results', []],
                ['futureTournaments', []]
            );

        $property = new \ReflectionProperty(ActionController::class, 'view');
        $property->setAccessible(true);
        $property->setValue($controller, $view);

        $controller->detailAction($couple);
    }
}
