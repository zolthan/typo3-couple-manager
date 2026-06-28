<?php

/*
 * php-cs-fixer configuration for the "couple_manager" extension.
 * Uses the official TYPO3 coding standards (typo3/coding-standards).
 *
 * Usage:
 *   composer cs:check   # report violations (dry-run)
 *   composer cs:fix     # apply fixes
 */

$config = \TYPO3\CodingStandards\CsFixerConfig::create();
$config->getFinder()
    ->in(__DIR__)
    ->exclude(['.Build', 'Resources']);

return $config;
