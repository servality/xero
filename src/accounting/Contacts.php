<?php

namespace Xero\accounting;


class Contacts extends Accounting
{
    /**
     * Contacts constructor.
     * @param $config
     */

    function __construct($config)
    {
        parent::__construct($config);
    }

    /**
     * @param bool $include
     * @return $this
     */

    public function includeArchived(bool $include = true){
        $this->addToQuery(['includeArchived' => $include]); //true or false
        return $this;
    }

    /**
     * @param null $identifier
     * @return string
     */

    public function get($identifier = null)
    {
        if ($identifier) {
            return $this->sendRequest('GET', 'Contacts/' . $identifier);
        }
        return $this->sendRequest('GET', 'Contacts', $this->parameters);
    }

    /**
     * @param string $xml
     * @return string
     */

    public function create(string $xml)
    {
        return $this->sendRequest('POST', 'Contacts', [], '');
    }

    /**
     * @param string $identifier
     * @param string $xml
     * @return string
     */

    public function update(string $identifier, string $xml)
    {
        return $this->sendRequest('POST', 'Contacts/'.$identifier, [], '');
    }
}