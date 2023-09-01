<?php require_once "src/funcoes.php";

$listaDeAlunos = lerAlunos($conexao);

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$aluno = lerUmAluno($conexao, $id);

if(isset($_POST['atualizar'])){

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $primeira = filter_input(INPUT_POST, "primeira", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $segunda = filter_input(INPUT_POST, "segunda", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);


    atualizarAlunos($conexao, $nome, $primeira, $segunda, $id);
    header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<!-- ======== CSS Bootstrap ======== -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">
</head>
<body>

<!-- <p class="logo">
    <a href="index.php">
        <img src="img/logo1.png" alt="Menu" width="130" height="32">
    </a>
</p> -->

<main>
    <!-- ======== Container - Tiago ======== -->
    <div class="container">
        <h1 class="centro">ATUALIZAR DADOS DO ALUNO</h1>

        <!-- ========  TABLE  ======== -->
        <form action="#" method="post">
            
            <p class="form-floating mb-3">
                <input class="form-control"  placeholder="name@example.com" type="text" name="nome" id="nome" value="<?=$aluno['nome']?>" required>
                <label for="nome">Nome do aluno</label>
            </p>
            
            <p class="form-floating mb-3">
                <input class="form-control"  placeholder="name@example.com" name="primeira" type="number" id="primeira" step="0.01" min="0.00" max="10.00" value="<?=$aluno['primeira']?>" required>
                <label for="primeira">Primeira nota</label>
            </p>
            
            <p class="form-floating mb-3">
                <input class="form-control"  placeholder="name@example.com" name="segunda" type="number" id="segunda" step="0.01" min="0.00" max="10.00" value="<?=$aluno['segunda']?>" required>
                <label for="segunda">Segunda nota</label>
            </p>

            <p class="form-floating mb-3">
                <input class="form-control"  placeholder="name@example.com" name="media" type="number" id="media" step="0.01" min="0.00" max="10.00" value="<?=$resultado = calcularMedia($aluno["primeira"] , $aluno["segunda"])?>" readonly disabled>
                <label for="media">Média</label>
            </p>

            <p class="form-floating mb-3">
                <?php $final = situacao($resultado); ?>
                <input class="form-control"  placeholder="name@example.com" type="text" name="situacao" id="situacao" value="<?php echo strip_tags($final);?>" readonly disabled>
                <label for="situacao">Situação</label>
            </p>

            <!-- ======== Botões ======== -->
            <div class="contai">
                <!-- ======== Atualizar ======== -->
                <button type="submit" name="atualizar" class="btn btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                    </svg>
                    Atualizar
                </button>

                <!-- ======== Voltar ======== -->
                <a href="index.php" class="btn btn-info text-decoration-none " tabindex="-1" role="button" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    Voltar
                </a>
            </div>
            
        </form>    

    </div>
</main>

<!-- ======== JS Bootstrap ======== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>