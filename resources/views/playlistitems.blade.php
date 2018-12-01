<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TryTube</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="http://localhost/css/playlists.css" rel="stylesheet">
        <link href="http://localhost/css/navbar.css" rel="stylesheet">
        <link href="http://localhost/css/basic.css" rel="stylesheet">
        <link href="http://localhost/css/select.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
        <script>
    var arr = [], json_data_init_flag = false, count =  {{$playlist['item_count'][ $playlist['items'][0]->snippet->playlistId] }};       
    
    $(document).ready(function () {

        $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        
    });

    function initArray()
    {
        for(var i=0;i<count;i++){
            arr[i] = {};
        }
    }

    function onselectHandler(button_num,type,playlistId,id){
        _('b'+button_num).innerHTML = type;
        arr[button_num] = {[id]:type};
        alert(JSON.stringify(arr));
    }
    function _(id){
        return document.getElementById(id);
    }

    function onSubmit(){
        //alert('About to submit');
        $.ajax({
            type: "GET",
            url: "/postselection",
            data: 'a='+JSON.stringify(arr)+"&b={{$playlist['items'][0]->snippet->playlistId}}" ,
            contentType: "JSON",
            success: function(data) {
                console.log("All is well.");
                console.log(data);
                alert(data);
            },
            failure: function(){
                    console.log("Some problem occured.");
                 }
        });
        //alert('After submit');
    }
    initArray();
        </script>


    </head>
    <body>

        <nav>
            <ul>
            <li><a class="kinder-brand" ><b>{{$playlist['title']}}</b></a></li>
                <li><a href="/signout"> <span class=" glyphicon glyphicon-log-in">Logout</span></a></li>
                <li><a href="/home"><span class=" glyphicon glyphicon-home">Home</span></a></li>
                <li><a href="/profile"> <span class=" glyphicon glyphicon-user">About</span> </a></li>
                <li><a class="btn btn-success" onclick="onSubmit();"><span class="glyphicon glyphicon-cloud-upload"></span> Submit</a></li>
            </ul>
        </nav>
      

        <div class="container">
            <div class="row">
                <div class="col-lg-12 my-3">
                    <div class="pull-right">
                        <div class="btn-group">
                            <button class="btn btn-info" id="list">
                                List View
                            </button>
                            <button class="btn btn-danger" id="grid">
                                Grid View
                            </button>
                        </div>
                    </div>
                </div>
            </div> 
            <div id="products" class="row view-group">
                @set('i','0')
                @foreach ($playlist['items'] as $video)
                    @if( $playlist['cat'][$video->snippet->playlistId][$video->id] != "_" )
                        @continue
                    @endif
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="{{$video->snippet->thumbnails->medium->url}}" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                            {{ $video->snippet->title}}</h4>
                            <p class="group inner list-group-item-text">
                                {{ $video->snippet->description}}
                            </p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead"></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                
                                        <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="b{{$i}}">
                                                        Select Category
                                                </button>
                                                <div class="dropdown-menu">
                                                  <a class="dropdown-item"  onclick="onselectHandler({{$i}},'Music','{{ $video->snippet->playlistId}}','{{ $video->id}}');" >Music</a>
                                                  <a class="dropdown-item"  onclick="onselectHandler({{$i}},'Study','{{ $video->snippet->playlistId}}','{{ $video->id}}');" >Study</a>
                                                  <a class="dropdown-item"  onclick="onselectHandler({{$i}},'Movies','{{ $video->snippet->playlistId}}','{{ $video->id}}');" >Movies</a>
                                                  @set('i',$i+1)
                                                </div>
                                          </div>                 

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach            
            </div>
        </div>
    </body>
</html>
