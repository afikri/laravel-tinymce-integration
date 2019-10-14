<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="{{asset('js/vendor/tinymce/tinymce.min.js')}}"></script>


    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link"
        });
    </script>
    <!-- Styles -->
    <style>
        html,
        body {
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
            text-align: left;
        }

        .title {
            font-size: 24px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                <h3>Laravel TinyMCE integration with MySQL on the Backend</h3>

                <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <textarea name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit">Add to Database</button>
                    </div>
                </form>
            </div>
            <table style="margin-top:15px;">
                <tbody>
                    <?php
                    $nr = 1;
                    foreach ($articles as $a) {
                        ?>
                        <tr>
                            <td>{{$nr}}</td>
                            <td>{!!$a->content!!}</td>
                        </tr>
                    <?php
                        $nr++;
                    } ?>
                </tbody>
            </table>

        </div>
    </div>


</body>

</html>