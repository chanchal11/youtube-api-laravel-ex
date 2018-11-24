<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Google_Client;
class LoginController extends Controller
{
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {
	/*	
		//its working
        $user = Socialite::driver($service)->user();
        $name = $user->getName();
        //return $name." Logged in";
        return view('home')->with('name',$name);
    */    
        $user = Socialite::driver($service)->user(); //'google'
		$token = $user->token;
		$client = new \Google_Client();
		$client->setScopes( array('https://www.googleapis.com/auth/youtube.readonly')); //'https://www.googleapis.com/auth/youtube'
		$youtube = new \Google_Service_YouTube($client);
		$client->setAccessToken($token);
		//problem says in the lines below
		$playlistsResponse = $youtube->playlists->listPlaylists('snippet, contentDetails', array(
				'mine' => 'true',
			));
		print_r($playlistsResponse);


    }


    public function testAPI() {
		$user = Socialite::driver('google')->user();
		$token = $user->token;
		$client = new \Google_Client();
		$client->setClientId("190446442166-ui5c2pffbt302qdkfhob99e1o8gibffo.apps.googleusercontent.com");
		$client->setClientSecret("EKu18xf7PxEp9_ZL0yLIXBEY");
		$client->setScopes('https://www.googleapis.com/auth/youtube');
		$youtube = new \Google_Service_YouTube($client);
		$client->setAccessToken($token);
		$channelsResponse = $youtube->channels->listChannels('id', array(
	      'mine' => 'true',
	    ));
		$userId = $channelsResponse['items'][0]['id'];
		$playlistsResponse = $youtube->playlists->listPlaylists('snippet, contentDetails', array(
				'mine' => 'true',
			));
		print_r($playlistsResponse);
	}
    
}
