<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Steward</title>

    <link rel="stylesheet" href="{{$conf["bs_css"]}}">

    <script src="{{$conf["bs_js"]}}"></script>
    <script src="{{$conf["jquery"]}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.6.7/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Steward</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-content-end">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{$conf["url"]}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Reabastecimento
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/carros">Carros</a></li>
                        <li><a class="dropdown-item" href="/reabastecimento">Registros</a></li>
                        {{--<li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-2">
    @include($view)
</div>
</body>

<script>
    $( document ).ready(function() {
        //console.log( "ready!" )
        let token = localStorage.getItem("jwt")

        if( (token === null || token === "") && sessionStorage.getItem("login") !== "1") {
            sessionStorage.setItem("login", "1")
            window.location.replace("/login")
        }
    })
</script>

<style>
    body{
        background-color: #eee;
    }
</style>

</html>
