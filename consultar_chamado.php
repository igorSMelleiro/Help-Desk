<?php
    require_once('validador_acesso.php');
//abrir o arquivo com a opção "r" read/leitura
$arquivo = fopen('arquivo.txt', 'r').

//criamos o array para conter os chamados
$chamados = array();

//enquanto houver registros (linhas) no arquivo a serem recuperados
while(!feof($arquivo))
{//testa pelo fim do arquivo
  $registro = fgets($arquivo);// retorna o conteudo da linhas
  $chamados[] = registro; //instanciamos o array com o chamado
}
//fechando o arquivo
fclose($arquivo);
?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

	<?php
	session_start();

	if (!isset($_SESSION['Autenticado'])
    or $_SESSION['Autenticado'] != 'SIM') {
        header('location:index.php?login=erro2');
	}
    ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">
      <div class="row">

        <div class = "card-consultar-chamado">
          <div class = "card">
            <div class = "card-header">
              consulta de chamado
            </div>

            <div class = "card-body">

              <?php foreach($chamados as $chamado)
              {
                $chamado_dados = explode('#',
                $chamado);
                 if($_SESSION['perfil1'] == 2)
                {
                  //só exibe os proprios chamados
                  if ($_SESSION['id'] !=$chamado_dados[0])
                  {
                    continue;
                  }
                }
                  if (count($chamado_dados) <3)
                  {
                    continue;
                  }
              ?>

                  <div class = "card mb-3 bg-light">
                    <div class = "card-body">
                      <h5 class = "card-title">
                      <?php echo $chamado_dados[1]; ?>
                    </h5> <!-- no php7 pode-se usar  -->
                    <h6 class = "card-subtitle mb-2 text-muted">
                      <?php echo $chamado_dados[2]; ?></h6>
                      <p class = "card-text"><?php echo $chamado_dados[3];?> </p>

                   </div>
                 </div>
               <?php  ?>
               <div class = "row mt-5">
                 <div class = "col-6">
                   <a class = "btn btn-lg btn-warning
                   btn-block" href="home.php">Voltar</a>
                 </div>
               </div>
             </div>
              </div>
               </div>
                </div>
                 </div>
      </body>
</html>