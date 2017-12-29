<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => '\\OAuth\\Common\\Storage\\Session',

	/**
	 * Consumers
	 */
	'consumers' => [

        'Google' => [
            'client_id'     => '646690944402-p2nkrds14mbt2047i8hsc450rqh0fgcr.apps.googleusercontent.com',
            'client_secret' => '6eVx1XxWH6kJzALZElC77D8a',
            'scope'         => ['userinfo_email', 'userinfo_profile'],
        ],

        'Facebook' => [
            'client_id'     => '175690769674676',
            'client_secret' => 'cf1b37259cecb6c32d71304ca99ba881',
            'scope'         => ['public_profile', 'email'],
        ],

    ]

];