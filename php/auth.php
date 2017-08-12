<?php

class auth{
    protected  $client;
    protected $clientCallback = 'https://vishtwit.herokuapp.com/php/callback.php';

    public function __construct(\Codebird\Codebird $client)
    {
        $this->client= $client;
    }

    public function getAuthUrl()
    {
        $this->requestTokens();
    }

    protected function requestTokens()
    {
        $reply=$this->client->oauth_requestToken([
           'oauth_callback' => $this->clientCallback
        ]);

        var var_dump($reply);
    }

}
/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/12/2017
 * Time: 10:30 PM
 */