<?php
namespace SchwarzWeissReutlingen\CoupleManager\Domain\Model;

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
class Result extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * position
     *
     * @var int
     */
    protected $position = 0;

    /**
     * participants
     *
     * @var int
     */
    protected $participants = 0;

    /**
     * startingClass
     *
     * @var int
     */
    protected $startingClass = 0;

    /**
     * startingGroup
     *
     * @var int
     */
    protected $startingGroup = 0;

    /**
     * couple
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple>
     * @cascade remove
     * @lazy
     */
    protected $couple = null;

    /**
     * competition
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition>
     * @cascade remove
     * @lazy
     */
    protected $competition = null;

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
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->couple = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->competition = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Returns the participants
     *
     * @return int $participants
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Sets the participants
     *
     * @param int $participants
     * @return void
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
    }

    /**
     * Returns the startingClass
     *
     * @return int $startingClass
     */
    public function getStartingClass()
    {
        return $this->startingClass;
    }

    /**
     * Sets the startingClass
     *
     * @param int $startingClass
     * @return void
     */
    public function setStartingClass($startingClass)
    {
        $this->startingClass = $startingClass;
    }

    /**
     * Returns the startingGroup
     *
     * @return int $startingGroup
     */
    public function getStartingGroup()
    {
        return $this->startingGroup;
    }

    /**
     * Sets the startingGroup
     *
     * @param int $startingGroup
     * @return void
     */
    public function setStartingGroup($startingGroup)
    {
        $this->startingGroup = $startingGroup;
    }

    /**
     * Adds a Couple
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $couple
     * @return void
     */
    public function addCouple(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $couple)
    {
        $this->couple->attach($couple);
    }

    /**
     * Removes a Couple
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $coupleToRemove The Couple to be removed
     * @return void
     */
    public function removeCouple(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple $coupleToRemove)
    {
        $this->couple->detach($coupleToRemove);
    }

    /**
     * Returns the couple
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple> $couple
     */
    public function getCouple()
    {
        return $this->couple;
    }

    /**
     * Sets the couple
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Couple> $couple
     * @return void
     */
    public function setCouple(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $couple)
    {
        $this->couple = $couple;
    }

    /**
     * Adds a Competition
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competition
     * @return void
     */
    public function addCompetition(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competition)
    {
        $this->competition->attach($competition);
    }

    /**
     * Removes a Competition
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competitionToRemove The Competition to be removed
     * @return void
     */
    public function removeCompetition(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition $competitionToRemove)
    {
        $this->competition->detach($competitionToRemove);
    }

    /**
     * Returns the competition
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition> $competition
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * Sets the competition
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Competition> $competition
     * @return void
     */
    public function setCompetition(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $competition)
    {
        $this->competition = $competition;
    }
}
