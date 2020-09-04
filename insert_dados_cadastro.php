<?php
       //define arquivo php responsavel por registro de autoload e realizar
       //verificação de existencia de arquivo apartir da instancia
       require_once "autoload.php"; 

       //realiza isntancia da classe
       $cadastro_filme = new RequisicaoCadastro();
       $cadastro_filme->setImagem(filter_input(INPUT_POST, "imagem_filme", FILTER_SANITIZE_SPECIAL_CHARS)) ?? null;
       $cadastro_filme->setTitulo(filter_input(INPUT_POST, "titulo_filme", FILTER_SANITIZE_SPECIAL_CHARS)) ?? null;
       $cadastro_filme->setGenero(filter_input(INPUT_POST, "genero_filme", FILTER_SANITIZE_SPECIAL_CHARS)) ?? null;
       $cadastro_filme->setDuracao(filter_input(INPUT_POST, "duracao", FILTER_SANITIZE_SPECIAL_CHARS)) ?? null;
       $cadastro_filme->setHistorico(filter_input(INPUT_POST, "historico", FILTER_SANITIZE_SPECIAL_CHARS)) ?? null;
       echo "<pre>";
       print_r($cadastro_filme);
       echo "</pre>";
       //executa metodo de conexão ao DB e realiza inserção de cadastro
       $cadastro_filme->getConnectMysqlInsertCadastro();
?>