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
    public function getNameManReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNameMan()
        );
    }

    /**
     * @test
     */
    public function setNameManForStringSetsNameMan()
    {
        $this->subject->setNameMan('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nameMan',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNameWomanReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNameWoman()
        );
    }

    /**
     * @test
     */
    public function setNameWomanForStringSetsNameWoman()
    {
        $this->subject->setNameWoman('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nameWoman',
            $this->subject
        );
    }
}
