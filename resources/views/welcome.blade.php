<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
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
            <input type="file" id="avatar">
            <button onclick="upload()">Upload</button>
        </div>
        <script src="{{asset('user/js/jquery/jquery-2.2.4.min.js')}}"></script>
        <script>
            function upload(){
                var file = $('#file').prop('files')[0]; // Select file with id="file"
                var dataSend = new FormData(); // Create new object formData
                dataSend.append('avatar',file); // Send field avatar to server
                dataSend.append('_token','{{csrf_token()}}'); // Send field token to verify laravel
                $.ajax({
                    url:"{{route('upload')}}",
                    type:"POST",
                    dataType:"text",
                    contentType:false,
                    processData:false,
                    data:dataSend,
                    success:function(resp){
                        console.log(resp);
                    },
                    error:function(err){
                        console.log(err);
                    }
                })
            }
        </script>
    </body>
</html>
