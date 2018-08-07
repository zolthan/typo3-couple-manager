<?php
namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Sebastian Wilhelm <wilhelm79@web.de>
 */
class CompetitionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDateStartReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDateStart()
        );
    }

    /**
     * @test
     */
    public function setDateStartForDateTimeSetsDateStart()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDateStart($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'dateStart',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDateEndReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getDateEnd()
        );
    }

    /**
     * @test
     */
    public function setDateEndForDateTimeSetsDateEnd()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDateEnd($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'dateEnd',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCountryReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getCountry()
        );
    }

    /**
     * @test
     */
    public function setCountryForIntSetsCountry()
    {
        $this->subject->setCountry(12);

        self::assertAttributeEquals(
            12,
            'country',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCityForStringSetsCity()
    {
        $this->subject->setCity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'city',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAddress()
        );
    }

    /**
     * @test
     */
    public function setAddressForStringSetsAddress()
    {
        $this->subject->setAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'address',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrganizerReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOrganizer()
        );
    }

    /**
     * @test
     */
    public function setOrganizerForStringSetsOrganizer()
    {
        $this->subject->setOrganizer('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'organizer',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getSizeDanceFloorReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getSizeDanceFloor()
        );
    }

    /**
     * @test
     */
    public function setSizeDanceFloorForStringSetsSizeDanceFloor()
    {
        $this->subject->setSizeDanceFloor('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'sizeDanceFloor',
            $this->subject
        );
    }
}
