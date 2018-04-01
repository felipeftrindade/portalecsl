<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
      <meta charset="utf-8">
      <meta name="description" content="Portal ECSL">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="Felipe Trindade">
      <title>Empreendendo com Software Livre</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/railscasts.min.css">
      <link rel="stylesheet" href="css/scribbler-global.css">
      <link rel="stylesheet" href="css/scribbler-landing.css">
  </head>
  <body>
    <header id="header">
      <nav>
        <div class="logo"></div>
        <ul class="menu">
          <div class="menu__item toggle"><span></span></div>
          <li class="menu__item"><a href="doc.html" class="link link--dark"><i class="fa fa-book"></i> Documentação</a></li>
          <li class="menu__item"><a href="" class="link link--dark"><i class="fa fa-github"></i> Github</a></li>
        </ul>
      </nav>
    </header>
    <div class="container">
      <div class="col-8 padding-right">
        @yield('content')
      </div>
      <div class="col-4">
          Menu lateral
          asdasdjaskldasda
          asdjkaskdasklda
          asdaskdadad
      </div>
    </div>
    <footer class="footer">TCC para a <a href="http://www.fatecsp.br/" target="_blank" class="link link--light">Fatec São Paulo</a>.</footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="js/scribbler.js"></script>
  </body>
</html>
