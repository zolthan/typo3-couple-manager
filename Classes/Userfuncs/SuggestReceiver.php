<?php

namespace SchwarzWeissReutlingen\CoupleManager\Userfuncs;

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

use TYPO3\CMS\Backend\Form\Wizard\SuggestWizardDefaultReceiver;
use TYPO3\CMS\Backend\Utility\BackendUtility;

/**
 * Suggest receiver with plain labels
 */
class SuggestReceiver extends SuggestWizardDefaultReceiver
{
    // The suggest result list escapes labels itself; the core receiver escapes them a second time ("&amp;").
    protected function getLabel(array $row): string
    {
        return BackendUtility::getRecordTitle($this->table, $row);
    }
}
