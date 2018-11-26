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
	<font size="90" face="Arial Black" color="#eeff00">
		StopNews
	</font>
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
        <a class="nav-link" style="color:white;" href="#"><h4>Login</h4></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
      <button class="btn btn-dark my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
    </nav>
    <div class="container">
				<center>
			<?php
				// Inicializar SESSION para utilizar nesta PAGINA
				session_start();

				// Variáveis recebem dados do POST (criptografados - ninguém vê)
				$u = $_POST["usuario"];
				$s = $_POST["senha"];

				$erro = 0;

				// Conectar o BD
				$conexao = new mysqli("localhost","root","","banco");

				// Verifica se está conectado
				if($conexao->error)
					die("Erro: " . $conexao->error);
				
				// Verifica LOGIN
				if(($u=="")||($s=="")){
					echo "<meta http-equiv='refresh' content='2;URL=login.html'>";
					echo "<br><br><h3><i>Você deixou Campo(s) Vazio(s)!!!</i></h3>";
				}else{
					$sql = "SELECT * FROM usuarios;";
					$resultado = $conexao->query($sql);
					while($campo = $resultado->fetch_assoc()){
						if(($u==$campo["usuario"])&&($s==$campo["senha"])){
							if($u=="admin"){
								echo "<meta http-equiv='refresh' content='3;URL=admin.php'>";
							echo "<br><br><h3><i>Redirecionando...</i></h3>";
							}else{
								echo "<meta http-equiv='refresh' content='3;URL=index.php'>";
								echo "<br><br><h3><i>Redirecionando...</i></h3>";
							}
							$_SESSION["usuario"] = $campo["nome"];
							$erro = 0;
							break;
						}else{
							$erro = 1;
						}
					}
					if($erro==1){
						echo "<meta http-equiv='refresh' content='2;URL=login.html'>";
						echo "<br><br><h3><i>Os Dados informados são Inválidos!!!</i></h3>";
					}
				}
				$conexao->close();
			?>
            </center>
            <br><br><br><br>
    </div>
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
            </div>
        </footer>
  </body>
</html>
             