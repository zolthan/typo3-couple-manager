<?php

defined('TYPO3') || die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CoupleManager',
            'Couple',
            [
                \SchwarzWeissReutlingen\CoupleManager\Controller\CoupleController::class => 'list,detail',
                \SchwarzWeissReutlingen\CoupleManager\Controller\CompetitionController::class => 'list',
                \SchwarzWeissReutlingen\CoupleManager\Controller\ResultController::class => 'list',
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CoupleManager',
            'Menu',
            [
                \SchwarzWeissReutlingen\CoupleManager\Controller\MenuController::class => 'show,mobil',
            ],
            []
        );
    }
);
