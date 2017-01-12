<?php

namespace Novocast\Cart;

class Cart
{
    
    private $params;
    
    private $request = [];
    
    private $url;
    private $services;
    private $serviceUrl;
    
    private $requestType;
    private $requestUrl;
    private $requestEndpoint;
    private $endpoints;
    

    public function __construct()
    {
        if ($this->hasValidConfig()) {
            $this->setup();

        } else {
            throw new \ErrorException('Invalid Config File');

        }

    }
    

    /**
     * Validate configuration file
     * @throws \ErrorException
     */
    protected function hasValidConfig()
    {
        
        $valid = true;

        if (!\Config::has('cart')) {
            throw new \ErrorException('Unable to find config file.');
            $valid = false;

        }

        $config = \Config::get('cart');

        return $valid;
    }
    

    /**
     * Setup config
     */
    protected function setup()
    {
        $config = \Config::get('cart');
        
        return $this;
    }
      
    
    /**
     * Set a parameter
     * @param string $key
     * @param string $value
     */
    public function setParam($key, $value)
    {
  
        if (array_key_exists($key, $this->params)) {
            $this->params[$key] = $value;
        }
    }
}
