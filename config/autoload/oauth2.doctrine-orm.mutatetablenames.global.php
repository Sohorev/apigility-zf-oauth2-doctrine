<?php

return array(
    'zf-oauth2-doctrine' => [
        'mutatetablenames' => [
            'default' => [
                'access_token_entity'       => [
                    'entity'        => ZF\OAuth2\Doctrine\Entity\AccessToken::class,
                    'primary_table' => ['name' => 'oauth2_accesstoken']
                ],
                'authorization_code_entity' => [
                    'entity'        => ZF\OAuth2\Doctrine\Entity\AuthorizationCode::class,
                    'primary_table' => ['name' => 'oauth2_authorizationcode']
                ],
                'client_entity'             => [
                    'entity'        => ZF\OAuth2\Doctrine\Entity\Client::class,
                    'primary_table' => ['name' => 'oauth2_client']
                ],
                'jti_entity'                => [
                    'entity'        => ZF\OAuth2\Doctrine\Entity\Jti::class,
                    'primary_table' => ['name' => 'oauth2_jti']
                ],
                'jwt_entity'                => [
                    'entity'        => ZF\OAuth2\Doctrine\Entity\Jwt::class,
                    'primary_table' => ['name' => 'oauth2_jwt']
                ],
                'public_key_entity'         => [
                    'entity'        => ZF\OAuth2\Doctrine\Entity\PublicKey::class,
                    'primary_table' => ['name' => 'oauth2_publickey']
                ],
                'refresh_token_entity'      => [
                    'entity'        => ZF\OAuth2\Doctrine\Entity\RefreshToken::class,
                    'primary_table' => ['name' => 'oauth2_refreshtoken']
                ],
                'scope_entity'              => [
                    'entity'        => ZF\OAuth2\Doctrine\Entity\Scope::class,
                    'primary_table' => ['name' => 'oauth2_scope'],
                    'associations'  => [
                        'accessToken'       => ['joinTable' => ['name' => 'oauth2_accesstoken_to_scope']],
                        'authorizationCode' => ['joinTable' => ['name' => 'oauth2_authorizationcode_to_scope']],
                        'client'            => ['joinTable' => ['name' => 'oauth2_client_to_scope']],
                        'refreshToken'      => ['joinTable' => ['name' => 'oauth2_refreshtoken_to_scope']],
                    ],
                ],
            ],
        ],
    ],
);
