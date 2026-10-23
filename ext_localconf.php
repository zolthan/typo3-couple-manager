<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        if (TYPO3_MODE === 'BE') {
            $icons = [
                'apps-pagetree-folder-contains-couples' => 'ext-news-folder-tree.svg',
                'ext-couple_manager-wizard-icon' => 'Extension.svg',
            ];
            $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
            foreach ($icons as $identifier => $path) {
                $iconRegistry->registerIcon(
                    $identifier,
                    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                    ['source' => 'EXT:couple_manager/Resources/Public/Icons/' . $path]
                );
            }
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '
    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:couple_manager/Configuration/TSconfig/TableSorting.typoscript">
    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:couple_manager/Configuration/TSconfig/ContentElementWizard.typoscript">
    '
        );

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
