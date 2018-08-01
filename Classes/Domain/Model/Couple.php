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
     * nameMan
     *
     * @var string
     */
    protected $nameMan = '';

    /**
     * nameWoman
     *
     * @var string
     */
    protected $nameWoman = '';

    /**
     * Returns the nameMan
     *
     * @return string $nameMan
     */
    public function getNameMan()
    {
        return $this->nameMan;
    }

    /**
     * Sets the nameMan
     *
     * @param string $nameMan
     * @return void
     */
    public function setNameMan($nameMan)
    {
        $this->nameMan = $nameMan;
    }

    /**
     * Returns the nameWoman
     *
     * @return string $nameWoman
     */
    public function getNameWoman()
    {
        return $this->nameWoman;
    }

    /**
     * Sets the nameWoman
     *
     * @param string $nameWoman
     * @return void
     */
    public function setNameWoman($nameWoman)
    {
        $this->nameWoman = $nameWoman;
    }
}
