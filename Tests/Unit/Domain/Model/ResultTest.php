<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Domain\Model;

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for the Result domain model.
 */
class ResultTest extends UnitTestCase
{
    /**
     * @var Result
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Result();
    }

    /**
     * @test
     */
    public function getDateReturnsNullInitially(): void
    {
        self::assertNull($this->subject->getDate());
    }

    /**
     * @test
     */
    public function setDateSetsDate(): void
    {
        $date = new \DateTime();
        $this->subject->setDate($date);
        self::assertSame($date, $this->subject->getDate());
    }

    /**
     * @test
     */
    public function disciplineIsEmptyStringInitially(): void
    {
        self::assertSame('', $this->subject->getDiscipline());
    }

    /**
     * @test
     */
    public function setDisciplineSetsDiscipline(): void
    {
        $this->subject->setDiscipline('Standard');
        self::assertSame('Standard', $this->subject->getDiscipline());
    }

    /**
     * @test
     */
    public function setStartingGroupSetsStartingGroup(): void
    {
        $this->subject->setStartingGroup('Hgr II');
        self::assertSame('Hgr II', $this->subject->getStartingGroup());
    }

    /**
     * @test
     */
    public function setStartingClassSetsStartingClass(): void
    {
        $this->subject->setStartingClass('S');
        self::assertSame('S', $this->subject->getStartingClass());
    }

    /**
     * @test
     */
    public function positionIsZeroInitially(): void
    {
        self::assertSame(0, $this->subject->getPosition());
    }

    /**
     * @test
     */
    public function setPositionSetsPosition(): void
    {
        $this->subject->setPosition(3);
        self::assertSame(3, $this->subject->getPosition());
    }

    /**
     * @test
     */
    public function setParticipantCountSetsParticipantCount(): void
    {
        $this->subject->setParticipantCount(42);
        self::assertSame(42, $this->subject->getParticipantCount());
    }

    /**
     * @test
     */
    public function promotionIsFalseInitially(): void
    {
        self::assertFalse($this->subject->getPromotion());
    }

    /**
     * @test
     */
    public function setPromotionSetsPromotion(): void
    {
        $this->subject->setPromotion(true);
        self::assertTrue($this->subject->getPromotion());
    }

    /**
     * @test
     */
    public function coupleIsInitializedAsEmptyObjectStorage(): void
    {
        self::assertEquals(new ObjectStorage(), $this->subject->getCouple());
    }

    /**
     * @test
     */
    public function addCoupleAttachesCouple(): void
    {
        $couple = new Couple();
        $this->subject->addCouple($couple);
        self::assertTrue($this->subject->getCouple()->contains($couple));
    }

    /**
     * @test
     */
    public function removeCoupleDetachesCouple(): void
    {
        $couple = new Couple();
        $this->subject->addCouple($couple);
        $this->subject->removeCouple($couple);
        self::assertFalse($this->subject->getCouple()->contains($couple));
    }

    /**
     * @test
     */
    public function setCoupleReplacesObjectStorage(): void
    {
        $storage = new ObjectStorage();
        $storage->attach(new Couple());
        $this->subject->setCouple($storage);
        self::assertSame($storage, $this->subject->getCouple());
    }

    /**
     * @test
     */
    public function addCompetitionAttachesCompetition(): void
    {
        $competition = new Competition();
        $this->subject->addCompetition($competition);
        self::assertTrue($this->subject->getCompetition()->contains($competition));
    }

    /**
     * @test
     */
    public function addCompetitionTypeAttachesCompetitionType(): void
    {
        $competitionType = new CompetitionType();
        $this->subject->addCompetitionType($competitionType);
        self::assertTrue($this->subject->getCompetitionType()->contains($competitionType));
    }
}
