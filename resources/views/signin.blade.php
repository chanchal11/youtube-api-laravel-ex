<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TryTube | Login with Google | Cateloger</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="http://localhost/css/playlists.css" rel="stylesheet">
        <link href="http://localhost/css/navbar.css" rel="stylesheet">
        <link href="http://localhost/css/basic.css" rel="stylesheet">
        
    </head>
    <body>

        <nav>
            <ul>
            <li><a class="kinder-brand" ><b>TryTube</b></a></li>
                <li><a href="/login/google"> <span class=" glyphicon glyphicon-log-in"></span></a></li>
                <li><a href="/home"><span class=" glyphicon glyphicon-home"></span></a></li>
                <li><a href="/profile"> <span class=" glyphicon glyphicon-user"></span> </a></li>
                
            </ul>
        </nav>
      
        <div class="main col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xs-offset-0 col-sm-offset-0 col-md-offset-4 col-lg-offset-4 toppad" >


            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"> Authentication </h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="/css/2.png" class="img-circle img-responsive"> </div>
                  <div class=" col-md-9 col-lg-9 ">
                    
                    <p>
                        Welcome to TryTube. TryTube is an app to manage your youtube account 
                        and helps you to get catogorized video types using <b>Youtube Data API V3</b>   
                    </p>
                        <a href="/login/google" class="btn btn-primary">Sign in with Google</a>  
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>

            </div>
          </div>

    </body>
</html>
