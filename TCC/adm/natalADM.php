<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrecadação de Alimentos</title>
    <link rel="stylesheet" href="../natal.css">
</head>

<body text="#fff">
    
    <section>

    </section>
    <form method="POST" text="">
        
    <label for="turma">Turma</label>
        <select name="turma" class="selecao">
            <option value="1 Informatica">1°Informática</option>
            <option value="1 Enfermagem">1°Enfermagem</option>
            <option value="1 Administracao">1°Admisnitração</option>
            <option value="2 Informatica">2°Informática</option>
            <option value="2 Enfermagem">2°Enfermagem</option>
            <option value="2 Administracao">2°Administração</option>
            <option value="3 Informatica">3°Informática</option>
            <option value="3 Enfermagem">3°Enfermagem</option>
            <option value="3 Administracao">3°Administração</option>
        </select>

        <label for="equipe">Equipe</label>
        <div>
        <nav class="nav">
            <h3>Feijão</h3>
            <input class="nmr" type="text" name="feijao" placeholder="Kg..." value="0">
            </nav><nav class="nav">
            <h3>Arroz</h3>
            <input class="nmr" type="text" name="arroz" placeholder="Kg..." value="0">
            </nav><nav class="nav">
            <h3>Macarrão</h3>
            <input class="nmr" type="text" name="macarrao" placeholder="Kg..." value="0">
            </nav><nav class="nav">
            <h3>Óleo</h3> 
            <input class="nmr" type="text" name="oleo" placeholder="Latas..." value="0">
            </nav>
        </div>  

        <button type="submit" name="btn">Enviar</button>
        <div style="display:flex; margin-top: 8%; justify-content: space-around;">
        <a href="projetoADM.php">Voltar para a pagina inicial</a>
        <a href="teste3ADM.php">ver dados</a>
        </div>
    </form>

<?php
        include("conect.php");

        if(isset($_POST["btn"])){

            $feijao = $_POST["feijao"];
            $arroz = $_POST["arroz"];
            $macarrao = $_POST["macarrao"];
            $oleo = $_POST["oleo"];
            $turma = $_POST["turma"];

            $inserir = "UPDATE natal SET feijao=:feijao,arroz=:arroz,macarrao=:macarrao,oleo=:oleo WHERE turma=:turma"; //QUERY SQL DE INSERÇÃO NO BANCO
     
            try{
                $resultado = $conect -> prepare($inserir);
                $resultado -> bindParam(":feijao",$feijao, PDO::PARAM_STR); 
                $resultado -> bindParam(":arroz",$arroz, PDO::PARAM_STR);
                $resultado -> bindParam(":macarrao",$macarrao, PDO::PARAM_STR);
                $resultado -> bindParam(":oleo",$oleo, PDO::PARAM_STR); 
                $resultado -> bindParam(":turma",$turma, PDO::PARAM_STR);
                $resultado -> execute();    

                $contar = $resultado -> rowCount();
                if($contar > 0){
                    echo "dados enviados com sucesso";
                    header("refresh: 0.5, teste3ADM.php");
                }else{
                    echo "falha no envio dos dados";
                }
    
            }catch(PDOException $erro){
                echo "houve um erro no código: " . $erro -> getMessage();
            }
        }

?>
</body>
</html>