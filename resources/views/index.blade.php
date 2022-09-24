<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/Group1.png') }}" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <style>
        .hero-text a {
            text-decoration: none;
            color: #ffff;
        }

        body,
        html {
            height: 100%;
        }

        /* The hero image */
        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url("{{ asset('images/construct.jpg') }}");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        /* Place text in the middle of the image */
        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        .hero-text h1 {
            font-size: 55px;
            font-weight: 513;
        }

        .hero-text p {
            font-size: 19px;
        }

        /* hover button css */

        html *,
        html *:before,
        html *:after {
            box-sizing: border-box;
            transition: 0.5s ease-in-out;
        }

        html i,
        html em,
        html b,
        html strong,
        html span {
            transition: none;
        }

        *:before,
        *:after {
            z-index: -1;
        }

        h3 {
            color: orange
        }

        h1,
        h4 {
            font-family: "Raleway", "Open Sans", sans-serif;
            margin: 0;
            line-height: 1;
        }

        a {
            text-decoration: none;
            line-height: 80px;
            color: black;
        }

        .centerer {
            width: 100%;
            max-width: 600px;
            /* margin: 0 auto;
            padding: 0 1rem; */
        }

        @media (min-width: 600px) {
            .wrap {
                width: 50%;
                /* float: left; */
                margin: auto
            }
        }

        [class^=btn-] {
            position: relative;
            display: block;
            overflow: hidden;
            width: 100%;
            height: 80px;
            max-width: 250px;
            margin: 1rem auto;
            text-transform: uppercase;
            border: 1px solid currentColor;
        }


        .btn-5 {
            color: white;
        }

        .btn-5:after {
            content: "";
            width: 0;
            height: 0;
            -webkit-transform: rotate(360deg);
            border-style: solid;
            border-width: 0 0 0 0;
            border-color: transparent #023047 transparent transparent;
            position: absolute;
            top: 0;
            right: 0;
        }

        .btn-5:before {
            content: "";
            width: 0;
            height: 0;
            -webkit-transform: rotate(360deg);
            border-style: solid;
            border-width: 0 0 0 0;
            border-color: transparent transparent transparent #023047;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .btn-5:before,
        .btn-5:after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border: 0 solid;
            transform: rotate(360deg);
        }

        .btn-5:before {
            bottom: 0;
            left: 0;
            border-color: transparent transparent transparent #023047;
        }

        .btn-5:after {
            top: 0;
            right: 0;
            border-color: transparent #023047 transparent transparent;
        }

        .btn-5:hover {
            color: #219ebc;
        }

        .btn-5:hover:before,
        .btn-5:hover:after {
            border-width: 80px 262.5px;
        }


        @-webkit-keyframes criss-cross-left {
            0% {
                left: -20px;
            }

            50% {
                left: 50%;
                width: 20px;
                height: 20px;
            }

            100% {
                left: 50%;
                width: 375px;
                height: 375px;
            }
        }

        @keyframes criss-cross-left {
            0% {
                left: -20px;
            }

            50% {
                left: 50%;
                width: 20px;
                height: 20px;
            }

            100% {
                left: 50%;
                width: 375px;
                height: 375px;
            }
        }

        @-webkit-keyframes criss-cross-right {
            0% {
                right: -20px;
            }

            50% {
                right: 50%;
                width: 20px;
                height: 20px;
            }

            100% {
                right: 50%;
                width: 375px;
                height: 375px;
            }
        }

        @keyframes criss-cross-right {
            0% {
                right: -20px;
            }

            50% {
                right: 50%;
                width: 20px;
                height: 20px;
            }

            100% {
                right: 50%;
                width: 375px;
                height: 375px;
            }
        }

        /*******************************/
        /********* floating icon css **********/
        /*******************************/

        .fostrap-logo {
            width: 100px;
            margin-bottom: 15px;
            animation: float 1.5s ease-in-out infinite;
        }


        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }
    </style>
    <title>Cube Engineering and supplies ltd</title>
</head>

<body>
    <div class="hero-image">
        <div class="hero-text">
            <img src="{{ asset('images/Group1.png') }}" class="fostrap-logo" width="100px" alt="">
            <h3>Welcome to</h3>
            <h1>CUBE ENGINEERING <br> AND SUPPLIES LTD</h1>
            <div class="centerer">
                <div class="wrap">
                    <a class="btn-5" href="{{ route('home') }}">Visit Us</a>
                </div>
            </div>
        </div>
    </div>
    {{-- js --}}
    <script>
        $(function() {
            $('.btn-6')
                .on('mouseenter', function(e) {
                    var parentOffset = $(this).offset(),
                        relX = e.pageX - parentOffset.left,
                        relY = e.pageY - parentOffset.top;
                    $(this).find('span').css({
                        top: relY,
                        left: relX
                    })
                })
                .on('mouseout', function(e) {
                    var parentOffset = $(this).offset(),
                        relX = e.pageX - parentOffset.left,
                        relY = e.pageY - parentOffset.top;
                    $(this).find('span').css({
                        top: relY,
                        left: relX
                    })
                });
        });
    </script>
</body>

</html>
