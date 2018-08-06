<?php
namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Sebastian Wilhelm <wilhelm79@web.de>
 */
class CoupleTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getManLastNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getManLastName()
        );
    }

    /**
     * @test
     */
    public function setManLastNameForStringSetsManLastName()
    {
        $this->subject->setManLastName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'manLastName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getManFirstNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getManFirstName()
        );
    }

    /**
     * @test
     */
    public function setManFirstNameForStringSetsManFirstName()
    {
        $this->subject->setManFirstName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'manFirstName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getWomanLastNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWomanLastName()
        );
    }

    /**
     * @test
     */
    public function setWomanLastNameForStringSetsWomanLastName()
    {
        $this->subject->setWomanLastName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'womanLastName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getWomanFirstNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getWomanFirstName()
        );
    }

    /**
     * @test
     */
    public function setWomanFirstNameForStringSetsWomanFirstName()
    {
        $this->subject->setWomanFirstName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'womanFirstName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartingClassReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStartingClass()
        );
    }

    /**
     * @test
     */
    public function setStartingClassForStringSetsStartingClass()
    {
        $this->subject->setStartingClass('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'startingClass',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartingGroupReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStartingGroup()
        );
    }

    /**
     * @test
     */
    public function setStartingGroupForStringSetsStartingGroup()
    {
        $this->subject->setStartingGroup('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'startingGroup',
            $this->subject
        );
    }
}
