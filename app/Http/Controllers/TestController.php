<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alaouy\Youtube\Youtube;
class TestController extends Controller
{
    public $youtube;
    public function testSum($num1,$num2){
        $num1 = (int)$num1;
        $num2 = (int)$num2;
        if($num1 < 0 && $num2 < 0)
            echo "both numbers must be positives.";
        else if($num1 + $num2 < 10 )
            return view('welcome');
        else
            echo "Sum of ".$num1." and ".$num2." is ".($num1 + $num2) ;
    }
    public function testYoutubeSearch($q){
        $youtube = new Youtube(getenv("YOUTUBE_API_KEY"));
        $response = $youtube->search($q,10);
        foreach($response as $data)
        //    echo $data->snippet->title."</br></br>";
             echo $data->snippet->thumbnails->medium->url."</br></br>";        
        
    }
    
    public function playlistSearch($list){
        $youtube = new Youtube(getenv("YOUTUBE_API_KEY"));
        $response = $youtube->getPlaylistItemsByPlaylistId($list);
        print_r($response);
    }

}
