<?php
namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Sebastian Wilhelm <wilhelm79@web.de>
 */
class CoupleControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SchwarzWeissReutlingen\CoupleManager\Controller\CoupleController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\SchwarzWeissReutlingen\CoupleManager\Controller\CoupleController::class)
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
    public function listActionFetchesAllCouplesFromRepositoryAndAssignsThemToView()
    {

        $allCouples = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $coupleRepository = $this->getMockBuilder(\SchwarzWeissReutlingen\CoupleManager\Domain\Repository\CoupleRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $coupleRepository->expects(self::once())->method('findAll')->will(self::returnValue($allCouples));
        $this->inject($this->subject, 'coupleRepository', $coupleRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('couples', $allCouples);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenCoupleToView()
    {
        $couple = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('couple', $couple);

        $this->subject->showAction($couple);
    }
}
