<?php
include_once('conexao.php');

// verificando se o id do jogo foi passado via get
if (isset($_GET['id'])) {
    $id_jogo = $_GET['id'];

    try {
        $query = "DELETE FROM tb_jogo WHERE id_jogo = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id_jogo]);

        header('Location: lista_jogo.php');
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir o jogo: " . $e->getMessage();
        exit();
    }
} else {
    echo "ID do jogo não especificado!";
    exit();
}
?>