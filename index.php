<?php

include("infra/conexao.php");

$sql = "SELECT * FROM brinquedos";
$resultado = $conexao->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Brinquedos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestão de Brinquedos</h1>

    <h2>Brinquedos Cadastrados</h2>

    <li>
        <ul>ID</ul>
        <ul>Nome</ul>
        <ul>Categorias</ul>
        <ul>Faixa etária</ul>
        <ul>Preço</ul>
        <ul>Quantidade</ul>
        <ul>Ações</ul>
    </li>

     <?php while ($brinquedo = $resultado->fetch_assoc()) { ?>

        <ul>
            <li><?php echo $brinquedo["id"]; ?></li>
            <li><?php echo $brinquedo["nome"]; ?></li>
            <li><?php echo $brinquedo["categoria"]; ?></li>
            <li><?php echo $brinquedo["faixa_etaria"]; ?></li>
            <li>R$ <?php echo $brinquedo["preco"]; ?></li>
            <li><?php echo $brinquedo["quantidade"]; ?></li>
            <li>
                <a href="public/editar.php?id=<?php echo $brinquedo["id"]; ?>">Editar</a>
                <a href="public/excluir.php?id=<?php echo $brinquedo["id"]; ?>">Excluir</a>
            </li>
        </ul>

    <?php } ?>

    <a href="public/cadastrar.php">Cadastrar brinquedo</a>

</body>
</html>