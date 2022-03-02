<?php

namespace Oscorp\Pet\Model;

class Owner
{
    private string $phoneNumber;

    private string $name;

    /**
     * @param string $phoneNumber
     */
    public function __construct(string $name, string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }



    public function toString(): string
    {
        return 'Name: '.$this->name.PHP_EOL.'Phone-number:'.$this->getPhoneNumber();
    }


    function isValidPhoneNumber(string $phoneNumber) {
        return preg_match('/(\(?([\d \-\)\–\+\/\(]+){6,}\)?([ .\-–\/]?)([\d]+))/', $phoneNumber);
    }

}