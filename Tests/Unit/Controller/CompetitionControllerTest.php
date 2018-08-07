<?php
namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Sebastian Wilhelm <wilhelm79@web.de>
 */
class CompetitionControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SchwarzWeissReutlingen\CoupleManager\Controller\CompetitionController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\SchwarzWeissReutlingen\CoupleManager\Controller\CompetitionController::class)
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
    public function listActionFetchesAllCompetitionsFromRepositoryAndAssignsThemToView()
    {

        $allCompetitions = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $competitionRepository = $this->getMockBuilder(\SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CompetitionRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $competitionRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCompetitions));
        $this->inject($this->subject, 'competitionRepository', $competitionRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('competitions', $allCompetitions);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCompetitionToView()
    {
        $competition = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('competition', $competition);

        $this->subject->showAction($competition);
    }
}
