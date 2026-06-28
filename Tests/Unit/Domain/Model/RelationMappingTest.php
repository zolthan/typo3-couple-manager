<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\Tests\Unit\Domain\Model;

use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer;
use SchwarzWeissReutlingen\CoupleManager\Domain\Model\Result;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Utility\TypeHandlingUtility;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Regression test for the ObjectStorage relation mapping.
 *
 * Extbase resolves `@var` doc comments without honoring `use` imports. A
 * non-fully-qualified `ObjectStorage<...>` annotation makes
 * TypeHandlingUtility::parseType() throw, which left the data map without a
 * relation element type and made the Results plugin crash with
 * "Oops, an error occurred!" (InvalidRelationConfigurationException) on
 * TYPO3 9.5. The relation @var annotations must therefore stay fully
 * qualified.
 */
class RelationMappingTest extends UnitTestCase
{
    /**
     * @return array<string, array{0: class-string, 1: string, 2: class-string}>
     */
    public function objectStorageRelationProvider(): array
    {
        return [
            'Result.couple' => [Result::class, 'couple', Couple::class],
            'Result.competition' => [Result::class, 'competition', Competition::class],
            'Result.competitionType' => [Result::class, 'competitionType', CompetitionType::class],
            'Competition.organizer' => [Competition::class, 'organizer', Organizer::class],
        ];
    }

    /**
     * @test
     * @dataProvider objectStorageRelationProvider
     */
    public function objectStorageRelationDeclaresParsableElementType(
        string $className,
        string $propertyName,
        string $expectedElementType
    ): void {
        $varType = $this->extractVarType($className, $propertyName);

        // Throws InvalidTypeException for the short-name regression.
        $parsed = TypeHandlingUtility::parseType($varType);

        self::assertSame(
            ObjectStorage::class,
            $parsed['type'],
            sprintf(
                '%s::$%s must use the fully-qualified ObjectStorage type in its @var annotation.',
                $className,
                $propertyName
            )
        );
        self::assertSame($expectedElementType, $parsed['elementType']);
    }

    private function extractVarType(string $className, string $propertyName): string
    {
        $docComment = (new \ReflectionProperty($className, $propertyName))->getDocComment();
        self::assertNotFalse(
            $docComment,
            sprintf('%s::$%s has no doc comment.', $className, $propertyName)
        );
        self::assertSame(
            1,
            preg_match('/@var\s+(\S+)/', $docComment, $matches),
            sprintf('%s::$%s has no @var annotation.', $className, $propertyName)
        );

        return $matches[1];
    }
}
