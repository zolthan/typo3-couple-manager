<?php

namespace SchwarzWeissReutlingen\CoupleManager\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

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
class Couple extends AbstractEntity
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
    protected $image;

    /**
     * Returns the activeCouple
     *
     * @return bool $activeCouple
     */
    public function getActiveCouple(): bool
    {
        return $this->activeCouple;
    }

    /**
     * Returns the boolean state of activeCouple
     *
     * @return bool
     */
    public function isActiveCouple(): bool
    {
        return $this->activeCouple;
    }

    /**
     * Sets the activeCouple
     *
     * @param bool $activeCouple
     * @return Couple
     */
    public function setActiveCouple(bool $activeCouple): self
    {
        $this->activeCouple = $activeCouple;
        return $this;
    }

    /**
     * Returns the boolean state of hideResults
     *
     * @return bool
     */
    public function isHideResults(): bool
    {
        return $this->hideResults;
    }

    /**
     * Returns the hideResults
     *
     * @return bool $hideResults
     */
    public function getHideResults(): bool
    {
        return $this->hideResults;
    }

    /**
     * Sets the hideResults
     *
     * @param bool $hideResults
     * @return Couple
     */
    public function setHideResults(bool $hideResults): self
    {
        $this->hideResults = $hideResults;
        return $this;
    }

    /**
     * Returns the showFuture
     *
     * @return bool $showFuture
     */
    public function getShowFuture(): bool
    {
        return $this->showFuture;
    }

    /**
     * Returns the boolean state of showFuture
     *
     * @return bool
     */
    public function isShowFuture(): bool
    {
        return $this->showFuture;
    }

    /**
     * Sets the showFuture
     *
     * @param $showFuture
     * @return Couple
     */
    public function setShowFuture($showFuture): self
    {
        $this->showFuture = $showFuture;

        return $this;
    }

    /**
     * Returns the startingClassLatin
     *
     * @return string $startingClassLatin
     */
    public function getStartingClassLatin(): string
    {
        return $this->startingClassLatin;
    }

    /**
     * Sets the startingClassLatin
     *
     * @param string $startingClassLatin
     */
    public function setStartingClassLatin(string $startingClassLatin): void
    {
        $this->startingClassLatin = $startingClassLatin;
    }

    /**
     * Returns the startingClassStandard
     *
     * @return string $startingClassStandard
     */
    public function getStartingClassStandard(): string
    {
        return $this->startingClassStandard;
    }

    /**
     * Sets the startingClassStandard
     *
     * @param string $startingClassStandard
     */
    public function setStartingClassStandard(string $startingClassStandard): void
    {
        $this->startingClassStandard = $startingClassStandard;
    }

    /**
     * Returns the startingGroup
     *
     * @return string $startingGroup
     */
    public function getStartingGroup(): string
    {
        return $this->startingGroup;
    }

    /**
     * Sets the startingGroup
     *
     * @param string $startingGroup
     */
    public function setStartingGroup(string $startingGroup): void
    {
        $this->startingGroup = $startingGroup;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     */
    public function setDescription(string $description): void
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
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * Returns combined couple name
     *
     * @return string
     */
    public function getCoupleName(): string
    {
        if (empty($this->getWomanLastName())) {
            return sprintf('%s %s %s', $this->getManFirstName(), $this->getManLastName(), '(Solo)');
        }
        if (empty($this->getManLastName())) {
            return sprintf('%s %s %s', $this->getWomanFirstName(), $this->getWomanLastName(), '(Solo)');
        }
        if ($this->getManLastName() === $this->getWomanLastName()) {
            return sprintf('%s & %s %s', $this->getManFirstName(), $this->getWomanFirstName(), $this->getManLastName());
        }

        return sprintf('%s %s & %s %s', $this->getManFirstName(), $this->getManLastName(), $this->getWomanFirstName(), $this->getWomanLastName());
    }

    /**
     * Returns the womanLastName
     *
     * @return string $womanLastName
     */
    public function getWomanLastName(): string
    {
        return $this->womanLastName;
    }

    /**
     * Sets the womanLastName
     *
     * @param string $womanLastName
     */
    public function setWomanLastName(string $womanLastName): void
    {
        $this->womanLastName = $womanLastName;
    }

    /**
     * Returns the manFirstName
     *
     * @return string $manFirstName
     */
    public function getManFirstName(): string
    {
        return $this->manFirstName;
    }

    /**
     * Sets the manFirstName
     *
     * @param string $manFirstName
     */
    public function setManFirstName(string $manFirstName): void
    {
        $this->manFirstName = $manFirstName;
    }

    /**
     * Returns the manLastName
     *
     * @return string $manLastName
     */
    public function getManLastName(): string
    {
        return $this->manLastName;
    }

    /**
     * Sets the manLastName
     *
     * @param string $manLastName
     */
    public function setManLastName(string $manLastName): void
    {
        $this->manLastName = $manLastName;
    }

    /**
     * Returns the womanFirstName
     *
     * @return string $womanFirstName
     */
    public function getWomanFirstName(): string
    {
        return $this->womanFirstName;
    }

    /**
     * Sets the womanFirstName
     *
     * @param string $womanFirstName
     */
    public function setWomanFirstName(string $womanFirstName): void
    {
        $this->womanFirstName = $womanFirstName;
    }
}
