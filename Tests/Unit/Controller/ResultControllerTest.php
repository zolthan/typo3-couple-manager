<?php
namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Sebastian Wilhelm <wilhelm79@web.de>
 */
class ResultControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SchwarzWeissReutlingen\CoupleManager\Controller\ResultController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\SchwarzWeissReutlingen\CoupleManager\Controller\ResultController::class)
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
    public function listActionFetchesAllResultsFromRepositoryAndAssignsThemToView()
    {

        $allResults = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $resultRepository = $this->getMockBuilder(\SchwarzWeissReutlingen\CoupleManager\Domain\Repository\ResultRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $resultRepository->expects(self::once())->method('findAll')->will(self::returnValue($allResults));
        $this->inject($this->subject, 'resultRepository', $resultRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('results', $allResults);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenResultToView()
    {
        $result = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('result', $result);

        $this->subject->showAction($result);
    }
}
