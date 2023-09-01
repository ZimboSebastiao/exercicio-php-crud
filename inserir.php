<?php require_once "src/funcoes.php";

$listaDeAlunos = lerAlunos($conexao);

if(isset($_POST['inserir'])){

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $primeira = filter_input(INPUT_POST, "primeira", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $segunda = filter_input(INPUT_POST, "segunda", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    inserirAluno($conexao, $nome, $primeira, $segunda);

    header("location:visualizar.php");

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar um novo aluno - Exercício CRUD com PHP e MySQL</title>
    <!-- ======== CSS Bootstrap ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <p class="logo">
        <a href="visualizar.php">
            <img src="img/logo1.png" alt="Menu" width="130" height="32">
        </a>
    </p>
     
<div class="container">
	<h1 class="h1">CRIANDO CADASTRO...</h1>

    		

	<form action="#" method="post">
	    <p class="form-floating mb-3">
            <input class="form-control"  placeholder="name@example.com" type="text" id="nome" name="nome" required>
            <label for="nome">Nome do aluno</label>
        </p>
        
        <p class="form-floating mb-3">
            <input class="form-control"  placeholder="name@example.com" type="number" id="primeira" name="primeira" step="0.01" min="0.00" max="10.00" required>
            <label for="primeira">Primeira nota</label>
        </p>
	    
	    <p class="form-floating mb-3">
            <input class="form-control"  placeholder="name@example.com" type="number" id="segunda" name="segunda" step="0.01" min="0.00" max="10.00" required>
            <label for="segunda">Segunda nota</label>
        </p>

        <div class="contai">
            <!-- ======== Salvar ======== -->
            <button type="submit" name="inserir" class="btn btn-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
                Salvar
            </button>

            <!-- ======== Cancelar ======== -->
            <a href="visualizar.php" class="btn btn-danger text-decoration-none " tabindex="-1" role="button" aria-disabled="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                Cancelar
            </a>
        </div>
	    
	</form>

    
</div>

<!-- ======== JS Bootstrap ======== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>