<?php


namespace app\library\transfer;


use Tebru\Gson\Gson;

class Transfer
{
    /**
     * @param array $data
     * @param $serializedClass
     * @return object
     */
    public static function DataToObject(array $data, $serializedClass) : object
    {
        $jsonBuilder = Gson::builder()->build();
        return $jsonBuilder->fromNormalized($data, $serializedClass);
    }

}