<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

use SchwarzWeissReutlingen\CoupleManager\Controller\CompetitionController;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for the CompetitionController.
 */
class CompetitionControllerTest extends UnitTestCase
{
    /**
     * @test
     */
    public function showActionAssignsGivenCompetitionToView(): void
    {
        $competition = new Competition();
        $controller = new CompetitionController();

        $view = $this->createMock(ViewInterface::class);
        $view->expects(self::once())->method('assign')->with('competition', $competition);

        $property = new \ReflectionProperty(ActionController::class, 'view');
        $property->setAccessible(true);
        $property->setValue($controller, $view);

        $controller->showAction($competition);
    }
}
