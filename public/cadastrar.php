<?php

include("../infra/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    if (
        empty($nome) ||
        empty($categoria) ||
        empty($faixa_etaria) ||
        empty($preco) ||
        empty($quantidade)
    ) {
        echo "Preencha todos os campos.";
    } else {

        $sql = "INSERT INTO brinquedos 
                (nome, categoria, faixa_etaria, preco, quantidade)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);

        $stmt->bind_param(
            "sssdi",
            $nome,
            $categoria,
            $faixa_etaria,
            $preco,
            $quantidade
        );

        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Erro ao cadastrar brinquedo.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Brinquedo</title>
</head>

<body>

    <h1>Cadastrar Brinquedo</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome">

        <br><br>

        <label>Categoria:</label>
        <input type="text" name="categoria">

        <br><br>

        <label>Faixa etária:</label>
        <input type="text" name="faixa_etaria">

        <br><br>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01">

        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade">

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="../index.php">Voltar</a>

</body>

</html>