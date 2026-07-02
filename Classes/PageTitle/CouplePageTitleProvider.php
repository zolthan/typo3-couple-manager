<?php

declare(strict_types=1);

namespace SchwarzWeissReutlingen\CoupleManager\PageTitle;

use TYPO3\CMS\Core\PageTitle\PageTitleProviderInterface;

class CouplePageTitleProvider implements PageTitleProviderInterface
{
    private static string $title = '';

    public static function setTitle(string $title): void
    {
        self::$title = $title;
    }

    public function getTitle(): string
    {
        return self::$title;
    }

    public function hasPageTitle(): bool
    {
        return self::$title !== '';
    }
}
