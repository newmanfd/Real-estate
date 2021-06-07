<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Real Estate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <!-- asset means pulls in from the public folder -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 35px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Go to Admin panel</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        <!--<@if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif-->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md text-center">
                    View properties in: <br>
                    {!! Form::open(['action' => 'PropertiesController@nicosia', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::submit('Nicosia', ['class' => 'btn btn-primary']) }} 
                    {!! Form::close() !!}
                    
                    {!! Form::open(['action' => 'PropertiesController@larnaca', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::submit('Larnaca', ['class' => 'btn btn-primary']) }} 
                    {!! Form::close() !!}
                    
                    {!! Form::open(['action' => 'PropertiesController@ammochostos', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::submit('Ammochostos', ['class' => 'btn btn-primary']) }} 
                    {!! Form::close() !!}
                    
                    {!! Form::open(['action' => 'PropertiesController@limassol', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::submit('Limassol', ['class' => 'btn btn-primary']) }} 
                    {!! Form::close() !!}
                    
                    {!! Form::open(['action' => 'PropertiesController@pafos', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::submit('Pafos', ['class' => 'btn btn-primary']) }} 
                    {!! Form::close() !!}

                    
                    <h5>-OR-</h5>        
                    <a href="/properties/index" class="btn btn-info text-white">View all cities</a><br>
                    <h5>{{ count($properties_count) }} properties in total listed!</h5>   
                </div>
            </div>
        </div>
    </body>
</html>
