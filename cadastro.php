<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"-->
  		<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  		<script  src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
		<title>Notícias</title>
    <style>
		body{background: #F8F8FF;
			color: #000000;}
		#topo{
			margin: auto;
			padding-top: 3%;
			background: #104E8B;
			width: 100%;
			height: 170px;
			text-align: center;
		}
		</style>
	</head>
	<body>
        <div id="topo" class="text-center">
            <h1>Stopnews</h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-primary bg-primary" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" style="color:white;" href="#"><h4></h4></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" style="color:white;" href="#"><h4>Notícias</h4><span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#"><h4>Política</h4></a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#"><h4>Economia</h4></a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#"><h4>Educação</h4></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#"><h4>Tecnologia</h4></a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" style="color:white;" href="#"><h4>Últimas notícias</h4></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:white;" href="login.php"><h4>Login</h4></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-dark my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
    </nav>
 <br><br><br><br>
				
		<?php

        // Variáveis recebem dados do POST (criptografados - ninguém vê)
        $n = $_POST["nome"];
        $e = $_POST["email"];
        $u = $_POST["usuario"];
        $s = $_POST["senha"];

        $erro = "Nada";
        $link = "#";
        $botao = "Botao";

        // Conectar o BD
        $conexao = new mysqli("localhost","root","","banco");

        // Verifica se está conectado
        if($conexao->error)
                die("Erro: " . $conexao->error);

        // Verifica dados de CADASTRO
        if(($n=="")||($e=="")||($u=="")||($s=="")){
                $erro = "Você deixou Campo(s) Vazio(s)!!!";
                $link = "cadastro.html";
                $botao = "Cadastro";
        }else{
                $sql = "INSERT INTO usuarios(nome,email,usuario,senha) 
                        VALUES ('{$n}','{$e}','{$u}','{$s}');";
                if($conexao->query($sql) === TRUE){
                        $erro = "{$n}, você foi cadastrado com sucesso!!!";
        $link = "login.html";
        $botao = "Login";
                }else{
                        $erro = "Cadastro não Realizado!!!";
                        //$erro += ", Erro: " . $sql . "<br>" . $conexao->error;
                }
        }
        $conexao->close();
        ?>
            <div class="container" style="height: 45%;">
            <div class="row">
            <div class="col-md-12 text-center"><h1>Cadastro</h1></div>
            </div>
            </div>
            <div class="container" style="height: 45%;">
            <div class="row">
            <div class="col-md-12"><h1>&nbsp;</h1></div>
            </div>
            </div>
            <div class="container">
            <div class="col-md-12" style="background: #104E8B ">
                <form action="<?php echo $link;?>">
                    <div class="row form">
                        <div class="form-group col-md-6">
                            <label>&nbsp;</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label>&nbsp;</label>
                        </div>
                    </div>
                    <div class="form">
                        <div class="form-group text-center">
                            <h4><b><i><?php echo $erro; ?></i></b></h4>
                        </div>
                        <div class="form-group">
                            <label>&nbsp;</label>
                        </div>
                        <div class="form-group col-md-12 text-center">
                            <button type="submit" class="btn btn-danger" style="width: 150px">Ir para <?php echo $botao;?></button>
                        </div>
                    </div>
                    <div class="row form">
                        <div class="form-group">
                            <label>&nbsp;</label>
                        </div>
                    </div>
                </form>
				</div>
				<div class="col-md-3">&nbsp;</div>
            </div><br><br><br>
            <footer class="section footer-classic context-dark bg-image" style="background: #104E8B;">
          <div class="container">
            <div class="row row-29">
              <div class="col-md-9 col-xl-5">
                <div class="brand" href=""></a><br>
                <img src="clima.jpg" class="img-fluid"/>
                  <p></p>
                  <center>
                  <p style="color:white;">© GrupoA 2018. Todos os direitos reservados.</p>
                  </center>
                </div>
              </div>
              <div class="col-md-4">
              <div class="col-md-4 col-xl-3">
                <h5 style="color:white;">Stopnews</h5>
                <ul class="nav-list">
                  <li><a href="#">Facebook</a></li>
                  <li><a href="#">Instagram</a></li>
                  <li><a href="#">Contatos</a></li>
                  <li><a href="#">Blog</a></li>
                </ul>
              </div>
              
              </div>
              <div class="col-md-4 col-xl-3">
                <h5 style="color:white;">Contato</h5>
                <ul class="nav-list">
                  <li><a href="#">Tel.: 21 3375-7905</a></li>
                  <li><a href="#"> Whatsapp: 21 99649-0839</a></li>
                  <li><a href="#">E-mail: Stopnews@gmail.com</a></li>
              </ul>
              </div>
            </div>
			</footer>
		</div>
		</div>
        </body>
    </html>