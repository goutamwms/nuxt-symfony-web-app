<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/1.0/auth/sso/saml2/login' => [[['_route' => 'api_login_saml2', '_controller' => 'App\\Controller\\AuthController::samlLogin'], null, ['POST' => 0], null, false, false, null]],
        '/api/1.0/login' => [[['_route' => 'api_login', '_controller' => 'App\\Controller\\AuthController::login'], null, ['POST' => 0], null, false, false, null]],
        '/api/1.0/auth/me' => [[['_route' => 'api_me', '_controller' => 'App\\Controller\\AuthController::getLoggedUser'], null, null, null, false, false, null]],
        '/api/1.0/auth/sso/saml2/metadata' => [[['_route' => 'api_get_auth_sso_saml2_metadata', '_controller' => 'App\\Controller\\AuthController::getMetadata'], null, null, null, false, false, null]],
        '/api/1.0/demo/validation' => [[['_route' => 'create_demo_validation', '_controller' => 'App\\Controller\\DemoValidationController::create'], null, ['POST' => 0], null, false, false, null]],
        '/api/1.0/nearby-places' => [[['_route' => 'nearby_places', '_controller' => 'App\\Controller\\FindLocationController::index'], null, ['POST' => 0], null, false, false, null]],
        '/api/1.0/healthcheck' => [[['_route' => 'app_health_check', '_controller' => 'App\\Controller\\HealthCheckController::index'], null, null, null, false, false, null]],
        '/api/1.0/healthcheck/logged' => [[['_route' => 'app_health_check_logged', '_controller' => 'App\\Controller\\HealthCheckController::logged'], null, null, null, false, false, null]],
        '/api/1.0/users' => [
            [['_route' => 'create_user', '_controller' => 'App\\Controller\\UserController::createUser'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'list_users', '_controller' => 'App\\Controller\\UserController::listUsers'], null, ['GET' => 0], null, false, false, null],
        ],
        '/api/1.0/auth/logout' => [[['_route' => 'app_logout'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api/1\\.0/(?'
                    .'|transactions/(?'
                        .'|user/([^/]++)(*:49)'
                        .'|([^/]++)(*:64)'
                    .')'
                    .'|users/([^/]++)(?'
                        .'|(*:89)'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:126)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        49 => [[['_route' => 'user_transactions', '_controller' => 'App\\Controller\\TransactionController::listUserTransactions'], ['userId'], ['GET' => 0], null, false, true, null]],
        64 => [[['_route' => 'transaction_edit', '_controller' => 'App\\Controller\\TransactionController::editTransaction'], ['id'], ['PUT' => 0], null, false, true, null]],
        89 => [
            [['_route' => 'get_user', '_controller' => 'App\\Controller\\UserController::getUserEntity'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'update_user', '_controller' => 'App\\Controller\\UserController::updateUser'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'delete_user', '_controller' => 'App\\Controller\\UserController::deleteUser'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        126 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
