<?php
   require_once("config.php");

   /*$sql = new sql();

   $usuario = $sql -> select("SELECT * FROM tb_usuarios");

   echo json_encode($usuario);*/


   /*$root =  new Usuario();
   $root->loadById(4);

   echo $root;*/

   //carregando uma lista de usuários
   /*$lista = Usuario::getList();

   echo json_encode($lista);*/

   //parou o video em 064 PDO DAO LIS 06:00 ATÉ LOGO CRISTIAN

   //carregar uma lista de usuários buscando pelo $login
   /*$search = Usuario::search("cris");
   echo json_encode($search);*/

   //carregar o usuário utlizando o login e a senha

   $usuario = new Usuario();

   $usuario->logar("user","1234");

   echo $usuario;

 ?>
