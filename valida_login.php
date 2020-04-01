<?php
session_start();
$usuario_autenticado = false;
$usuario_id = null;
$perfil = [1 => "adminstrativo", 2 => "usuário" ];
$usuario_perfil = null;

//usuários do sistema
$usuarios_app = array(
    array('id' => 1, 'email' => 'adm@adm.com', 'senha' => '123', 'perfil' => 1),
    array('id' => 2, 'email' => 'teste@teste.com', 'senha' => 'abc', 'perfil' => 2),
    array('id' => 3, 'email' => 'ana@teste.com', 'senha' => '123', 'perfil' => 2),
    array('id' => 4, 'email' => 'rui@teste.com', 'senha' => '123', 'perfil' => 1)
);

foreach($usuarios_app as $user) { 
    if (($user['email'] == $_POST['email']) && ($user['senha'] == $_POST['senha'])){
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil = $user['perfil'];
    }
}

if ($usuario_autenticado){
    echo "Usuário autenticado";
    $_SESSION['autenticado'] = "sim";
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil'] = $usuario_perfil;
    header("location:home.php");
} else {
    $_SESSION['autenticado'] = "não";
    header("location:index.php?login=erro");
}

?>