<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Feira de ciências</title>
    <link rel="stylesheet" href="cadastroADM.css">
</head>

    <form method="POST" text="#fff">
    <img src="../../adml.png" alt="" class="img">
        <label for="equipe">Equipe</label>
        <div>
            <input class="name" type="text" name="nome" placeholder="Nome..." required="">
            <input class="nmr" type="text" name="chamada" placeholder="N°..." required="">
            <input class="name" type="text" name="nome2" placeholder="Nome..." required="">
            <input class="nmr" type="text" name="chamada2" placeholder="N°..." required="">
            <input class="name" type="text" name="nome3" placeholder="Nome..." required="">
            <input class="nmr" type="text" name="chamada3" placeholder="N°..." required="">
            <input class="name" type="text" name="nome4" placeholder="Nome..." > 
            <input class="nmr" type="text" name="chamada4" placeholder="N°..." >

        </div>  
        <label for="turma">Turma</label>
        <select name="turma" class="selecao">
            <option value="1°Informatica">1°Informática</option>
            <option value="1°Enfermagem">1°Enfermagem</option>
            <option value="1°adiministracao">1°Admisnitração</option>
            <option value="2°Informatica">2°Informática</option>
            <option value="2°Enfermagem">2°Enfermagem</option>
            <option value="2°adiministracao">2°Administração</option>
            <option value="3°Informatica">3°Informática</option>
            <option value="2°Enfermagem">3°Enfermagem</option>
            <option value="3°adiministracao">3°Administração</option>
        </select>
        <label for="tema">Tema</label>
        <input type="text" name="tema" placeholder="Informe o tema do projeto..." required="">

        <label for="orientador">Orientador</label>
        <select name="orientador" class="selecao"">
            <option value="Leandro">Leandro</option>
            <option value="Sanzio">Sanzio</option>
            <option value="Douglas">Douglas</option>
            <option value="Jéssica">Jéssica</option>
            <option value="D'emery">D'emery</option>
            <option value="Marcos">Marcos</option>

        </select>

        <button type="submit" name="btn">Enviar</button>
        <div style="display:flex; margin-top: 8%; justify-content: space-around;">
        <a href="projetoADM.php">Voltar para a pagina inicial</a>
        <a href="edcadastroADM.php">Ver equipes já cadastradas</a>
        </div>
    </form>
    <?php
    include("conect.php");

        if(isset($_POST["btn"])){
            $nome = $_POST["nome"];
            $chamada = $_POST["chamada"];
            $nome2 = $_POST["nome2"];
            $chamada2 = $_POST["chamada2"];
            $nome3 = $_POST["nome3"];
            $chamada3 = $_POST["chamada3"];
            $nome4 = $_POST["nome4"];
            $chamada4 = $_POST["chamada4"];
            $turma = $_POST["turma"];
            $tema = $_POST["tema"];
            $orientador = $_POST["orientador"];

            $inserir = "INSERT INTO ciencia(nome,chamada,nome2,chamada2,nome3,chamada3,nome4,chamada4,turma,tema,orientador) VALUES(:nome,:chamada,:nome2,:chamada2,:nome3,:chamada3,:nome4,:chamada4,:turma,:tema,:orientador)"; //QUERY SQL DE INSERÇÃO NO BANCO
     
            try{
                $resultado = $conect -> prepare($inserir); //prepara o envio dos dados pro banco
                $resultado -> bindParam(":nome",$nome, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada",$chamada, PDO::PARAM_STR);
                $resultado -> bindParam(":nome2",$nome2, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada2",$chamada2, PDO::PARAM_STR);
                $resultado -> bindParam(":nome3",$nome3, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada3",$chamada3, PDO::PARAM_STR);
                $resultado -> bindParam(":nome4",$nome4, PDO::PARAM_STR); 
                $resultado -> bindParam(":chamada4",$chamada4, PDO::PARAM_STR);
                $resultado -> bindParam(":turma",$turma, PDO::PARAM_STR);
                $resultado -> bindParam(":tema",$tema, PDO::PARAM_STR);
                $resultado -> bindParam(":orientador",$orientador, PDO::PARAM_STR);
                $resultado -> execute();

                $contar = $resultado -> rowCount();
                if($contar > 0){
                   header("Location:edcadastroADM.php");
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