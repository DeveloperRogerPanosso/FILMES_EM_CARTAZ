<?php
        //estabelece conexão com MySQL
        $dsn = "mysql:dbname=b7web_projeto_filmes_cartaz;port=3306;host=localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "b7web_projeto_filmes_cartaz";

        try {
            //realiza instancia da classe PDO criando objeto de conexão ao DB
            $connect = new PDO($dsn, $dbuser, $dbpass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(isset($connect) AND is_object($connect) AND $connect == TRUE) {
                //echo "Conexão estabelecida com suscesso !!" . "<br>\n";
                //echo "<strong>DBname: </strong>" . $dbname . "<br>\n";
            }
        } catch (PDOException $erro) {
            echo "Erro de Conexão: " . $erro->getMessage();
            exit;
        }
?>