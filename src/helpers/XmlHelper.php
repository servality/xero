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

    private function convert(array $data, \SimpleXMLElement $xml_data, $arrayItemName = "")
    {
        foreach ($data as $key => $value) {
            if (is_int($key)) {
                $key = $arrayItemName;
            }
            if (is_array($value)) {
                $subNode = $xml_data->addChild($key);
                $this->convert($value, $subNode, $this->depluralise($key));
            } else {
                $value = htmlspecialchars($value);
                $xml_data->addChild("$key", "$value");
            }
        }

        return $xml_data;
    }

    private function depluralise($string)
    {
        if (substr($string, -3) == "ies") {
            $string = rtrim($string, 'ies');
            return $string . 'y';

        } else if (substr($string, -1) == "s") {
            $string = rtrim($string, 's');
            return $string;
        } else {
            return $string;
        }
    }
}