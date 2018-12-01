<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Google_Client;
class LoginController extends Controller
{
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->scopes(['https://www.googleapis.com/auth/youtube','https://www.googleapis.com/auth/plus.login'])->redirect();
    }

    public function handleProviderCallback(Request $request,$service)
    {
	/*	
        $user = Socialite::driver($service)->user();
        $name = $user->getName();
        //return $name." Logged in";
        return view('home')->with('name',$name);
    */    
		
        $user = Socialite::driver("google")->user(); //'google'
		$token = $user->token;
		$request->session()->push('email',$user->getEmail());
		//$request->session()->push('token',$user->token);
		//die($token);
		if($service=='google'){
			$client = new \Google_Client();
			$client->setClientId("XXXXXXXXXXXXXXX.apps.googleusercontent.com");
			$client->setClientSecret("XXXXXXXXXXXXXXX");
			$client->setScopes( array('https://www.googleapis.com/auth/youtube.readonly')); //'https://www.googleapis.com/auth/youtube'
			$youtube = new \Google_Service_YouTube($client);
			$client->setAccessToken($token);
			//$channelsResponse = $youtube->channels->listChannels('id', array('mine' => 'true',));
			//$userId = $channelsResponse['items'][0]['id'];
			$playlistsResponse = $youtube->playlists->listPlaylists('snippet,contentDetails', array(
					'mine' => 'true',
				));

				$playlists = array();
				$cat = array();  
				foreach($playlistsResponse->items as $item){
					$playlists[$item->id] = $youtube->playlistItems->listPlaylistItems('snippet', array(
						'playlistId' => $item->id,
						'maxResults' => 50
					  ));
					  $playlistnames[$item->id] = $item->snippet->title;
					  
					  $temp_array = array();
					  foreach($playlists[$item->id]->items as $item1)
					  {
							$temp_array[$item1->id] = "_";
					  }
					  $cat[$item->id] = $temp_array;
					   
				}
				//print_r($cat);  
				$request->session()->push('playlists',$playlistsResponse);
				$request->session()->push('playlists-items',$playlists);
				$request->session()->push('playlists-names',$playlistnames);
				$request->session()->push('category',$cat);		
			return redirect('/playlists');
		}
		else
		{
			$name = $user->getName();
        	return view('home')->with('name',$name); 
		}

    }


    public function testAPI(Request $request,$var) {
		/*
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
		*/
		/*
		$cat1 =  new \App\category();
		$cat1->playlist = "PLdkjdl";
		$cat1->videoid = "vidkds";
		$cat1->type = "Music";
		$cat1->save();
		*/
		return json_encode($request->session()->get($var)[0]);
	}
    
}
