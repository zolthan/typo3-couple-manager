<?php
namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Sebastian Wilhelm <wilhelm79@web.de>
 */
class ResultTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getPositionReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPosition()
        );
    }

    /**
     * @test
     */
    public function setPositionForIntSetsPosition()
    {
        $this->subject->setPosition(12);

        self::assertAttributeEquals(
            12,
            'position',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getParticipantsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getParticipants()
        );
    }

    /**
     * @test
     */
    public function setParticipantsForIntSetsParticipants()
    {
        $this->subject->setParticipants(12);

        self::assertAttributeEquals(
            12,
            'participants',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartingClassReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStartingClass()
        );
    }

    /**
     * @test
     */
    public function setStartingClassForIntSetsStartingClass()
    {
        $this->subject->setStartingClass(12);

        self::assertAttributeEquals(
            12,
            'startingClass',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartingGroupReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStartingGroup()
        );
    }

    /**
     * @test
     */
    public function setStartingGroupForIntSetsStartingGroup()
    {
        $this->subject->setStartingGroup(12);

        self::assertAttributeEquals(
            12,
            'startingGroup',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCoupleReturnsInitialValueForCouple()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCouple()
        );
    }

    /**
     * @test
     */
    public function setCoupleForObjectStorageContainingCoupleSetsCouple()
    {
        $couple = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple();
        $objectStorageHoldingExactlyOneCouple = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCouple->attach($couple);
        $this->subject->setCouple($objectStorageHoldingExactlyOneCouple);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneCouple,
            'couple',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addCoupleToObjectStorageHoldingCouple()
    {
        $couple = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple();
        $coupleObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $coupleObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($couple));
        $this->inject($this->subject, 'couple', $coupleObjectStorageMock);

        $this->subject->addCouple($couple);
    }

    /**
     * @test
     */
    public function removeCoupleFromObjectStorageHoldingCouple()
    {
        $couple = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple();
        $coupleObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $coupleObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($couple));
        $this->inject($this->subject, 'couple', $coupleObjectStorageMock);

        $this->subject->removeCouple($couple);
    }

    /**
     * @test
     */
    public function getCompetitionReturnsInitialValueForCompetition()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getCompetition()
        );
    }

    /**
     * @test
     */
    public function setCompetitionForObjectStorageContainingCompetitionSetsCompetition()
    {
        $competition = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition();
        $objectStorageHoldingExactlyOneCompetition = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneCompetition->attach($competition);
        $this->subject->setCompetition($objectStorageHoldingExactlyOneCompetition);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneCompetition,
            'competition',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addCompetitionToObjectStorageHoldingCompetition()
    {
        $competition = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition();
        $competitionObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $competitionObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($competition));
        $this->inject($this->subject, 'competition', $competitionObjectStorageMock);

        $this->subject->addCompetition($competition);
    }

    /**
     * @test
     */
    public function removeCompetitionFromObjectStorageHoldingCompetition()
    {
        $competition = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition();
        $competitionObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $competitionObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($competition));
        $this->inject($this->subject, 'competition', $competitionObjectStorageMock);

        $this->subject->removeCompetition($competition);
    }
}
