<?php

declare(strict_types=1);

/*
 * This file is used by the ApprovalTest in the testFoo function.
 * It sets up a single item, updates its quality, and prints out the item’s index, name, sellIn, and quality for approval testing.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item;

$items = [Item::createItem('foo', 0, 0)]; // Items list.
$app = new GildedRose($items); // Items app.
$app->updateQuality(); // Update quality.

// Print items data.
foreach ($items as $index => $item) {
    echo "[$index] -> ";
    echo($item). PHP_EOL; // Using Items toString function.
}

