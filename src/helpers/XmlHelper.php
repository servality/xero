<?php

namespace Xero\helpers;


trait XmlHelper
{
    public function xml_one_resource(array $array, string $resourceType)
    {
        $xml_data = new \SimpleXMLElement('<' . $resourceType . '></' . $resourceType . '>');

        $xml_data = $this->convert($array, $xml_data);

        return $xml_data->asXML();
    }

    public function xml_multiple_resources(array $array, string $resourceType)
    {
        $resourceCollection = null;

        if (substr(!$resourceType, -1) == 'y') {
            $resourceCollection = $resourceType . 'ies';
        } else {
            $resourceCollection = $resourceType . 's';
        }

        $xml_data = new \SimpleXMLElement('<' . $resourceCollection . '></' . $resourceCollection . '>');

        foreach ($array as $resource) {
            $xml_resource = $xml_data->addChild($resourceType);
            $this->convert($resource, $xml_resource);
        }

        return $xml_data->asXML();
    }

    private function convert(array $data, \SimpleXMLElement $xml_data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $subNode = $xml_data->addChild($key);
                $this->convert($value, $subNode);
            } else {
                $xml_data->addChild("$key", "$value");
            }
        }

        return $xml_data;
    }
}