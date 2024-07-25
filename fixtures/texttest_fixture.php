<?php

declare(strict_types=1);

/*
 * This file creates a Gilded Rose with 9 items and runs the quality update 
 * for a set number of days. It prints out the items for each day.
 */

/*
 * This file is used by the ApprovalTest in the testThirtyDays function.
 * It simulates the application running for 30 days and outputs the item details for verification.
 */

require_once __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item;

echo 'OMGHAI!' . PHP_EOL;

/*
 * The change made is using a static function to create items.
 * The function creates different types of items based on the product name.
 * These are represented by different classes, all inheriting from the Item class.
 */
$items = [
    Item::createItem('+5 Dexterity Vest', 10, 20),
    Item::createItem('Aged Brie', 2, 0),
    Item::createItem('Elixir of the Mongoose', 5, 7),
    Item::createItem('Sulfuras, Hand of Ragnaros', 0, 80),
    Item::createItem('Sulfuras, Hand of Ragnaros', -1, 80),
    Item::createItem('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    Item::createItem('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    Item::createItem('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    Item::createItem('Conjured Mana Cake', 3, 6),
];

$app = new GildedRose($items); // The items app.

$days = 2; // defualt number of days.
if (isset($argv) && is_array($argv) && count($argv) > 1) 
{
    $days = (int) $argv[1]; // Get the number of days from the user.
}

/*
 * For each day print:
 * Days number,
 * Items details.
 * And update all app products quality.
*/

for ($i = 0; $i < $days; $i++)
{
    echo "-------- day {$i} --------" . PHP_EOL;
    echo 'name, sellIn, quality' . PHP_EOL;

    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }

    echo PHP_EOL;
    $app->updateQuality();
}
