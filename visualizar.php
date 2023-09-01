<?php require_once "src/funcoes.php";

$listaDeAlunos = lerAlunos($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
    <!-- ======== CSS Bootstrap ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- ======== SideBar ======== -->
<header>
    <a class="btn " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </a>
        <img src="img/logo.png" alt="Menu" width="120" height="30"> 

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
        Painel do Admin - Master
        </div>
        <div class="dropdown mt-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            Dropdown button
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
        </div>
    </div>
    </div>
</header>



<div class="container">
    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <form class="d-flex" role="search">
        <p>

            <input class="form-control me-2  pesquisa " type="search" placeholder="Digite para pesquisar um aluno" aria-label="Search">
            <img class="lupa" src="img/lupa.png" alt="">
        </p>
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        </form>
    </div>
    </nav>
    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

    <!-- ======== TABELA ========= -->
    <table class="table table-bordered table-secondary table-striped">
        <thead class="table-dark">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Primeira Nota</th>
            <th scope="col">Segunda Nota</th>
            <th scope="col">Média</th>
            <th scope="col">Situação</th>
            <th scope="col">Operações</th>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


<script src="js/confirma-exclusao.js"></script>
</body>
</html>