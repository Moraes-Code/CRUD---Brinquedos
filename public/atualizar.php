<?php

include("../infra/conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM brinquedos WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$brinquedo = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $categoria = $_POST["categoria"];
    $faixa_etaria = $_POST["faixa_etaria"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    $sql = "UPDATE brinquedos 
            SET nome = ?, categoria = ?, faixa_etaria = ?, preco = ?, quantidade = ?
            WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sssdii",
        $nome,
        $categoria,
        $faixa_etaria,
        $preco,
        $quantidade,
        $id
    );

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Erro ao editar brinquedo.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Brinquedo</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <h1>Editar Brinquedo</h1>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $brinquedo["nome"]; ?>">

        <br><br>

        <label>Categoria:</label>
        <input type="text" name="categoria" value="<?php echo $brinquedo["categoria"]; ?>">

        <br><br>

        <label>Faixa etária:</label>
        <input type="text" name="faixa_etaria" value="<?php echo $brinquedo["faixa_etaria"]; ?>">

        <br><br>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" value="<?php echo $brinquedo["preco"]; ?>">

        <br><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" value="<?php echo $brinquedo["quantidade"]; ?>">

        <br><br>

        <button type="submit">Salvar alterações</button>

    </form>

    <br>

    <a href="../index.php">Voltar</a>

</body>

</html>