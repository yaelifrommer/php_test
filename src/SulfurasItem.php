<?php

declare(strict_types=1);

/*
 * This class extends the Item class and represents a product called "Sulfuras, Hand of Ragnaros."
 * It inherits properties like name, sellIn, and quality, and the updateQuality function and other functions.
 * The updateQuality function is overridden to apply specific rules for "Sulfuras, Hand of Ragnaros."
 */

namespace GildedRose;

class SulfurasItem extends Item
{
    public function updateQuality(): void
    {
        // Sulfuras does not change in quality or sellIn values.
    }
}
