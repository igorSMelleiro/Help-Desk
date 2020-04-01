<?PHP
session_start();
/*
echo "<pre>";
    print_r($_SESSION);
echo "</pre>";
*/
//remover indice de um array (sessão)
//unset()

// unset($_SESSION['autenticado']); // para remover o índice se existir


//destruir a variável de sessão
//session_destroy()

session_destroy(); // será destruída, mas continua ativa até a próxima requisição

//forçar redidecionamento
header('location:index.php');
?>