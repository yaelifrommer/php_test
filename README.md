# GildedRose Kata - PHP Version
**Yaela Frommer**

## Installation

To set up the project, ensure you have the following:

- **PHP 8.0+**: [Download PHP](https://www.php.net/downloads.php)
- **Composer**: [Download Composer](https://getcomposer.org)
- **Git** (recommended): [Download Git](https://git-scm.com/downloads)

### Setup Steps

1. **Clone the repository:**

    ```sh
    git clone https://github.com/yaelifrommer/php_test.git
    ```

2. **Navigate to the PHP directory and install dependencies:**

    ```sh
    cd php
    composer install
    ```

## Dependencies

This project relies on the following Composer packages:

- [PHPUnit](https://phpunit.de/) - For unit testing.
- [ApprovalTests.PHP](https://github.com/approvals/ApprovalTests.php) - For approval-based testing.
- [PHPStan](https://github.com/phpstan/phpstan) - For static analysis.
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard) - For code style checks.

## Project Structure

- **`src/`**: Contains the core classes and new classes for item types.
    - `Item.php` - This class remains unchanged.
    - `GildedRose.php` - This class has been refactored to use new classes.
    - `AgedBrie.php` - New class for handling Aged Brie items.
    - `Sulfuras.php` - New class for handling Sulfuras items.
    - `BackstagePass.php` - New class for handling Backstage Pass items.

- **`tests/`**: Contains test files.
    - `GildedRoseTest.php` - Includes the final test case which uses the fixture `texttest_fixture3.php`. This test captures the output of the fixture and compares it against the expected output file using the ApprovalTests library. The expected output is stored in `ApprovalTest.testFoo.approved.txt`. If there is a mismatch, the actual output will be available in the corresponding received file.
    - `ApprovalTest.php` - Includes two test cases:
        - `testFoo()` - Uses the fixture `texttest_fixture_2.php`. This test captures the output and compares it with the expected output file `ApprovalTest.testFoo.approved.txt`. In case of a mismatch, the actual output will be available in the corresponding received file.
        - `testThirtyDays()` - Uses the fixture `texttest_fixture.php`. This test captures the output for a scenario of 30 days and compares it with the expected output file `ApprovalTest.testThirtyDays.approved.txt`. The actual output will be saved in the corresponding received file if there's a mismatch.

- **`fixtures/`**: Contains fixture files.
    - `texttest_fixture.php` -  Employed by the `testThirtyDays()` method in `ApprovalTest.php` to validate output for a 30-day period.
    - `texttest_fixture_2.php` -  Employed by the `testFoo()` method in `ApprovalTest.php`.
    - `texttest_fixture_3.php` -  Employed by the `testFoo()` method in `GildedRoseTest.php`.

## Fixture Usage

To run fixtures, use the following commands:

```sh
php fixtures/texttest_fixture.php 10
php fixtures/texttest_fixture_2.php
php fixtures/texttest_fixture_3.php
```

Replace `10` with the number of days as needed.

## Testing

### Running Unit Tests

To execute unit tests:

```sh
composer tests
```

For Windows users:

```sh
pu.bat
```

### Generating Test Coverage Report

To run tests and generate an HTML coverage report:

```sh
composer test-coverage
```

The coverage report will be saved in the `/builds` directory. Open `/builds/index.html` in your browser to view it.

**Note:** Xdebug is required for generating the coverage report. Follow the [Xdebug installation guide](https://xdebug.org/docs/install) if necessary.

### Code Standards

#### Checking Code Standards

To check the code against PSR-12 standards without fixing errors:

```sh
composer check-cs
```

For Windows users:

```sh
cc.bat
```

#### Fixing Code Standards

To automatically fix code style issues:

```sh
composer fix-cs
```

For Windows users:

```sh
fc.bat
```

### Static Analysis

To perform static analysis using PHPStan:

```sh
composer phpstan
```

For Windows users:

```sh
ps.bat
```

## Changes, Improvements, and Fixes

### Class Inheritance and Refactoring

- **Class Inheritance**: New classes have been introduced to handle different item types for better organization and maintainability:
  - `AgedBrie` - Manages Aged Brie items.
  - `Sulfuras` - Manages Sulfuras items.
  - `BackstagePass` - Manages Backstage Pass items.

### Updates to `updateQuality()` and Testing

- **Invalid Objects Handling**: Revised `updateQuality()` to address invalid objects:
  - **ApprovalTest**: Now expects `updateQuality()` to return an empty array when invalid objects are encountered. This is validated by the test checking if `$items` is an empty array using `$this->assertSame([], $items)`.
  - **GildedRoseTest**: Clarified that if `updateQuality()` detects an invalid object, it should either return an empty array or correct the object name to `fixme`. Approval files have been updated to reflect these changes, showing expected results such as `[0] -> fixme, -1, 0` for valid objects and handling of invalid cases.

### Approval Files Adjustment

- **Approval Files**: Updated for consistency with new test behavior:
  - **ApprovalTest.php**: Adjusted to verify outputs using `texttest_fixure2.php` and `texttest_fixture.php`. The test now correctly captures outputs and compares them with expected results.
  - **GildedRoseTest.php**: Aligned to use `texttest_fixture3.php` for final test case, reflecting accurate expected outputs in `ApprovalTest.testFoo.approved.txt`.

### Handling of Negative Expiry Dates

- **Negative Expiry Dates**: Updated `updateQuality()` to handle negative `sellIn` and `quality` values. If these values are negative, the function now sets the item name to `fixme` to indicate the need for correction.

These updates improve the accuracy and functionality of the project, ensuring proper validation and handling of item types and edge cases.
