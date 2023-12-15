<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        fieldset {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        legend {
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<a href="index.php">Voltar</a>

<fieldset>
    <legend>Cadastro</legend>
    <form method="POST"> 
        <label for="nome"> Nome completo:</label><br>
        <input type="text" id="nome" name="nome" required><br> 
        
        <label for="email"> Email:</label><br>
        <input type="email" id="email" name="email" required><br> 
        
        <label for="senha"> Senha: </label><br>
        <input type="password" id="senha" name="senha" required><br> 

        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
       
        require_once("conexao.php");

        try {
            $stmt = $pdo->prepare("INSERT INTO tb_usuario (nm_usuario, em_usuario, sn_usuario) VALUES (?, ?, ?)");
            $stmt->execute([$nome, $email, $senha]);
            echo "Dados inseridos com êxito!";
            die();
        } catch (PDOException $e) {
            echo "Falha na inserção de dados." . $e->getMessage();
        }
    }
    ?>
</fieldset>

</body>
</html>