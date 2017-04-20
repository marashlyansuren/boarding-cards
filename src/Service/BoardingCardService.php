<?php
namespace Application\Service;

use Application\BoardingCardEntity;
use Application\BoardingCardEntityCollection;
use Application\BoardingCardSorter;
use Application\Service\Exception\BoardingCardParsingException;

class BoardingCardService
{
    /**
     * @param $data
     * @return BoardingCardEntityCollection
     */
    public function orderBoardingCards($data)
    {
        $jsonData = $this->decodeData($data);
        $boardingCardEntityCollection = $this->initBoardingCardEntityCollection($jsonData);
        $boardingCardSorter = $this->buildBoardingCardSorter($boardingCardEntityCollection);
        $boardingCardSorter->process();

        return $boardingCardSorter->getOrderedBoardingCardEntityCollection();
    }

    /**
     * @param $jsonData
     * @return BoardingCardEntityCollection
     */
    protected function initBoardingCardEntityCollection($jsonData) : BoardingCardEntityCollection
    {
        if (! is_array($jsonData)) {
            throw new \InvalidArgumentException("Boarding Cards is not array");
        }

        $boardingCardEntityCollection = $this->createBoardingCardEntityCollection();
        foreach ($jsonData as $boardingCardEntityData) {
            if (empty($boardingCardEntityData->from) ||
                empty($boardingCardEntityData->to) ||
                empty($boardingCardEntityData->transport_type)
            ) {
                throw new \InvalidArgumentException("There is invalid Boarding Card data");
            }

            $boardingCardEntity = $this->buildBoardingCardEntity(
                $boardingCardEntityData->from,
                $boardingCardEntityData->to,
                $boardingCardEntityData->transport_type
            );

            if (! empty($boardingCardEntityData->additional_info)) {
                $boardingCardEntity->setAdditionalInfo($boardingCardEntityData->additional_info);
            }

            $boardingCardEntityCollection->addItem($boardingCardEntity);
        }

        return $boardingCardEntityCollection;
    }

    /**
     * @param $from
     * @param $to
     * @param $transportType
     * @return BoardingCardEntity
     */
    protected function buildBoardingCardEntity($from, $to, $transportType) : BoardingCardEntity
    {
        $boardingCardEntity = new BoardingCardEntity($from, $to, $transportType);

        return $boardingCardEntity;
    }

    /**
     * @param BoardingCardEntityCollection $boardingCardEntityCollection
     * @return BoardingCardSorter
     */
    protected function buildBoardingCardSorter(BoardingCardEntityCollection $boardingCardEntityCollection)
    {
        return new BoardingCardSorter($boardingCardEntityCollection);
    }

    /**
     * @return BoardingCardEntityCollection
     */
    protected function createBoardingCardEntityCollection() : BoardingCardEntityCollection
    {
        return new BoardingCardEntityCollection();
    }

    /**
     * @param $data
     * @return mixed
     * @throws BoardingCardParsingException
     */
    protected function decodeData($data)
    {
        $jsonData = json_decode($data);
        if (json_last_error()) {
            throw new BoardingCardParsingException(json_last_error_msg());
        }

        return $jsonData;
    }
}