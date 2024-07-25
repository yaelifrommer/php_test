<?php

declare(strict_types=1);

namespace GildedRose;

/*
 * Manages a collection of items and updates their quality.
 * This class processes each item by calling its updateQuality method
 * and modifies the item name to 'fixme' if its sellIn or quality is less than 0.
 */

final class GildedRose
{
    /**
     * Initializes GildedRose with an array of items.
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    /*
     * Updates the quality and sellIn of each item.
     * Calls the updateQuality method of each item's specific class.
     * Sets the item name to 'fixme' if sellIn or quality is less than 0.
     */
    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            // Check if item is an instance of Item or its subclasses
            if ($item instanceof Item) {
                $item->updateQuality();

                // If sellIn or quality are less than 0, set name to 'fixme'
                if ($item->sellIn < 0 || $item->quality < 0) {
                    $item->setName('fixme');
                }
            }
        }
    }
}
