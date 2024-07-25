<?php

declare(strict_types=1);

namespace GildedRose;

/*
 * Represents a general item with basic properties and methods.
 * Provides a default implementation of `updateQuality` for general items.
 * Includes a static method to create items of specific types based on the item name.
 * Also includes a method to update the item's name and a custom `__toString` method for printing.
 */

class Item implements \Stringable
{
    // Constructs an Item with a name, sellIn, and quality.
    public function __construct(
        public string $name,
        public int $sellIn,
        public int $quality
    ) {
    }

    // Returns a string representation of the item.
    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

    // Updates the item's quality and sellIn based on general rules.
    // The function to be overridden in the derived classes
    public function updateQuality(): void
    {
        if ($this->quality > 0) {
            $this->quality--;
        }
        $this->sellIn--;
        if ($this->sellIn < 0 && $this->quality > 0) {
            $this->quality--;
        }
    }

    // Sets a new name for the item.
    public function setName(string $newName): void
    {
        $this->name = $newName;
    }

    // Creates an item of a specific type based on the item name.
    public static function createItem(string $name, int $sellIn, int $quality): self
    {
        switch ($name) {
            case 'Aged Brie':
                return new AgedBrieItem($name, $sellIn, $quality);
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePassItem($name, $sellIn, $quality);
            case 'Sulfuras, Hand of Ragnaros':
                return new SulfurasItem($name, $sellIn, $quality); // Use SulfurasItem
            default:
                return new self($name, $sellIn, $quality);
        }
    }
}
