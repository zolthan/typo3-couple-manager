<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Domain\Model;

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case for the CompetitionType domain model.
 */
class CompetitionTypeTest extends UnitTestCase
{
    /**
     * @var CompetitionType
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new CompetitionType();
    }

    /**
     * @test
     */
    public function setNameSetsName(): void
    {
        $this->subject->setName('Deutsche Meisterschaft');
        self::assertSame('Deutsche Meisterschaft', $this->subject->getName());
    }

    /**
     * @test
     */
    public function setOrganizationSetsOrganization(): void
    {
        $this->subject->setOrganization('DTV');
        self::assertSame('DTV', $this->subject->getOrganization());
    }

    /**
     * @test
     */
    public function optionLabelCombinesNameAndOrganization(): void
    {
        $this->subject->setName('Weltmeisterschaft');
        $this->subject->setOrganization('WDSF');
        self::assertSame('Weltmeisterschaft (WDSF)', $this->subject->getOptionLabel());
    }
}
