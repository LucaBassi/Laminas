<?php

namespace Meteo\Model;
use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Validator\StringLength;
class Meteo implements InputFilterAwareInterface
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

 public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
            'name' => 'artist',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'outyear',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}

