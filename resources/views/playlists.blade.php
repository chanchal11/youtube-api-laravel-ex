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
        <link href="./css/playlists.css" rel="stylesheet">
        <link href="./css/navbar.css" rel="stylesheet">
        <link href="./css/basic.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>
            $(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });
        </script>
    </head>
    <body>

        <nav>
            <ul>
              <li><a class="kinder-brand" ><b>Your Playlists</b></a></li>
                <li><a href="/signout"> <span class=" glyphicon glyphicon-log-in">Logout</span></a></li>
                <li><a href="/home"><span class=" glyphicon glyphicon-home">Home</span></a></li>
                <li><a href="/home"> <span class=" glyphicon glyphicon-user">About</span> </a></li>
                
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
                @foreach ($playlists->items as $playlist)
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src="{{$playlist->snippet->thumbnails->medium->url}}" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                            {{ $playlist->snippet->title}}</h4>
                            <p class="group inner list-group-item-text">
                                {{ $playlist->snippet->description}}
                            </p>
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead"></p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                <a class="btn btn-success" href="http://localhost/playlist/{{$playlist->id}}">View list</a>
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
