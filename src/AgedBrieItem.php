<?php

declare(strict_types=1);

/*
 * This class extends the Item class and represents a product called "Aged Brie."
 * It inherits properties like name, sellIn, and quality, and the updateQuality function and other functions.
 * The updateQuality function is overridden to apply specific rules for "Aged Brie."
 */

namespace GildedRose;

class AgedBrieItem extends Item
{
    // Updates the item's quality based on its attribute values.
    public function updateQuality(): void
    {
        if ($this->quality < 50) {
            $this->quality++;
        }
        $this->sellIn--;
        if ($this->sellIn < 0 && $this->quality < 50) {
            $this->quality++;
        }
    }
}
