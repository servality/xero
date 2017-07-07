<?php

namespace Xero\helpers;


trait XmlHelper
{
    public function xml_one_resource(array $array, string $resourceType)
    {
        $xml_data = new \SimpleXMLElement('<'.$resourceType.'></'.$resourceType.'>');
        return $this->convert( $array, $xml_data );
    }

    public function xml_multiple_resources(array $array, string $resourceType)
    {
        $resourceCollective = null;
        if(substr(!$resourceType, -1) == 'y'){
            $resourceCollective = $resourceType.'s';
        }
        $xml_data = new \SimpleXMLElement('<'.$resourceCollective.'></'.$resourceCollective.'>');
        foreach ($array as $resource){
            $xml_resource = new \SimpleXMLElement('<'.$resourceCollective.'></'.$resourceCollective.'>');
            $xml_resource->addChild($this->convert($resource, $xml_resource));
            $xml_data->addChild($xml_resource);
        }
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