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
    public function getStartingClassLatinReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStartingClassLatin()
        );
    }

    /**
     * @test
     */
    public function setStartingClassLatinForIntSetsStartingClassLatin()
    {
        $this->subject->setStartingClassLatin(12);

        self::assertAttributeEquals(
            12,
            'startingClassLatin',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStartingClassStandardReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getStartingClassStandard()
        );
    }

    /**
     * @test
     */
    public function setStartingClassStandardForIntSetsStartingClassStandard()
    {
        $this->subject->setStartingClassStandard(12);

        self::assertAttributeEquals(
            12,
            'startingClassStandard',
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
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }
}
