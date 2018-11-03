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
 * Competition
 */
class Competition extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * dateStart
     *
     * @var \DateTime
     */
    protected $dateStart = null;

    /**
     * dateEnd
     *
     * @var \DateTime
     */
    protected $dateEnd = null;

    /**
     * country
     *
     * @var int
     */
    protected $country = 0;

    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * address
     *
     * @var string
     */
    protected $address = '';

    /**
     * Organizer
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer>
     * @lazy
     */
    protected $organizer;

    /**
     * sizeDanceFloor
     *
     * @var string
     */
    protected $sizeDanceFloor = '';

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return Competition
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Returns the dateStart
     *
     * @return \DateTime $dateStart
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Sets the dateStart
     *
     * @param \DateTime $dateStart
     * @return Competition
     */
    public function setDateStart(\DateTime $dateStart)
    {
        $this->dateStart = $dateStart;
        return $this;
    }

    /**
     * Returns the dateEnd
     *
     * @return \DateTime $dateEnd
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Sets the dateEnd
     *
     * @param \DateTime $dateEnd
     * @return Competition
     */
    public function setDateEnd(\DateTime $dateEnd)
    {
        $this->dateEnd = $dateEnd;
        return $this;
    }

    /**
     * Returns the country
     *
     * @return int $country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets the country
     *
     * @param int $country
     * @return Competition
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return Competition
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     * @return Competition
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Adds an Organizer
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer $organizer
     * @return Competition
     */
    public function addCategory(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer $organizer)
    {
        $this->organizer->attach($organizer);
        return $this;
    }

    /**
     * Removes an Organizer
     *
     * @param \SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer $organizerToRemove The Category to be removed
     * @return Competition
     */
    public function removeCategory(\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer $organizerToRemove)
    {
        $this->organizer->detach($organizerToRemove);
        return $this;
    }

    /**
     * Returns the Categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer> $organizer
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * Sets the Categories
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SchwarzWeissReutlingen\CoupleManager\Domain\Model\Organizer> $organizer
     * @return Competition
     */
    public function setOrganizer(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $organizer)
    {
        $this->organizer = $organizer;
        return $this;
    }

    /**
     * Returns the sizeDanceFloor
     *
     * @return string $sizeDanceFloor
     */
    public function getSizeDanceFloor()
    {
        return $this->sizeDanceFloor;
    }

    /**
     * Sets the sizeDanceFloor
     *
     * @param string $sizeDanceFloor
     * @return Competition
     */
    public function setSizeDanceFloor($sizeDanceFloor)
    {
        $this->sizeDanceFloor = $sizeDanceFloor;
        return $this;
    }

    /**
     * Returns a string that identifies the competition
     *
     * @return string
     */
    public function getIdentifier()
    {
        $date = '';
        if ($this->getDateStart()) {
            $date = $this->getDateStart()->format('Y-m');
        }
        return sprintf('%s - %s (%s)', $date, $this->getTitle(), $this->getCity());
    }
}
