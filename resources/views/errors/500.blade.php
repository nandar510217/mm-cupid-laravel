<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internal Server Error</title>
    <!-- Bootstrap -->
    <link href="{{url('assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('assets/css/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Fira+Code&display=swap");

    * {
    margin: 0;
    padding: 0;
    font-family: "Fira Code", monospace;
    }
    body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #ecf0f1;
    }

    .container {
    text-align: center;
    margin: auto;
    padding: 4em;
    img {
        width: 256px;
        height: 225px;
    }

    h1 {
        margin-top: 1rem;
        font-size: 35px;
        text-align: center;

        span {
        font-size: 60px;
        }
    }
    p {
        margin-top: 1rem;
    }

    p.info {
        margin-top: 4em;
        font-size: 12px;

        a {
        text-decoration: none;
        color: rgb(84, 84, 206);
        }
    }
    }

    </style>
</head>
<body>
    <div class="container">
        <img src="{{ url('assets/images/500_error.jpg') }}" class="rounded" />

        <h1>
          <span>500</span> <br />
          Internal server error
        </h1>
        <p>We are currently trying to fix the problem.</p>
        <a href="javascript:history.back()" class="btn btn-primary rounded-pill"><i class="fa fa-arrow-left"></i> Go back</a>
    </div>
</body>
</html>
