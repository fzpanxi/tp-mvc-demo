<?php


namespace app\library\transfer;


use JMS\Serializer\SerializerBuilder;

class Transfer
{
    /**
     * @param array $data
     * @param $serializedClass
     * @return object
     */
    public static function DataToObject(array $data, $serializedClass): object
    {
        $serializerBuilder = SerializerBuilder::create()->build();
        return $serializerBuilder->fromArray($data, $serializedClass);
    }

}