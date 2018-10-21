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
 * CompetitionType
 */
class CompetitionType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * organization
     *
     * @var string
     */
    protected $organization = '';

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the organization
     *
     * @return string $organization
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Sets the organization
     *
     * @param string $organization
     * @return void
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * Gets the label for competition type select fields
     *
     * @return string
     */
    public function getOptionLabel()
    {
        return sprintf('%s (%s)', $this->getName(), $this->getOrganization());
    }
}
