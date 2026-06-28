<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Domain\Model;

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for the Couple domain model.
 */
class CoupleTest extends UnitTestCase
{
    /**
     * @var Couple
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new Couple();
    }

    /**
     * @test
     */
    public function activeCoupleIsTrueInitially(): void
    {
        self::assertTrue($this->subject->isActiveCouple());
    }

    /**
     * @test
     */
    public function hideResultsIsFalseInitially(): void
    {
        self::assertFalse($this->subject->isHideResults());
    }

    /**
     * @test
     */
    public function setHideResultsSetsHideResults(): void
    {
        $this->subject->setHideResults(true);
        self::assertTrue($this->subject->isHideResults());
    }

    /**
     * @test
     */
    public function setShowFutureSetsShowFuture(): void
    {
        $this->subject->setShowFuture(true);
        self::assertTrue($this->subject->isShowFuture());
    }

    /**
     * @test
     */
    public function setManLastNameSetsManLastName(): void
    {
        $this->subject->setManLastName('Müller');
        self::assertSame('Müller', $this->subject->getManLastName());
    }

    /**
     * @test
     */
    public function coupleNameWithBothPartnersAndDifferentLastNames(): void
    {
        $this->subject->setManFirstName('Max');
        $this->subject->setManLastName('Mustermann');
        $this->subject->setWomanFirstName('Erika');
        $this->subject->setWomanLastName('Musterfrau');

        self::assertSame('Max Mustermann & Erika Musterfrau', $this->subject->getCoupleName());
    }

    /**
     * @test
     */
    public function coupleNameWithSharedLastNameIsCondensed(): void
    {
        $this->subject->setManFirstName('Max');
        $this->subject->setManLastName('Mustermann');
        $this->subject->setWomanFirstName('Erika');
        $this->subject->setWomanLastName('Mustermann');

        self::assertSame('Max & Erika Mustermann', $this->subject->getCoupleName());
    }

    /**
     * @test
     */
    public function coupleNameWithoutWomanIsMarkedSolo(): void
    {
        $this->subject->setManFirstName('Max');
        $this->subject->setManLastName('Mustermann');

        self::assertSame('Max Mustermann (Solo)', $this->subject->getCoupleName());
    }

    /**
     * @test
     */
    public function coupleNameWithoutManIsMarkedSolo(): void
    {
        $this->subject->setWomanFirstName('Erika');
        $this->subject->setWomanLastName('Musterfrau');

        self::assertSame('Erika Musterfrau (Solo)', $this->subject->getCoupleName());
    }
}
