<?php

declare(strict_types=1);

/*
 * This file is used by the GildedRoseTest in the testFoo function.
 * It sets up a single item and updates its quality, then outputs the item's name for verification.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item;

$items = [Item::createItem('foo', 0, 0)]; // Item list.
$app = new GildedRose($items); // Items app.
$app->updateQuality(); // Update quality.
echo($items[0]->name); // Print name.