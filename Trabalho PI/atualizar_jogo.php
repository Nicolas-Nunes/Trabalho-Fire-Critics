<?php
include 'conexao.php';

$id_jogo = $_POST['id_jogo'];
$nomeJogo = $_POST['nome_do_jogo'];
$desenvolvedor = $_POST['desenvolvedor'];
$dataLancamento = $_POST['data_de_lancamento'];
$genero = $_POST['genero'];
$plataformas = $_POST['plataformas'];

try {
    $query = "UPDATE tb_jogo SET nm_jogo = ?, nm_desenvolvedor = ?, dt_lancamento = ?, nm_genero = ?, nm_plataforma = ? WHERE id_jogo = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nomeJogo, $desenvolvedor, $dataLancamento, $genero, $plataformas, $id_jogo]);
    echo "Jogo atualizado com sucesso!";
    header('Location: lista_jogo.php');
    exit(); // Certifique-se de que o código seja interrompido após o redirecionamento
} catch (PDOException $e) {
    echo "Erro ao atualizar o jogo: " . $e->getMessage();
}
?>