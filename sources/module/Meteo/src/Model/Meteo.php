<?php

namespace Meteo\Model;

class Meteo
{
    /**
     * @var int
     */
    private $dayDetails;

    /**
     * @var string
     */
    private $currentCondition;

    /**
     * @var string
     */
    private $cityInfo;

    /**
     * @param string $title
     * @param string $sunriseTime
     * @param int|null $cityNme
     */
    public function __construct($dayDetails, $cityInfo, $currentCondition )
    {
        $this->dayDetails = $dayDetails;
        $this->cityInfo = $cityInfo;
        $this->currentCondition = $currentCondition;
    }

     /**
     * @return string
     */
    public function getDayDetails()
    {
        return $this->dayDetails;
    }
    /**
     * @return int|null
     */
    public function getCityInfo()
    {
        return $this->cityInfo;
    }

    /**
     * @return string
     */
    public function getCurrentCondition()
    {
        return $this->currentCondition;
    }


}

