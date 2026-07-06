# Couple Manager

> TYPO3 Extbase extension to manage dance couples, competition results, and events — built for the dance sport community.

[![TYPO3](https://img.shields.io/badge/TYPO3-9.5+-orange.svg)](https://typo3.org)
[![PHP](https://img.shields.io/badge/PHP-7.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/license-GPL--2.0--or--later-green.svg)](LICENSE)
[![Version](https://img.shields.io/badge/version-1.7.0-brightgreen.svg)](https://github.com/zolthan/typo3-couple-manager/releases)

---

## Features

- **Couple profiles** — manage dance couples and soloists with photo, starting group, class, and active status
- **Competition results** — record placements, disciplines, promotion flags, and participant counts
- **Competition calendar** — upcoming events with organizer, location, and date
- **Smart frontend plugins** — switchable views (list, detail, results, future events) via FlexForm
- **Highlights view** — automatically surfaces championships, promotions, and top-3 placements
- **Speaking URLs** — per-couple slug field for clean detail-page URLs via TYPO3 RouteEnhancer
- **Custom page title** — `CouplePageTitleProvider` surfaces the couple's name in the page title/breadcrumb
- **Backend optimised** — custom TCA labels, sorted selects, full workspace and localization support

---

## Requirements

| Component | Version |
|-----------|---------|
| TYPO3 | 9.5 or higher |
| PHP | 7.2, 7.4, 8.0, 8.1, 8.2 |
| EXT:extbase | bundled with TYPO3 |
| EXT:fluid | bundled with TYPO3 |

---

## Installation

### Via Composer (recommended)

```bash
composer require schwarz-weiss-reutlingen/couple-manager
```

### Via TYPO3 Extension Manager

Download the extension and install it through **Admin Tools → Extensions**.

---

## Setup

### 1. Include Static TypoScript

In **Web → Template**, add the static template **"Couple Manager"** to your root template.

### 2. Configure the Storage PID

The extension defaults to `storagePid = 137`. Override this in your site's TypoScript constants to match the SysFolder where your records live:

```typoscript
plugin.tx_couplemanager.persistence.storagePid = <your-pid>
```

### 3. Create Backend Records

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
        before = altPageTitle
    }
}
```

---

## Plugins

### Couple Manager (`tx_couplemanager_couple`)

The main plugin. Select the action via the **Mode** tab in the FlexForm.

| Action | Description |
|--------|-------------|
| `Couple → list` | Grid of all couples, optionally with a link to the detail page |
| `Couple → detail` | Single couple profile with past results |
| `Competition → list` | List of all competitions |
| `Result → list` | Paginated past results with optional date/limit filters |
| `Result → listSuccess` | Highlights: championships, promotions, top-3, strong finishes |
| `Result → listFuture` | Upcoming events for couples with *Show Future* enabled |

#### FlexForm options

**Couple List tab**

| Setting | Description |
|---------|-------------|
| Active couples first | Sort active couples before inactive ones |
| Detail view page | Page UID that contains the Couple Detail plugin |

**Result List tab**

| Setting | Description |
|---------|-------------|
| Template layout | `Erfolge` (achievements) or `Home Accordion` |
| Limit | Maximum number of results to display |
| Date from / to | Fixed date range filter |
| Rolling window (days) | Show results from the last N days |

---

### Couple Manager: Menu (`schwarzweissreutlingen_couplemanager_menu`)

Renders a compact couple navigation menu. Shows active couples sorted by name.

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
