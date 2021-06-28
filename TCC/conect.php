<?php
    try{
        DEFINE("SERVIDOR","localhost");
        DEFINE("BANCO","tcc");
        DEFINE("USUARIO","root");
        DEFINE("SENHA","");

        $conect = new PDO("mysql:host=".SERVIDOR.";dbname=".BANCO,USUARIO,SENHA);
        $conect -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $erro){
        echo"ERROR ".$erro -> getMessage();
    }
?>