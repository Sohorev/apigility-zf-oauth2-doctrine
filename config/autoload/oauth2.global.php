<?php
return array(
    'zf-oauth2' => array(
        'storage' => 'oauth2.doctrineadapter.default',
        'allow_implicit' => true,
        'access_lifetime' => 3600,
        'options' => array(
            'always_issue_new_refresh_token' => false,
            'refresh_token_lifetime' => 664800,
        ),
        'grant_types' => array(
            'client_credentials' => false,
            'authorization_code' => true,
            'password'           => true,
            'refresh_token'      => true,
            'jwt'                => false,
        ),
    ),
);
