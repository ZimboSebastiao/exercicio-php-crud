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




// $dados = lerFabricantes($conexao);
// var_dump($dados);


// Usada em fabricantes/inserir.php
// function inserirFabricante(PDO $conexao, string $nomeFrabicante):void{
//     // :qualquerCoisa -> Isso indica um "named parameter" (parâmetro nomeado)
//     $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

//     try {
        
//         $consulta = $conexao->prepare($sql);
        
//         // bindValue() -> permite vincular o valor existente no parâmetro nomeado (:nome) à consulta que será executada.
//         // É necessário indicar qual é o parâmetro (:nome), de onde vem o valor ($nomeFabricante) e de que tipo é (PDO::PARAM_STR)
//         $consulta->bindValue(":nome", $nomeFrabicante, PDO::PARAM_STR);
//         $consulta->execute();

//     } catch (Exception $erro) {
//         die("Erro ao inserir: ".$erro->getMessage());
//     }

// } // Fim inserirFabricante

// // Usada em fabricantes/atualizar.php
// function lerUmFabricante( PDO $conexao, int $idFabricante):array{
//     $sql = "SELECT * FROM fabricantes WHERE id = :id";

//     try {
//        $consulta = $conexao->prepare($sql);
//        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
//        $consulta->execute();
//        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

//     } catch (Exception $erro) {
//         die("Erro ao carregar: ".$erro->getMessage());
//     } 
    
//     return $resultado;

// } // Fim lerUmFabricante

// // Usada em fabricantes/atualizar.php
// function atualizarFabricante(PDO $conexao, string $nomeFabricante, int $idFabricante):void{
//     $sql = "UPDATE fabricantes SET nome = :nome  WHERE  id = :id";

//     try {
//         $consulta = $conexao->prepare($sql);
//         $consulta->bindValue(":nome", $nomeFabricante,  PDO::PARAM_STR);
//         $consulta->bindValue(":id", $idFabricante,  PDO::PARAM_INT);
//         $consulta->execute();
//     } catch (Exception $erro) {
//         die("Erro ao atualizar: ".$erro->getMessage());
//     }
    


// }//Fim atualizarFabricante

// // Usada em fabricantes/deletar.php
// function deletarFabricante( PDO $conexao, int $idFabricante):void{
//     $sql = "DELETE FROM fabricantes WHERE id = :id";

//     try {
//        $consulta = $conexao->prepare($sql);
//        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
//        $consulta->execute();

//     } catch (Exception $erro) {
//         die("Erro ao carregar: ".$erro->getMessage());
//     } 
    

// } // Fim deletarFabricante


?>