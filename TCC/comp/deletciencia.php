<?php
include("../conect.php");
    if(isset($_GET["id"])){ //se existe esse parametro na url
        $id = $_GET["id"]; //pega o id da url

        $deletar = "DELETE FROM ciencia WHERE id=:id"; // query sql deletar id especifico
        try{
            $resultadoDelete = $conect -> prepare($deletar);
            $resultadoDelete -> BindValue(":id",$id,PDO::PARAM_INT);
            $resultadoDelete -> execute();

            $contarDelete = $resultadoDelete -> rowCount();
            if($contarDelete > 0){
                header("Location: ../adm/edcadastroADM.php"); //comando de redirecionamento de pagina
            }else{
                header("Location: ../adm/edcadastroADM.php");
            }
        }catch(PDOException $erro){
            echo "HOUVE UM ERRO" .$erro -> getMessage();
        }
    }else{
        header("Location: ../home.php");
    }
?>