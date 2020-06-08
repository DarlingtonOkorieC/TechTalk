<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AfriTechTalk</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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
                color: #636b6f;
                margin-top: 14rem;
                text-align: center;
            }

            .title {
                font-size: 84px;
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
                color: #636b6f;
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

            <div class="content">
                <div class="title m-b-md text-center">
                   <a href="{{ route('login') }}" style="text-decoration:none; color: #636b6f;">TechTalk.com</a>
                </div>
                <p class="text-center">Start Stack Talks</p>

                <div class="links">
                    <a href="/login">Email Login</a>
                    <a href="{{ route('forum') }}" style="text-decoration:none">Head to forum</a>
                </div>
            </div>
        </div>
    </body>
</html>
