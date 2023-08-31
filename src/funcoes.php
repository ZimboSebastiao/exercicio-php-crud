<?php require_once "database.php";

// LerAlunos
function lerAlunos(PDO $conexao):array{
    $sql =  "SELECT * FROM alunos ORDER BY nome";

    try {

        $consulta = $conexao->prepare($sql);
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    } catch (Exception $erro) {
        die("Erro ao carregar a lista de alunos: ".$erro->getMessage());
    }

   return $resultado;
}  // Fim 

function calcularMedia(float $n1, float $n2):float{
    $media = ($n1 + $n2) / 2;
    return $media;
}

function situacao($resultado):string{

    
    if($resultado >= 7){
        return "Aprovado";

    } elseif ($resultado >= 5 AND $resultado < 7){
        return "Recuperação";
    } else {
        return "Reprovado";
    }  
}



function inserirAluno(PDO $conexao, string $nome, float $primeira, float $segunda):void{

    $sql = "INSERT INTO alunos(nome, primeira, segunda) VALUES(:nome, :primeira, :segunda)";

    try {
        
        $consulta = $conexao->prepare($sql);
        
        
        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
        $consulta->bindValue(":primeira", $primeira, PDO::PARAM_STR);
        $consulta->bindValue(":segunda", $segunda, PDO::PARAM_STR);
        $consulta->execute();

    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro->getMessage());
    }

}


function  lerUmAluno(PDO $conexao, int $id):array{
    $sql = "SELECT * FROM alunos WHERE id = :id";

    try {
       $consulta = $conexao->prepare($sql);
       $consulta->bindValue(":id", $id, PDO::PARAM_INT);
       $consulta->execute();
       $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    } 
    
    return $resultado;

}

function atualizarAlunos(PDO $conexao, string $nome, float $primeira, float $segunda, int $id):void{
    $sql = "UPDATE alunos
            SET nome = :nome, 
            primeira = :primeira, 
            segunda = :segunda  
            WHERE  id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":nome", $nome,  PDO::PARAM_STR);
        $consulta->bindValue(":primeira", $primeira,  PDO::PARAM_STR);
        $consulta->bindValue(":segunda", $segunda,  PDO::PARAM_STR);
        $consulta->bindValue(":id", $id,  PDO::PARAM_INT);
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao atualizar: ".$erro->getMessage());
    }
    


}

// // Usada em fabricantes/deletar.php
function deletarAluno( PDO $conexao, int $id):void{
    $sql = "DELETE FROM alunos WHERE id = :id";

    try {
       $consulta = $conexao->prepare($sql);
       $consulta->bindValue(":id", $id, PDO::PARAM_INT);
       $consulta->execute();

    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
    } 
    

}


?>