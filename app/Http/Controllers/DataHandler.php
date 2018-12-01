<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
class DataHandler extends Controller
{
    public function signIn(Request $request){

        if($request->session()->get('email')===null)
        {
            return view('signin');
        }
        else {
            return redirect('/playlists');
        }
    }
    public function signOut(Request $request){

        if($request->session()->get('email')===null)
        {
            return redirect('/signin');
        }
        else {
            $request->session()->flush();
            return redirect('/signin');
        }
        
    }
    public function home(Request $request){
        if($request->session()->get('email')===null)
        {
            return redirect('/signin');
        }
        else {
            return redirect('/playlists');
        }
    }

    public function getPlaylists(Request $request){
        return view('playlists')->with('playlists',$request->session()->get('playlists')[0]);
    }

    public function getPlaylistItems(Request $request,$playlistId){
        $playlist = array('title'=> $request->session()->get('playlists-names')[0]["$playlistId"], 'items' => $request->session()->get('playlists-items')[0][$playlistId]->items , 'cat' => $request->session()->get('category')[0], 'item_count' => $request->session()->get('item_count')[0] );
        return view('playlistitems')->with('playlist',$playlist);
    }

    public function setCategories(Request $request){
        $data = json_decode($request->get('a'), true);
        $playlistId =$request->get('b');
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();
        $output->writeln(">>>----------------<<<");
        //print_r($data);
        
        /*foreach($data as $item)
             foreach(array_keys($item) as $key)   
                 print_r($key);
        */
        $cat =  $request->session()->get('category')[0];
        // $cat["$playlistId"] = 
        //$temp_array = $cat["$playlistId"];
        foreach($data as $item){

            foreach(array_keys($item) as $key){
                $cat[$playlistId][$key] = $item[$key];
            }    
        }
        //print_r($cat);
        $request->session()->forget('category');
        $request->session()->push('category',$cat);
        return "categories set successfully.";
    }
}
