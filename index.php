<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <!-- ACTION manda as requisições pro servidor
              METHOD POST manda manda sem ficar os dados na URL-->
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <!-- colocar o name pro servidor identificar -->
                  <input name= "email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <!-- colocar name pro servidor identificar -->
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <?php
                //se o indice login esta setado dentro da get e se ela tem valor = erro (q foi colocado la no header e redirecionamento do else na validação)
                if (isset($_GET['login']) && $_GET['login'] == 'erro') {
                  
                ?>

                <!--mostra o texto no html | mantem ele no bloco do if mas fora da codificação php (por isso se abre e fecha depois para fechar as chaves do if) -->
                <div class="text-danger">Usuário ou senha inválidos</div>

                <?php

                }

                ?>

                <?php
                //se o indice login esta setado dentro da get e se ela tem valor = erro (q foi colocado la no header e redirecionamento do else na validação)
                if (isset($_GET['login']) && $_GET['login'] == 'erro2') {
                  
                ?>

                <!--mostra o texto no html | mantem ele no bloco do if mas fora da codificação php (por isso se abre e fecha depois para fechar as chaves do if) -->
                <div class="text-danger">Faça o login antes de acessar as paginas protegidas</div>

                <?php

                }

                ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>