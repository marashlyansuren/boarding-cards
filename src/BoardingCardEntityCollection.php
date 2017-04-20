<?php
namespace Application;

use Application\BoardingCardEntity;

class BoardingCardEntityCollection
{
    /**
     * @var array
     */
    protected $items = [];

    public function addItem(BoardingCardEntity $boardingCardEntity) : array
    {
        array_push($this->items, $boardingCardEntity);
        return $this->items;
    }

    /**
     * @return BoardingCardEntity[]
     */
    public function getItems() : array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @param BoardingCardEntityCollection $boardingCardEntityCollection
     * @return $this
     */
    public function initFrom(BoardingCardEntityCollection $boardingCardEntityCollection)
    {
        $boardingCardEntities = $boardingCardEntityCollection->getItems();
        foreach ($boardingCardEntities as $boardingCardEntity) {
            $this->addItem($boardingCardEntity);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getItemsArray()
    {
        $itemsArray = [];
        $items = $this->getItems();
        foreach ($items as $item) {
            $itemsArray[] = $item->getArrayCopy();
        }

        return $itemsArray;
    }
}