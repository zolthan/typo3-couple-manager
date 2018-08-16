<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        if (TYPO3_MODE === 'BE') {
            $icons        = [
                'apps-pagetree-folder-contains-couples' => 'ext-news-folder-tree.svg',
                'ext-couple_manager-wizard-icon' => 'Extension.svg',
//                'ext-news-type-default' => 'news_domain_model_news.svg',
//                'ext-news-type-internal' => 'news_domain_model_news_internal.svg',
//                'ext-news-type-external' => 'news_domain_model_news_external.svg',
//                'ext-news-tag' => 'news_domain_model_tag.svg',
//                'ext-news-link' => 'news_domain_model_link.svg',
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
    <INCLUDE_TYPOSCRIPT: source="FILE:EXT:couple_manager/Configuration/TSconfig/ContentElementWizard.txt">
    '
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'SchwarzWeissReutlingen.CoupleManager',
            'Couple',
            [
                'Couple'      => 'list, listSimple, detail',
                'Competition' => 'list',
                'Result'      => 'list',
            ],
            // non-cacheable actions
            [
                'Couple'      => '',
                'Competition' => '',
                'Result'      => '',
            ]
        );
    }
);
