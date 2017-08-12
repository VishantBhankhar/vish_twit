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
        $this->varifyTokens();
        return $this->client->oauth_authenticate();
    }

    public function signedIn()
    {
        return false;
    }

    public function signIn()
    {
        if($this->hasCallBack())
        {
            $this->varifyTokens();
            return true;
        }
        return false;
    }

    protected function hasCallBack()
    {
        return isset($_GET['oauth_verifier']);
    }

    protected function requestTokens()
    {
        $reply=$this->client->oauth_requestToken([
           'oauth_callback' => $this->clientCallback
        ]);
        $this->storeTokens($reply->oauth_token, $reply->oauth_token_secret);
    }

    protected function storeTokens($token ,$tokenSecret)
    {
        $_SESSION['oauth_token']= $token;
        $_SESSION['oauth_token_secret']= $tokenSecret;
    }

    protected function varifyTokens()
    {
        $this->client->setToken($_SESSION['oauth_token'],$_SESSION['oauth_token_secret']);
    }

}
/**
 * Created by PhpStorm.
 * User: V_the_K!nG
 * Date: 8/12/2017
 * Time: 10:30 PM
 */