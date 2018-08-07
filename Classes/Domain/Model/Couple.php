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
     * @var int
     */
    protected $startingClassLatin = 0;

    /**
     * startingClassStandard
     *
     * @var int
     */
    protected $startingClassStandard = 0;

    /**
     * startingGroup
     *
     * @var int
     */
    protected $startingGroup = 0;

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
     * @return int $startingClassLatin
     */
    public function getStartingClassLatin()
    {
        return $this->startingClassLatin;
    }

    /**
     * Sets the startingClassLatin
     *
     * @param int $startingClassLatin
     * @return void
     */
    public function setStartingClassLatin($startingClassLatin)
    {
        $this->startingClassLatin = $startingClassLatin;
    }

    /**
     * Returns the startingClassStandard
     *
     * @return int $startingClassStandard
     */
    public function getStartingClassStandard()
    {
        return $this->startingClassStandard;
    }

    /**
     * Sets the startingClassStandard
     *
     * @param int $startingClassStandard
     * @return void
     */
    public function setStartingClassStandard($startingClassStandard)
    {
        $this->startingClassStandard = $startingClassStandard;
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
            $nameCombined = sprintf('%s %s / %s %s', $this->getManFirstName(), $this->getManLastName(), $this->getWomanFirstName(), $this->getWomanLastName());
        }

        return $nameCombined;
    }
}
