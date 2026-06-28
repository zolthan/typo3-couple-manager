<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Domain\Model;

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for the Competition domain model.
 */
class CompetitionTest extends UnitTestCase
{
    /**
     * @var Competition
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Competition();
    }

    /**
     * @test
     */
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('Landesmeisterschaft');
        self::assertSame('Landesmeisterschaft', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setCitySetsCity(): void
    {
        $this->subject->setCity('Reutlingen');
        self::assertSame('Reutlingen', $this->subject->getCity());
    }

    /**
     * @test
     */
    public function countryIsZeroInitially(): void
    {
        self::assertSame(0, $this->subject->getCountry());
    }

    /**
     * @test
     */
    public function setCountrySetsCountry(): void
    {
        $this->subject->setCountry(54);
        self::assertSame(54, $this->subject->getCountry());
    }

    /**
     * @test
     */
    public function setDateStartSetsDateStart(): void
    {
        $date = new \DateTime('2024-03-01');
        $this->subject->setDateStart($date);
        self::assertSame($date, $this->subject->getDateStart());
    }

    /**
     * @test
     */
    public function organizerIsInitializedAsEmptyObjectStorage(): void
    {
        self::assertEquals(new ObjectStorage(), $this->subject->getOrganizer());
    }

    /**
     * @test
     */
    public function addCategoryAttachesOrganizer(): void
    {
        $organizer = new Organizer();
        $this->subject->addCategory($organizer);
        self::assertTrue($this->subject->getOrganizer()->contains($organizer));
    }

    /**
     * @test
     */
    public function identifierCombinesDateTitleAndCity(): void
    {
        $this->subject->setDateStart(new \DateTime('2024-03-15'));
        $this->subject->setTitle('Gebietsmeisterschaft');
        $this->subject->setCity('Stuttgart');

        self::assertSame('2024-03 - Gebietsmeisterschaft (Stuttgart)', $this->subject->getIdentifier());
    }
}
