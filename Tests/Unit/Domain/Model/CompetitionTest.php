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
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
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
    public function getTypeReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForIntSetsType()
    {
        $this->subject->setType(12);

        self::assertAttributeEquals(
            12,
            'type',
            $this->subject
        );
    }
}
