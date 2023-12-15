<?php
 session_start(); 

 if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
     include_once('conexao.php');
     $email = $_POST['email'];
     $senha = $_POST['senha'];
 
     $sql = "SELECT * FROM tb_usuario WHERE em_usuario = '$email' AND sn_usuario = '$senha'";
     $user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
 
     if($user) {
         // sessão para o usuário usando nome como identificador, caso usuário e senha forem válidos
         $_SESSION['usuario_nome'] = $user['nm_usuario']; 
         header('Location: home.php'); 
         exit();
     } else {
         $_SESSION['erro_login'] = "Email ou senha incorretos!";
         header('Location: login.php');
         exit();
     }
 } else {
     header('Location: login.php');
     exit();
 }
 ?>
