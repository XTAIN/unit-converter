<?php
namespace XTAIN\UnitConverter;


class UnitConverter
{
    /**
     * @var array
     */
    protected $converter;

    /**
     * UnitConverter constructor.
     * @param array $converter
     */
    public function __construct($converter = array())
    {
        $this->converter = $converter;
    }

    /**
     * @param string $input_unit
     * @param string $output_unit
     * @param float $value
     * @return $this
     */
    public function addConvert($input_unit, $output_unit, $value)
    {
        if (!isset($this->converter[$input_unit])) {
            $this->converter[$input_unit] = array();
        }
        $this->converter[$input_unit][$output_unit] = $value;
        return $this;
    }

    /**
     * @param string $input_unit
     * @param string $output_unit
     * @return float|null
     */
    public function getConvert($input_unit, $output_unit)
    {
        if (isset($this->converter[$input_unit])) {
            if (isset($this->converter[$input_unit][$output_unit])) {
                return $this->converter[$input_unit][$output_unit];
            }
        }
        return null;
    }

    /**
     * @param string $input_unit
     * @param string $output_unit
     * @return boolean
     */
    public function hasConvert($input_unit, $output_unit)
    {
        if (isset($this->converter[$input_unit])) {
            if (isset($this->converter[$input_unit][$output_unit])) {
                return true;
            }
        }
        return false;
    }



    /**
     * @param float $number
     * @param string $input_unit
     * @param string $output_unit
     * @return float|null
     */
    public function convert($number, $input_unit, $output_unit)
    {
        if (isset($this->converter[$input_unit][$output_unit])) {
            return $number * $this->converter[$input_unit][$output_unit];
        } else if (isset($this->converter[$output_unit][$input_unit])) {
            return $number / $this->converter[$input_unit][$output_unit];
        }
        return null;
    }
}