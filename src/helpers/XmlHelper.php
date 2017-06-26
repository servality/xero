<?php

namespace Xero\helpers;


trait XmlHelper
{
    public function array_to_xml(array $array, string $resourceType)
    {
        $xml_data = new \SimpleXMLElement('<'.$resourceType.'></'.$resourceType.'>');
        return $this->convert( $array, $xml_data );
    }

    private function convert( array $data, \SimpleXMLElement $xml_data ) {
        foreach( $data as $key => $value ) {
            if( is_array($value) ) {
                $subNode = $xml_data->addChild($key);
                $this->convert($value, $subNode);
            } else {
                $xml_data->addChild("$key","$value");
            }
        }
        return $xml_data;
    }
}