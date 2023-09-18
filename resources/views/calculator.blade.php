<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin Template for Bootstrap</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/calculator.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
{{--todo pattern--}}
<body class="text-center">
<div class="container">
    <div class="row m-5 d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control" id="expression" placeholder="Ваш пример...">
                <button class="btn btn-primary btn-lg" onclick="calculate()">=</button>
            </div>
        </div>
    </div>
</div>
<div class="container" id="results">

</div>
<script type="text/javascript" src="{{ asset('js/calculator.js') }}"></script>
</body>
</html>
