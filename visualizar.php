<?php require_once "src/funcoes.php";

$listaDeAlunos = lerAlunos($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

    <!-- ======== TABELA ========= -->
    <table class="table">
        <thead>
            <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Primeira Nota</th>
            <th>Segunda Nota</th>
            <th>Média</th>
            <th>Situação</th>
            <th>Operações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaDeAlunos as $aluno) { ?>
            <tr>
                <td><?=$aluno["id"]?></td>
                <td><?=$aluno["nome"]?></td>
                <td><?=$aluno["primeira"]?></td>
                <td><?=$aluno["segunda"]?></td>
                <td><?=$resultado = calcularMedia($aluno["primeira"] , $aluno["segunda"])?></td>
                <td><?=situacao($resultado)?></td>

                <td>
                    <!-- ===== Editar ====== -->
                    <a href="atualizar.php?id=<?=$aluno["id"]?>&nome=<?=$aluno["nome"]?>">
                    Editar</a>

                        
                    <!-- ===== Excluir ====== -->
                    <a class="excluir"  href="excluir.php?id=<?=$aluno["id"]?>&nome=<?=$aluno["nome"]?>">
                        Apagar</a>
                </td>
            </tr>
            <?php ;}?>
        </tbody>
    </table> <!-- FIM TABELA  -->


    <p><a href="index.php">Voltar ao início</a></p>
</div>

<script src="js/confirma-exclusao.js"></script>
</body>
</html>