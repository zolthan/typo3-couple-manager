<?php

defined('TYPO3') || die('Access denied.');

call_user_func(
    function () {
        $plugins = [
            'Couple' => [\SchwarzWeissReutlingen\CoupleManager\Controller\CoupleController::class => 'detail'],
            'CoupleList' => [\SchwarzWeissReutlingen\CoupleManager\Controller\CoupleController::class => 'list'],
            'CompetitionList' => [\SchwarzWeissReutlingen\CoupleManager\Controller\CompetitionController::class => 'list'],
            'ResultList' => [\SchwarzWeissReutlingen\CoupleManager\Controller\ResultController::class => 'list'],
            'ResultListSuccess' => [\SchwarzWeissReutlingen\CoupleManager\Controller\ResultController::class => 'listSuccess'],
            'ResultListFuture' => [\SchwarzWeissReutlingen\CoupleManager\Controller\ResultController::class => 'listFuture'],
        ];
        foreach ($plugins as $pluginName => $controllerActions) {
            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
                'CoupleManager',
                $pluginName,
                $controllerActions,
                [],
                \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
            );
        }
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
