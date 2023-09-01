<?php require_once "src/funcoes.php";

$listaDeAlunos = lerAlunos($conexao);
$quantidade = count($listaDeAlunos);

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
        <img src="img/logo1.png" alt="Menu" width="128" height="29"> 

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <br>
        <p>Painel Admin - Master</p>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr>
    <div class="offcanvas-body">
        <div>
            <a class="btn btn-primary" role="button" aria-disabled="true">Primary link</a>

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
</header> <!-- FIM SideBar  -->


<!-- ======== Container - Tiago ======== -->
<div class="container">

    <!-- ======== Search && LUPA ========= -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <form class="d-flex" role="search">
            <p>

                <input class="form-control me-2  pesquisa " type="search" placeholder="Digite para pesquisar um aluno" aria-label="Search">
                <img class="lupa" src="img/lupa.png" alt="">
            </p>           
            </form>
        </div>
    </nav> <!-- FIM Search && LUPA  -->

    <p><a href="index.php">Voltar ao início</a></p>
    

    <!-- ======== TABELA ========= -->
    <table class="table table-hover table-secondary table-striped">
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
                    <a class="text-decoration-none" href="atualizar.php?id=<?=$aluno["id"]?>&nome=<?=$aluno["nome"]?>">
                    Editar</a>

                        
                    <!-- ===== Excluir ====== -->
                    <a class="excluir text-decoration-none"  href="excluir.php?id=<?=$aluno["id"]?>&nome=<?=$aluno["nome"]?>">
                        Apagar</a>
                </td>
            </tr>
            <?php ;}?>
        </tbody>
    </table> <!-- FIM TABELA  -->

    <!-- ======== ADD && Paginação ========= -->
    <div class="contai">
        <a href="inserir.php" class="btn btn-primary text-decoration-none botao" tabindex="-1" role="button" aria-disabled="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
            </svg>
            Adicionar novo aluno</a>
    
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    
                    <p class="legend">Página 1 de 18 (<?=$quantidade?> registros no total) </p>

                    <li class="page-item active" aria-current="page">
                    <span class="page-link">1</span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                </ul>
            </nav>


    </div> <!-- ADD && Paginação  -->
          
    

</div> <!-- FIM Container - Tiago  -->


<!-- ======== JS Bootstrap ======== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<script src="js/confirma-exclusao.js"></script>
</body>
</html>