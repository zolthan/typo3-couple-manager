<?php

namespace SchwarzWeissReutlingen\CoupleManager\Domain\Model;

use DateTime;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/***
 *
 * This file is part of the "Couple Manager" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Sebastian Wilhelm <wilhelm79@web.de>, Schwarz-Weiß Reutlingen e.V.
 *
 ***/

/**
 * Result
 */
class Result extends AbstractEntity
{
    /**
     * date
     *
     * @var DateTime
     */
    protected $date;

    /**
     * discipline
     *
     * @var string
     */
    protected $discipline = '';

    /**
     * startingGroup
     *
     * @var string
     */
    protected $startingGroup = '';

    /**
     * startingClass
     *
     * @var string
     */
    protected $startingClass = '';

    /**
     * position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * participantCount
     *
     * @var int
     */
    protected $participantCount = 0;

    /**
     * promotion
     *
     * @var bool
     */
    protected $promotion = false;

    /**
     * couple
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple>
     * @cascade remove
     * @lazy
     */
    protected $couple;

    /**
     * competition
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition>
     * @cascade remove
     * @lazy
     */
    protected $competition;

    /**
     * competitionType
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType>
     * @cascade remove
     * @lazy
     */
    protected $competitionType;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     */
    protected function initStorageObjects()
    {
        $this->couple = new ObjectStorage();
        $this->competition = new ObjectStorage();
        $this->competitionType = new ObjectStorage();
    }

    /**
     * Returns the date
     *
     * @return DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param DateTime $date
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the discipline
     *
     * @return string $discipline
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * Sets the discipline
     *
     * @param string $discipline
     */
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;
    }

    /**
     * Returns the startingGroup
     *
     * @return string $startingGroup
     */
    public function getStartingGroup()
    {
        return $this->startingGroup;
    }

    /**
     * Sets the startingGroup
     *
     * @param string $startingGroup
     */
    public function setStartingGroup($startingGroup)
    {
        $this->startingGroup = $startingGroup;
    }

    /**
     * Returns the startingClass
     *
     * @return string $startingClass
     */
    public function getStartingClass()
    {
        return $this->startingClass;
    }

    /**
     * Sets the startingClass
     *
     * @param string $startingClass
     */
    public function setStartingClass($startingClass)
    {
        $this->startingClass = $startingClass;
    }

    /**
     * Returns the position
     *
     * @return int $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the position
     *
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Returns the participantCount
     *
     * @return int $participantCount
     */
    public function getParticipantCount()
    {
        return $this->participantCount;
    }

    /**
     * Sets the participantCount
     *
     * @param int $participantCount
     */
    public function setParticipantCount($participantCount)
    {
        $this->participantCount = $participantCount;
    }

    /**
     * Returns the boolean state of promotion
     *
     * @return bool
     */
    public function isPromotion()
    {
        return $this->promotion;
    }

    /**
     * Returns the promotion
     *
     * @return bool $promotion
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Sets the promotion
     *
     * @param bool $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * Adds a Couple
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $couple
     */
    public function addCouple(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $couple)
    {
        $this->couple->attach($couple);
    }

    /**
     * Removes a Couple
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $coupleToRemove The Couple to be removed
     */
    public function removeCouple(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $coupleToRemove)
    {
        $this->couple->detach($coupleToRemove);
    }

    /**
     * Returns the couple
     *
     * @return ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple> $couple
     */
    public function getCouple()
    {
        return $this->couple;
    }

    /**
     * Sets the couple
     *
     * @param ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple> $couple
     */
    public function setCouple(ObjectStorage $couple)
    {
        $this->couple = $couple;
    }

    /**
     * Adds a Competition
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competition
     */
    public function addCompetition(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competition)
    {
        $this->competition->attach($competition);
    }

    /**
     * Removes a Competition
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competitionToRemove The Competition to be removed
     */
    public function removeCompetition(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competitionToRemove)
    {
        $this->competition->detach($competitionToRemove);
    }

    /**
     * Returns the competition
     *
     * @return ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition> $competition
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Sets the competition
     *
     * @param ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition> $competition
     */
    public function setCompetition(ObjectStorage $competition)
    {
        $this->competition = $competition;
    }

    /**
     * Adds a CompetitionType
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType $competitionType
     */
    public function addCompetitionType(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType $competitionType)
    {
        $this->competitionType->attach($competitionType);
    }

    /**
     * Removes a CompetitionType
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType $competitionTypeToRemove The CompetitionType to be removed
     */
    public function removeCompetitionType(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType $competitionTypeToRemove)
    {
        $this->competitionType->detach($competitionTypeToRemove);
    }

    /**
     * Returns the competitionType
     *
     * @return ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType> $competitionType
     */
    public function getCompetitionType()
    {
        return $this->competitionType;
    }

    /**
     * Sets the competitionType
     *
     * @param ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\CompetitionType> $competitionType
     */
    public function setCompetitionType(ObjectStorage $competitionType)
    {
        $this->competitionType = $competitionType;
    }
}
