<?php
if(isset($_POST['login'])) {
  header("Location: login.php");
  exit();
} elseif(isset($_POST['cadastro'])) {
  header("Location: cadastro.php");
  exit();
}
?>