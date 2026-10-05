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

    <ul>
        <li>ID</li>
        <li>Nome</li>
        <li>Categoria</li>
        <li>Faixa etária</li>
        <li>Preço</li>
        <li>Quantidade</li>
        <li>Ações</li>
    </ul>

    <?php while ($brinquedo = $resultado->fetch_assoc()) { ?>

        <ul>
            <li>
                <?php echo $brinquedo["id"]; ?>
            </li>

            <li>
                <?php echo $brinquedo["nome"]; ?>
            </li>

            <li>
                <?php echo $brinquedo["categoria"]; ?>
            </li>

            <li>
                <?php echo $brinquedo["faixa_etaria"]; ?>
            </li>

            <li>
                R$ <?php echo $brinquedo["preco"]; ?>
            </li>

            <li>
                <?php echo $brinquedo["quantidade"]; ?>
            </li>

            <li>
                <a href="public/atualizar.php?id=<?php echo $brinquedo["id"]; ?>">
                    Editar
                </a>

                <a href="public/excluir.php?id=<?php echo $brinquedo["id"]; ?>">
                    Excluir
                </a>
            </li>
        </ul>

    <?php } ?>

    <br>

    <a href="public/cadastrar.php">
        Cadastrar brinquedo
    </a>

</body>

</html>