<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => 'mg.luku.co',
		'secret' => 'key-778040e3c9110975dd8fd7f4bc5b7599',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

	'google' => [
	   	'client_id' => '',
	   // 'client_id' => '1038196167526-euluve7af4mhfgde9vr79a8s1or4t8it',
	    'client_secret' => 'Z_Wq238T-bSWC5Azmyk2jSs6',
	    'redirect' => 'http://sximobuilder.com/sximodemo/sximo5/user/google',
	],

	'twitter' => [
	    'client_id' => '',
	    //'client_id' => 'q2NR24fPB2VtayTOMa6NDAG9s',
	    'client_secret' => 'deLBI0nVkllV1aAOrohk0X9nDJY1tognRQO2myJsGis9GnmBCY',
	    'redirect' => 'http://sximobuilder.com/sximodemo/sximo5/user/twitter',
	],

	'facebook' => [
	    'client_id' => '',
	    //'client_id' => '725712687473196',
	    'client_secret' => '97af69633d9f00e4d3d2e9929574d9e9',
	    'redirect' => 'http://sximobuilder.com/sximodemo/sximo5/user/facebook',
	],		

];
