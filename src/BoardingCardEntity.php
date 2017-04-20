<?php
namespace Application;

class BoardingCardEntity
{
    const TRANSPORT_TYPE_TRAIN       = 'train';
    const TRANSPORT_TYPE_AIRPORT_BUS = 'airport_bus';
    const TRANSPORT_TYPE_FLIGHT      = 'flight';

    const TRANSPORT_TYPES = [
        self::TRANSPORT_TYPE_TRAIN => "Train",
        self::TRANSPORT_TYPE_AIRPORT_BUS => "Airport Bus",
        self::TRANSPORT_TYPE_FLIGHT => "Flight",
    ];

    /**
     * @var string
     */
    protected $from;

    /**
     * @var string
     */
    protected $to;

    /**
     * @var string
     */
    protected $transport_type;

    /**
     * @var string
     */
    protected $additional_info;

    public function __construct($from, $to, $transportType)
    {
        if (! $this->isValidTransportType($transportType)) {
            throw new \InvalidArgumentException("Invalid transport type");
        }

        $this->from = $from;
        $this->to = $to;
        $this->transport_type = $transportType;
    }

    /**
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additional_info;
    }

    /**
     * @param $additionalInfo
     * @return $this
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additional_info = $additionalInfo;
        return $this;
    }

    /**
     * @param BoardingCardEntity $boardingCardEntity
     * @return bool
     */
    public function isTheSame(BoardingCardEntity $boardingCardEntity)
    {
        return ($this->from == $boardingCardEntity->getFrom())
            && ($this->to == $boardingCardEntity->getTo())
            && ($this->transport_type == $boardingCardEntity->getTransportType());
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getTransportType()
    {
        return $this->transport_type;
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * @param $transportType
     * @return bool
     */
    protected function isValidTransportType($transportType)
    {
        return array_key_exists($transportType, self::TRANSPORT_TYPES);
    }
}