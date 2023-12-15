<?php
include 'conexao.php';

$nomeJogo = $_POST['nome_do_jogo'];
$desenvolvedor = $_POST['desenvolvedor'];
$dataLancamento = $_POST['data_de_lancamento'];
$genero = $_POST['genero'];
$plataformas = $_POST['plataformas'];

try{
    $query = "INSERT INTO tb_jogo (nm_jogo, nm_desenvolvedor, dt_lancamento, nm_genero, nm_plataforma) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nomeJogo, $desenvolvedor, $dataLancamento, $genero, $plataformas]);
    echo "Jogo cadastrado com sucesso!";
    header('Location: lista_jogo.php');
    exit();
} catch (PDOException $e) {
    echo "Erro ao cadastrar o jogo: " . $e->getMessage();
}
?>
