<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<header>
    <nav class="navbar navbar-expand-lg navbar-light" >
<div class="collapse navbar-collapse" id="navbar">
    <a href="/" class="navbar-brand">
    <img src="/img/manutencao.png" alt="manutencao">
</a>
<ul class="navbar-nav">


    <li class="nav-item">
        <a href="/agendas/create" class="nav-link">Agendar </a>
    </li>
      @auth
    <li class="nav-item">
        <a href="/dashboard" class="nav-link">Meus Agendamentos </a>
    </li>
    <li class="nav-item">
        <form action="/logout" method="POST">
        @csrf
        <a href="/logout"
         class="nav-link"
         onclick="event.preventDefault();
                 this.closest('form').submit();">
                 Sair
                </a>
        </form>
    </li>
    @endauth
   @guest
   <li class="nav-item">
        <a href="/login" class="nav-link">Entrar </a>
    </li>
    <li class="nav-item">
        <a href="/register" class="nav-link">Cadastrar </a>
    </li>
   @endguest
</ul>
</div>

    </nav>


</header>



    <title>@yield('title')</title>




    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/styles.css">

</head>

<body>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>

    <script src="/js/jquery.mask.min.js"></script>



<main>
    <div class="container-fluid">
        <div class="row">
         @if(session('msg'))
         <pc class="msg">{{ session('msg')}}</p>
         @endif
        @yield('content')
        </div>
    </div>
</main>
    <footer>
        <p>rbso &copy; 2021</p>
    </footer>



</body>

</html>
