<?php

namespace Meteo\Form;

use Laminas\Form\Form;

class MeteoForm extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'city',
            'type' => MeteoFieldset::class,
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'value' => 'Insert new Post',
            ],
        ]);
    }
}