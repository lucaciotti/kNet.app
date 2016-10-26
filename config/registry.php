<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Default registry table
    |--------------------------------------------------------------------------
    |
    | Default table name. You may change it to whatever you prefer
    |
    */

    'table' => 'system_registries',

    /*
    |--------------------------------------------------------------------------
    | Cache timestamp
    |--------------------------------------------------------------------------
    |
    | Used for multi-instance web servers. This can be used to ensure
    | the registry for all instances are kept up to date.
    |
    | For Redis: \\Torann\\Registry\\Timestamps\\Redis
    |
    */

    'timestamp_manager' => '',

    /*
    |--------------------------------------------------------------------------
    | Cache file path
    |--------------------------------------------------------------------------
    |
    | Where to store the json cache file
    |
    */

    'cache_path' => storage_path().'/app',

    /*
    |--------------------------------------------------------------------------
    | Force Type Cast String if val starts with '0'
    |--------------------------------------------------------------------------
    |
    | Where to store the json cache file
    |
    */

    'force_string' => true,

    /**
     * Copy thi to line 256 in /vendor/torann/registry/src/Torann/Registry/Registry.php
     *  protected function forceTypes($data)
     *  {
     *        if (in_array($data, array('true', 'false')))
     *        {
     *            $data = ($data === 'true' ? 1 : 0);
     *        }
     *        else if (substr($data,0,1)=='0' && $this->config['force_string'])
     *        {
     *          $data = (string) $data;
     *        }
     *        else if (is_numeric($data))
     *        {
     *            $data = (int) $data;
     *        }
     *        else if (is_string($data))
     *        {
     *          $data = (string) $data;
     *        }
     *        else if (gettype($data) === 'array')
     *        {
     *            foreach($data as $key=>$value)
     *            {
     *                $data[$key] = $this->forceTypes($value);
     *            }
     *        }
     *
     *            return $data;
     *        }
     *
     */
);
