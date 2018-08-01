<?php
namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Sebastian Wilhelm <wilhelm79@web.de>
 */
class TournamentControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SchwarzWeissReutlingen\CoupleManager\Controller\TournamentController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\SchwarzWeissReutlingen\CoupleManager\Controller\TournamentController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllTournamentsFromRepositoryAndAssignsThemToView()
    {

        $allTournaments = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $tournamentRepository = $this->getMockBuilder(\SchwarzWeissReutlingen\CoupleManager\Domain\Repository\TournamentRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $tournamentRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTournaments));
        $this->inject($this->subject, 'tournamentRepository', $tournamentRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('tournaments', $allTournaments);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenTournamentToView()
    {
        $tournament = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Tournament();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('tournament', $tournament);

        $this->subject->showAction($tournament);
    }
}
