# Couple Manager

> TYPO3 Extbase extension to manage dance couples, competition results, and events — built for the dance sport community.

[![TYPO3](https://img.shields.io/badge/TYPO3-13.4-orange.svg)](https://typo3.org)
[![PHP](https://img.shields.io/badge/PHP-8.2--8.4-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-GPL--2.0--or--later-green.svg)](LICENSE)
[![Version](https://img.shields.io/badge/version-3.0.2-brightgreen.svg)](https://github.com/zolthan/typo3-couple-manager/releases)

---

## Features

- **Couple profiles** — manage dance couples and soloists with photo, starting group, class, and active status
- **Competition results** — record placements, disciplines, promotion flags, and participant counts
- **Competition calendar** — upcoming events with organizer, location, and date
- **One content element per view** — couple list, couple detail, competition list, result list, highlights, and upcoming starts
- **Highlights view** — automatically surfaces championships, promotions, and top-3 placements
- **Championship icons** — WM, EM, DM, and Landesmeisterschaft marked with an icon, a tooltip, and a screen-reader text
- **Speaking URLs** — per-couple slug field for clean detail-page URLs via TYPO3 RouteEnhancer
- **Custom page title** — `CouplePageTitleProvider` surfaces the couple's name in the page title/breadcrumb
- **Backend optimised** — custom TCA labels, sorted selects, full workspace and localization support

---

## Requirements

| Component | Version |
|-----------|---------|
| TYPO3 | 13.4 |
| PHP | 8.2, 8.3, 8.4 |
| EXT:extbase | bundled with TYPO3 |
| EXT:fluid | bundled with TYPO3 |

Markup targets **Bootstrap 5** (for example via `bk2k/bootstrap-package` 15).

| Extension version | TYPO3 | PHP |
|-------------------|-------|-----|
| 3.x | 13.4 | 8.2 – 8.4 |
| 2.x | 12.4 | 8.1 – 8.3 |
| 1.x | 9.5 – 11.5 | 7.2 – 8.2 |

---

## Installation

```bash
composer require schwarz-weiss-reutlingen/couple-manager
```

The extension is Composer-only. After installation run the database comparison and the upgrade wizards:

```bash
vendor/bin/typo3 extension:setup
vendor/bin/typo3 upgrade:run
```

---

## Setup

### 1. Include the static TypoScript

In **Web → Template**, add the static template **"Couple Manager"** to your root template.

### 2. Configure the storage PID

The extension defaults to `storagePid = 137`. Override it in your TypoScript constants to match the SysFolder where your records live:

```typoscript
plugin.tx_couplemanager.persistence.storagePid = <your-pid>
```

### 3. Create backend records

In the configured SysFolder, create:
- **Couples** (`tx_couplemanager_domain_model_couple`)
- **Competition Types** (`tx_couplemanager_domain_model_competitiontype`)
- **Organizers** (`tx_couplemanager_domain_model_organizer`)
- **Competitions** (`tx_couplemanager_domain_model_competition`)
- **Results** (`tx_couplemanager_domain_model_result`)

### 4. Enable speaking URLs (optional)

Each couple has a `slug` field (`uniqueInSite`). To resolve it into clean detail-page URLs,
add a RouteEnhancer to your site's `config.yaml`:

```yaml
routeEnhancers:
  CoupleDetail:
    type: Extbase
    limitToPages: [<detail-page-uid>]
    extension: CoupleManager
    plugin: Couple
    routes:
      - routePath: '/{couple_slug}'
        _controller: 'Couple::detail'
        _arguments:
          couple_slug: couple
    defaultController: 'Couple::detail'
    aspects:
      couple_slug:
        type: PersistedAliasMapper
        tableName: tx_couplemanager_domain_model_couple
        routeFieldName: slug
```

⚠️ If other RouteEnhancers (e.g. `georgringer/news`) are also configured on the same page and
lack a strict `_arguments` mapping, they may match the URL first. Place `CoupleDetail` **before**
such enhancers in `config.yaml` — enhancers are evaluated in declaration order.

### 5. Enable the couple name as page title (optional)

Register `CouplePageTitleProvider` in your site's TypoScript to surface the couple's name in the
page title and breadcrumb instead of the static page title:

```typoscript
config.pageTitleProviders {
    couple {
        provider = SchwarzWeissReutlingen\CoupleManager\PageTitle\CouplePageTitleProvider
        before = record
    }
}
```

---

## Plugins

Every view is its own content element (CType). Add it through **Create new content element → Plugins**.

| Plugin | CType | Controller action | Description |
|--------|-------|-------------------|-------------|
| Couple detail | `couplemanager_couple` | `Couple → detail` | Single couple profile with past results and upcoming starts |
| Couple list | `couplemanager_couplelist` | `Couple → list` | Grid of all couples, optionally linking to the detail page |
| Competition list | `couplemanager_competitionlist` | `Competition → list` | List of all competitions |
| Result list | `couplemanager_resultlist` | `Result → list` | Past results with optional date/limit filters |
| Result highlights | `couplemanager_resultlistsuccess` | `Result → listSuccess` | Championships, promotions, top-3, strong finishes |
| Upcoming starts | `couplemanager_resultlistfuture` | `Result → listFuture` | Upcoming events for couples with *Show Future* enabled |

The detail plugin is named `Couple`, so the RouteEnhancer above (`plugin: Couple`) keeps working.

The `Menu` plugin (`MenuController`) is configured for TypoScript use only; it is not offered in the backend.

### FlexForm options

**Couple list** (sheet `list`)

| Setting | Description |
|---------|-------------|
| Active couples first | Sort active couples before inactive ones |
| Detail view page | Page UID that contains the Couple detail plugin |

**Result list, highlights, upcoming starts** (sheet `result.list`)

| Setting | Description |
|---------|-------------|
| Template layout | e.g. `Erfolge` (achievements) or `Home Accordion` |
| Limit | Maximum number of results to display |
| Date from / to | Fixed date range filter |
| Rolling window (days) | Show results from the last N days |

---

## Domain Model

```
Couple ──< Result >── Competition
                 └── CompetitionType
Competition >── Organizer
```

### Couple

| Field | Type | Notes |
|-------|------|-------|
| `manFirstName` / `manLastName` | string | Male partner (omit for soloists) |
| `womanFirstName` / `womanLastName` | string | Female partner |
| `startingGroup` | string | Age/skill group |
| `startingClassLatin` / `startingClassStandard` | string | Dance class per discipline |
| `activeCouple` | bool | Shown/sorted as active |
| `hideResults` | bool | Suppress results on frontend |
| `showFuture` | bool | Include in upcoming-events view |
| `image` | FileReference | Couple photo (FAL) |
| `slug` | string | URL slug for the detail page, unique per site — see [Setup](#4-enable-speaking-urls-optional) |

`getCoupleName()` automatically formats the display name — handles soloists, shared surnames, and full couple names.

### Result

| Field | Type | Notes |
|-------|------|-------|
| `couple` | Relation | Couple this result belongs to |
| `competition` | Relation | Event |
| `competitionType` | Relation | e.g. Deutsche Meisterschaft |
| `date` | DateTime | |
| `discipline` | string | Latin / Standard |
| `startingGroup` / `startingClass` | string | Classification at time of result |
| `position` | int | Final placement (0 = future/pending) |
| `participantCount` | int | Field size |
| `promotion` | bool | Promotion achieved |

### Competition

| Field | Type |
|-------|------|
| `title` | string |
| `dateStart` / `dateEnd` | DateTime |
| `city`, `country`, `address` | string |
| `organizer` | Relation (Organizer) |

### CompetitionType / Organizer

Lookup tables for categorising competitions and storing organizer contact data.

### Championship icons

The partial `Resources/Private/Partials/Result/CompetitionIcon.html` renders an icon with tooltip and
screen-reader text for the competition types `World Championship` (WM), `European Championship` (EM),
`Deutsche Meisterschaft` (DM), and `Landesmeisterschaft` (LM, Baden-Württemberg lion). Override the partial
in your sitepackage to change icons or labels.

---

## Result Highlights Logic (`listSuccess`)

The **Erfolge** view automatically groups results into four tiers:

| Tier | Criteria |
|------|----------|
| **Championships** | `competitionType` is Deutsche or Landesmeisterschaft, `position ≤ 1` |
| **Promotions** | `promotion = true` |
| **Top 3** | `position ∈ {1, 2, 3}` |
| **Strong finishes** | `position / participantCount < 0.25` (top quarter) |

---

## Upgrading

### From 2.x (TYPO3 12.4) to 3.0 (TYPO3 13.4)

Update TYPO3 first, then require `^3.0`. No data migration is needed. The couple image field now uses the
TCA type `file`; page, frontend user, and content object are read from the request.

### From 1.x (TYPO3 9.5 – 11.5) to 2.0 (TYPO3 12.4)

`switchableControllerActions` no longer exists in TYPO3 12. The former single plugin `Couple` is split into one
content element per mode (see [Plugins](#plugins)). Run the upgrade wizard **"Couple Manager: split plugin into one plugin per mode"**
(`coupleManagerPluginSplit`) to convert existing `list` content elements and their FlexForm values:

```bash
vendor/bin/typo3 upgrade:run coupleManagerPluginSplit
```

---

## Development

```bash
# Install dev dependencies
composer install

# Code style check / fix
composer cs:check
composer cs:fix

# Unit tests
composer test:unit
```

---

## Changelog

### 3.0.2
- Fix: `CouplePageTitleProvider` is public, so it can be used as a page title provider in TYPO3 13
- The couple detail page sets a meta description and the Open Graph tags `og:title` and `og:description`
- Unit tests migrated to PHPUnit 11 attributes

### 3.0.1
- Added the GPL-2.0 license text and updated the README

### 3.0.0
- Breaking: TYPO3 13.4 only (PHP 8.2 – 8.4)
- Couple image uses the TCA type `file` instead of `getFileFieldTCAConfig()`
- Page, frontend user, and content object come from the request instead of `$GLOBALS['TSFE']`

### 2.0.0
- Breaking: TYPO3 12.4 only; Services.yaml, PSR-7 responses, Fluid `ViewInterface`, PHP attributes, TCA overrides, `Icons.php`, `page.tsconfig`
- Breaking: one content element plugin per mode (`CoupleList`, `CompetitionList`, `ResultList`, `ResultListSuccess`, `ResultListFuture`); upgrade wizard `coupleManagerPluginSplit`
- Championship icons with tooltip for WM, EM, DM, and Landesmeisterschaft (Baden-Württemberg lion)
- Champion card styling and `date()` formats instead of `strftime()`

### 1.10.x
- Bootstrap 5 markup (`data-bs-*` attributes, `badge`, `text-end`, no `card-deck`)
- Null-safe access to session and list settings for PHP 8

### 1.9.x
- TYPO3 11.5 support (plugins registered with controller class names), TYPO3 9.5 dropped
- TCA: valid checkbox items so `hidden`, `hide_results`, and `show_future` work

### 1.8.0
- TYPO3 10.4 support (constructor injection, Extbase ORM annotations)
- Stable result ordering via uid tie-breaker

### 1.7.1
- `ListFuture` ("Wer tanzt wo?") mobile view replaced with a non-interactive list
  (`FutureStartItem` partial) instead of a squeezed table — date, couple, tournament,
  tournament type/city, and starting class all visible without tapping
- Desktop table wrapped in `.table-responsive` and given subtle themed styling
  (caption, header row, striped rows) instead of default Bootstrap grey

### 1.7.0
- Added `slug` field to Couple (TCA + model) for speaking detail-page URLs
- Migration script to generate slugs for all existing couples
- Works together with a `PersistedAliasMapper` RouteEnhancer in the consuming site
- Added `CouplePageTitleProvider` to surface the couple's name as page title/breadcrumb

### 1.6.1
- `ListFuture` logic moved into `CoupleController::detailAction()` — upcoming tournaments
  ("Nächste Starts") now shown directly on the couple detail page, grouped by discipline
- Detail and List templates redesigned

### 1.5.0
- Accordion IDs now based on `contentObjectUid` (avoids ID collisions with multiple plugin instances)
- `panel-group` → `accordion` markup (Bootstrap 4)

### 1.4.0
- Bootstrap 3 → 4 template migration (7 templates)

### 1.3.0
- Enhanced couple listing and detail templates
- Improved type safety across domain models and simplified methods
- Developer tooling and unit test coverage improvements

### 1.2.x
- FAL image handling via native `<f:image>` (lazysizes removed)
- Bootstrap 4 grid classes in templates
- Fully-qualified `ObjectStorage` type annotations for TYPO3 9.5 compatibility

### 1.1.0
- Initial public release

---

## License

GPL-2.0-or-later — see [LICENSE](LICENSE).

---

## Author

**Sebastian Wilhelm** · [Tanzsportclub Schwarz-Weiß Reutlingen e.V.](https://www.schwarz-weiss-rt.de)
