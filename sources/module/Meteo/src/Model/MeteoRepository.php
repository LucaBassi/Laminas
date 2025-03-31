<?php

namespace Meteo\Model;

class MeteoRepository implements MeteoRepositoryInterface {

    private $data;
    /**
     * {@inheritDoc}
     */
    public function findMeteo($city) {

        $json = json_decode(file_get_contents('https://www.prevision-meteo.ch/services/json/'.$city));

        return new Meteo(
                
            $this->data['dayDetails'] = $json->fcst_day_0,
            $this->data['cityInfo'] = $json->city_info,
            $this->data['currentCondition'] = $json->current_condition,
                
        );
 
    }
}
