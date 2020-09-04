<?php
        //define autoload para registrar instancia da classe e realizar verificações
        spl_autoload_register(function($classe) {
            if(file_exists("class/".$classe.".php")) {
                require_once "class/".$classe.".php";
                echo "Classe existente e instanciada !!" . "<br>\n";
                echo "Classe utilizada: " . $classe . "<br>\n";
            }else {
                echo "Classe Inexistente no diretorio !!";
                exit;
            }
        });
?>