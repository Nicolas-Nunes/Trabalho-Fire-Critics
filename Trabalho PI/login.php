<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      font-family: sans-serif;
      background-color: #f5f5f5;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh; 
      margin: 0; 
    }
    .form-container {
      width: 300px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <a href="index.php">Voltar</a>
    <h1>Login</h1>
    <form action="testelogin.php" method="POST">
      <input type="email" name="email" placeholder="Email" required>
      <br><br>
      <input type="password" name="senha" placeholder="Senha" required>
      <br><br>
      <input class="inputsubmit" type="submit" name="submit" value="Enviar">
    </form>
  </div>
</body>
</html>