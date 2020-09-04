<?php
        //inicia sessão
        session_start();

        //define interface implementando procedimentos
        interface ProcedimentosCadastro {
            public function setImagem();
            public function setTitulo(string $titulo = "");
            public function setGenero(string $genero = "");
            public function setDuracao(string $duracao = "");
            public function setHistorico(string $historico = "");
            public function getImagem() : string;
            public function getTitulo() : string;
            public function getGenero() : string;
            public function getDuracao() : string;
            public function getHistorico() : string;
            public function getConnectMysqlInsertCadastro();
        }

        //define class contendo dados especificos recebendo dados da requisicão
        class RequisicaoCadastro implements ProcedimentosCadastro {
            private string $imagem = "";
            private string $titulo = "";
            private string $genero = "";
            private string $duracao = "";
            private string $historico = "";

            //define encapsulamento as propriedades de classe
            public function setImagem() {
                if(isset($_FILES["arquivo_imagem"]) AND !empty($_FILES["arquivo_imagem"])) {
                    $arquivo_imagem = $_FILES["arquivo_imagem"];
                    echo "<pre>";
                    print_r($arquivo_imagem);
                    echo "</pre>";
                }else {
                    echo "Arquivo não selecionado !!";
                }

                //testa se arquivo é existente em sua pasta de armazenamento temporaria no servidor [tmp_name]
                if(isset($_FILES["arquivo_imagem"]["tmp_name"]) AND !empty($_FILES["arquivo_imagem"]["tmp_name"])) {
                    //define vetor array contendo extenções validas para upload de imagens
                    $extensoes = array("image/jpg","image/jpeg","image/png","image/svg");
                    if(in_array($_FILES["arquivo_imagem"]["type"], $extensoes)) {
                        echo "Arquivo salvo com suscesso !!";
                        move_uploaded_file($_FILES["arquivo_imagem"]["tmp_name"], "images/".$_FILES["arquivo_imagem"]["name"]);
                        //define variavel armazenando destino do arquivo
                        $destino_arquivo = "images/" . $_FILES['arquivo_imagem']['name'];
                        $this->imagem = addslashes(htmlspecialchars(trim($destino_arquivo))) ?? null;
                        echo $destino_arquivo;
                    }else {
                        echo "<script>alert('A extenção do arquivo não é valida !!')</script>";
                        return false;
                        exit;
                    }
                }else {
                    echo "Arquivo não existente !!";
                }
            }
            public function setTitulo(string $titulo = "") {
                if(isset($titulo) AND !empty($titulo) AND is_string($titulo)) {
                    if(strlen($titulo) >= 3) {
                        echo "Titulo valido !!" . "<br>\n";
                        $this->titulo = addslashes(htmlspecialchars(trim(ucwords(filter_input(INPUT_POST, "titulo_filme", FILTER_SANITIZE_SPECIAL_CHARS))))) ?? null;
                        return true;
                    }else {
                        echo error_get_last();
                        echo "<script>
                            alert('Titulo Invalido !!')
                            window.location.href='cadastro_filmes.php'
                        </script>";
                        return false;
                        exit;
                    }
                }
            }
            public function setGenero(string $genero = "") {
                if(isset($genero) AND !empty($genero) AND is_string($genero)) {
                    echo "Genero valido !!" . "<br>\n";
                    $this->genero = addslashes(htmlspecialchars(trim(ucwords(filter_input(INPUT_POST, "genero_filme", FILTER_SANITIZE_SPECIAL_CHARS))))) ?? null;
                    return true;
                }else {
                    echo error_get_last();
                    echo "<script>
                        alert('Genero invalido !!')
                        window.location.href='cadastro_filmes.php'
                    </script>";
                    return false;
                    exit;
                }
            }
            public function setDuracao(string $duracao = "") {
                if(isset($duracao) AND !empty($duracao) AND is_string($duracao)) {
                    echo "Duração valida !!" . "<br>\n";
                    $this->duracao = addslashes(htmlspecialchars(trim(filter_input(INPUT_POST, "duracao", FILTER_SANITIZE_SPECIAL_CHARS)))) ?? null;
                    return true;
                }else {
                    echo error_get_last();
                    echo "<script>
                        alert('Duração invalida !!')
                        window.location.href='cadastro_filmes.php'
                    </script>";
                    return false;
                    exit;
                }
            }
            public function setHistorico(string $historico = "") {
                if(isset($historico) AND !empty($historico) AND is_string($historico)) {
                    if(strlen($historico) >= 8) {
                        echo "Histórico valido !!" . "<br>\n";
                        $this->historico = addslashes(htmlspecialchars(trim(ucfirst(filter_input(INPUT_POST, "historico", FILTER_SANITIZE_SPECIAL_CHARS))))) ?? null;
                        return true;
                    }else {
                        echo error_get_last();
                        echo "<script>
                            alert('Histórico invalido !!')
                            window.location.href='cadastro_filmes.php'
                        </script>";
                        return false;
                        exit;
                    }
                }
            }
            public function getImagem() : string {
                return $this->imagem ?? "Imagem não selecionada !!";
            }
            public function getTitulo() : string {
                return $this->titulo ?? "Titulo não selecionado !!";
            }
            public function getGenero() : string {
                return $this->genero ?? "Genero não selecionado !!";
            }
            public function getDuracao() : string {
                return $this->duracao ?? "Duração não selecionada !!";
            }
            public function getHistorico() : string {
                return $this->historico ?? "Histórico não selecionado !!";
            }
            public function getConnectMysqlInsertCadastro() {
                //estabelece conexão com MySQL
                require_once "include/connect_mysql.php";
                $query = "INSERT INTO filmes (image_filme,titulo,genero,duracao,historico) 
                VALUES (:image_filme, :titulo, :genero, :duracao, :historico)";
                //seleciona consulta a classe PDO passando a ser um objeto da class PDO e prepara-a para ser executada
                $query = $connect->prepare($query);
                $query->bindValue(":image_filme", $this->imagem);
                $query->bindValue(":titulo", $this->titulo);
                $query->bindValue(":genero", $this->genero);
                $query->bindValue(":duracao", $this->duracao);
                $query->bindValue(":historico", $this->historico);
                //executa consulta no servidor MySQL através do metodo PDO execute();
                $query->execute();

                if(isset($query) AND is_object($query) AND $query == TRUE) {
                    echo "Consulta realizada com suscesso !!" . "<br>\n";
                }else {
                    echo "Erro: " . $connect->errorInfo();
                    exit;
                }

                //testa se quantidade de registros na table de cadastro de filmes é maior que 0
                //e define sessão de cadastro
                if($query->rowCount() > 0) {
                    $_SESSION["cadastro"] = "
                    <div class='alert alert-success fade show alert-dismissible text-center' role='alert'>
                        <span class='text text-light bd-lead text-center'>
                            Cadastro realizado com suscesso. Id do Cadastro: {$connect->LastInsertId()}
                        </span>
                    </div>";
                    //header("Location:cadastro_filmes.php");
                    exit;
                }else {
                    echo "<span class='text text-danger text-center'>Não há dados de cadastros</span>";
                    exit;
                }
            }
        } 
?>