<!DOCTYPE html>
<html>
<head>
  <title>Tela Inicial</title>
  <style>

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f5f5f5;
    }

    .container {
      text-align: center;
    }

    h1 {
      color: #333;
    }

    button {
      padding: 10px 20px;
      margin: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      background-color: #4CAF50;
      color: white;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1>Bem-vindo ao Fire Critics!</h1>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <button type="submit" name="login">Login</button>
      <button type="submit" name="cadastro">Cadastre-se</button>
    </form>
  </div>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['login'])) {
      header("Location: login.php");
      exit();
    } elseif(isset($_POST['cadastro'])) {
      header("Location: cadastro.php");
      exit();
    }
  }
  ?>

</body>
</html>