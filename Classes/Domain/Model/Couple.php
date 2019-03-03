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
 * Couple
 */
class Couple extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * manLastName
     *
     * @var string
     */
    protected $manLastName = '';

    /**
     * manFirstName
     *
     * @var string
     */
    protected $manFirstName = '';

    /**
     * womanLastName
     *
     * @var string
     */
    protected $womanLastName = '';

    /**
     * womanFirstName
     *
     * @var string
     */
    protected $womanFirstName = '';

    /**
     * startingClassLatin
     *
     * @var string
     */
    protected $startingClassLatin = '';

    /**
     * startingClassStandard
     *
     * @var string
     */
    protected $startingClassStandard = '';

    /**
     * startingGroup
     *
     * @var string
     */
    protected $startingGroup = '';

    /**
     * activeCouple
     *
     * @var bool
     */
    protected $activeCouple = true;

    /**
     * hideResults
     *
     * @var bool
     */
    protected $hideResults = false;

    /**
     * showFuture
     *
     * @var bool
     */
    protected $showFuture = false;

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @cascade remove
     */
    protected $image = null;

    /**
     * Returns the manLastName
     *
     * @return string $manLastName
     */
    public function getManLastName()
    {
        return $this->manLastName;
    }

    /**
     * Sets the manLastName
     *
     * @param string $manLastName
     * @return void
     */
    public function setManLastName($manLastName)
    {
        $this->manLastName = $manLastName;
    }

    /**
     * Returns the manFirstName
     *
     * @return string $manFirstName
     */
    public function getManFirstName()
    {
        return $this->manFirstName;
    }

    /**
     * Sets the manFirstName
     *
     * @param string $manFirstName
     * @return void
     */
    public function setManFirstName($manFirstName)
    {
        $this->manFirstName = $manFirstName;
    }

    /**
     * Returns the activeCouple
     *
     * @return bool $activeCouple
     */
    public function getActiveCouple()
    {
        return $this->activeCouple;
    }

    /**
     * Sets the activeCouple
     *
     * @param bool $activeCouple
     * @return Couple
     */
    public function setActiveCouple($activeCouple)
    {
        $this->activeCouple = $activeCouple;
        return $this;
    }

    /**
     * Returns the boolean state of activeCouple
     *
     * @return bool
     */
    public function isActiveCouple()
    {
        return $this->activeCouple;
    }

    /**
     * Returns the hideResults
     *
     * @return bool $hideResults
     */
    public function getHideResults()
    {
        return $this->hideResults;
    }

    /**
     * Sets the hideResults
     *
     * @param bool $hideResults
     * @return Couple
     */
    public function setHideResults($hideResults)
    {
        $this->hideResults = $hideResults;
        return $this;
    }

    /**
     * Returns the boolean state of hideResults
     *
     * @return bool
     */
    public function isHideResults()
    {
        return $this->hideResults;
    }

    /**
     * Returns the showFuture
     *
     * @return bool $showFuture
     */
    public function getShowFuture()
    {
        return $this->showFuture;
    }

    /**
     * Sets the showFuture
     *
     * @param $showFuture
     * @return Couple
     */
    public function setShowFuture($showFuture)
    {
        $this->showFuture = $showFuture;
        return $this;
    }

    /**
     * Returns the boolean state of showFuture
     *
     * @return bool
     */
    public function isShowFuture()
    {
        return $this->showFuture;
    }

    /**
     * Returns the womanLastName
     *
     * @return string $womanLastName
     */
    public function getWomanLastName()
    {
        return $this->womanLastName;
    }

    /**
     * Sets the womanLastName
     *
     * @param string $womanLastName
     * @return void
     */
    public function setWomanLastName($womanLastName)
    {
        $this->womanLastName = $womanLastName;
    }

    /**
     * Returns the womanFirstName
     *
     * @return string $womanFirstName
     */
    public function getWomanFirstName()
    {
        return $this->womanFirstName;
    }

    /**
     * Sets the womanFirstName
     *
     * @param string $womanFirstName
     * @return void
     */
    public function setWomanFirstName($womanFirstName)
    {
        $this->womanFirstName = $womanFirstName;
    }

    /**
     * Returns the startingClassLatin
     *
     * @return string $startingClassLatin
     */
    public function getStartingClassLatin()
    {
        return $this->startingClassLatin;
    }

    /**
     * Sets the startingClassLatin
     *
     * @param string $startingClassLatin
     * @return void
     */
    public function setStartingClassLatin($startingClassLatin)
    {
        $this->startingClassLatin = $startingClassLatin;
    }

    /**
     * Returns the startingClassStandard
     *
     * @return string $startingClassStandard
     */
    public function getStartingClassStandard()
    {
        return $this->startingClassStandard;
    }

    /**
     * Sets the startingClassStandard
     *
     * @param string $startingClassStandard
     * @return void
     */
    public function setStartingClassStandard($startingClassStandard)
    {
        $this->startingClassStandard = $startingClassStandard;
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
     * @return void
     */
    public function setStartingGroup($startingGroup)
    {
        $this->startingGroup = $startingGroup;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns combined couple name
     *
     * @return string
     */
    public function getCoupleName()
    {
        if ($this->getManLastName() == $this->getWomanLastName()) {
            $nameCombined = sprintf('%s & %s %s', $this->getManFirstName(), $this->getWomanFirstName(), $this->getManLastName());
        } else {
            $nameCombined = sprintf('%s %s & %s %s', $this->getManFirstName(), $this->getManLastName(), $this->getWomanFirstName(), $this->getWomanLastName());
        }

        return $nameCombined;
    }
}
