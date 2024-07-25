<?php

declare(strict_types=1);

/*
 * This class extends the Item class and represents a product called "Backstage passes to a TAFKAL80ETC concert."
 * It inherits properties like name, sellIn, and quality, and the updateQuality function and other functions.
 * The updateQuality function is overridden to apply specific rules for "Backstage passes to a TAFKAL80ETC concert."
 */

namespace GildedRose;

class BackstagePassItem extends Item
{
    public function updateQuality(): void
    {
        if ($this->quality < 50) {
            $this->quality++;
            if ($this->sellIn < 11) {
                if ($this->quality < 50) {
                    $this->quality++;
                }
            }
            if ($this->sellIn < 6) {
                if ($this->quality < 50) {
                    $this->quality++;
                }
            }
        }
        $this->sellIn--;
        if ($this->sellIn < 0) {
            $this->quality = 0;
        }
    }
}
