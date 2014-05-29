<?php

return array(
    'base_path' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'title' => 'Framework baru',
    /*
     * base url for domain and path 
     */
    'base_url' => 'http://hisyam-pc/posyandu/',
    /**
     *  assets url
     */
    'assets_url' => 'http://hisyam-pc/posyandu/assets/',
    /* default router where the default class and action should be called
     * controller is a class name
     * action is a function name
     * 
     */
    'router' => array(
        'controller' => 'Login',
        'parameter' => array()),
    /*
     * modules is an autoload mechanism
     */
    'moduls' => array('auth' => 'app\core\Auth'),
    /*
     * database configuration
     * we can use multiple database connection at same time
     */
    'database' => array(
        /*
         * the first database configuration
         */
        'db' => array(
            'driver' => 'mysqli',
            'host' => 'localhost',
            'database' => 'posyandu',
            'username' => 'root',
            'password' => '1234',
            'port' => '3306',
            'persistent' => false,
            'autoinit' => true,
        )
    ),
    'encoding' => 'UTF-8',
    /**
     * set time zone
     */
    'timezone' => 'UTC',
    /**
     * set session name
     */
    'session' => array(
        'login_url' => '',
        /**
         * set session name
         */
        'session_name' => 'framework',
        /**
         * session time expiration
         * default 2 weeks
         */
        'session_expire' => 3600 * 24 * 14),
    
    /**
     * cache configuration
     */
    'cache' => array('driver' => 'file')
);

