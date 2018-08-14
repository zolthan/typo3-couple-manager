<?php
namespace Seventhsense\ErbeJobs\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Marc Becker <marc.becker@7thsense.de>, 7thSENSE GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Job
 */
class Job extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * jobId
     *
     * @var string
     */
    protected $jobId = '';

    /**
     * ini
     *
     * @var string
     */
    protected $ini = '';

    /**
     * areaOfExpertise
     *
     * @var string
     */
    protected $areaOfExpertise = '';

    /**
     * site
     *
     * @var string
     */
    protected $site = '';

    /**
     * headline
     *
     * @var string
     */
    protected $headline = '';

    /**
     * tasks
     *
     * @var string
     */
    protected $tasks = '';

    /**
     * profile
     *
     * @var string
     */
    protected $profile = '';

    /**
     * benefits
     *
     * @var string
     */
    protected $benefits = '';

    /**
     * closingText
     *
     * @var string
     */
    protected $closingText = '';

    /**
     * link
     *
     * @var string
     */
    protected $link = '';

    /**
     * pubDate
     *
     * @var string
     */
    protected $pubDate = '';

    /**
     * scopeOfTraining
     * @var string
     */
    protected $scopeOfTraining = '';

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getJobId()
    {
        return $this->jobId;
    }

    /**
     * @param string $jobId
     */
    public function setJobId($jobId)
    {
        $this->jobId = $jobId;
    }

    /**
     * @return string
     */
    public function getAreaOfExpertise()
    {
        return $this->areaOfExpertise;
    }

    /**
     * @param string $areaOfExpertise
     */
    public function setAreaOfExpertise($areaOfExpertise)
    {
        $this->areaOfExpertise = $areaOfExpertise;
    }

    /**
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param string $site
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param string $headline
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
    }

    /**
     * @return string
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param string $tasks
     */
    public function setTasks($tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param string $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return string
     */
    public function getBenefits()
    {
        return $this->benefits;
    }

    /**
     * @param string $benefits
     */
    public function setBenefits($benefits)
    {
        $this->benefits = $benefits;
    }

    /**
     * @return string
     */
    public function getClosingText()
    {
        return $this->closingText;
    }

    /**
     * @param string $closingText
     */
    public function setClosingText($closingText)
    {
        $this->closingText = $closingText;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getPubDate()
    {
        return $this->pubDate;
    }

    /**
     * @param string $pubDate
     */
    public function setPubDate($pubDate)
    {
        $this->pubDate = $pubDate;
    }

    /**
     * @return string
     */
    public function getIni() {
        return $this->ini;
    }

    /**
     * @param string $ini
     */
    public function setIni($ini) {
        $this->ini = $ini;
    }

    /**
     * Gets the scope of training
     * @return string
     */
    public function getScopeOfTraining() {
        return $this->scopeOfTraining;
    }

    /**
     * Sets the scope of training to $scopeOfTraining
     *
     * @param string $scopeOfTraining
     */
    public function setScopeOfTraining($scopeOfTraining) {
        $this->scopeOfTraining = $scopeOfTraining;
    }


}