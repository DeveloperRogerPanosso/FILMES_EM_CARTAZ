<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>Filmes em Cartaz</title>
        <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap-reboot.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap4/css/style.css"/>
    </head>
<body>
    <article>
        <header>
            <div class="container-fluid bg-light">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand link-striped" href="index.php">
                        <img src="images/logo.png" class="img-responsive img-fluid mr-4" title="Moovies" data-toggle="tooltip" data-placement="bottom"/>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#ConteudoNavbarMenu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="ConteudoNavbarMenu">
                        <ul class="navbar-nav mr-auto mr-3">
                            <li class="nav-item border mr-3">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item border mr-3">
                                <a class="nav-link" href="cadastro_filmes.php" onclick="cadastroFilmes()">Cadastros</a>
                            </li>
                            <li class="nav-item border mr-3">
                                <a class="nav-link" href="#">Noticias</a>
                            </li>
                            <li class="nav-item border mr-3">
                                <a class="nav-link" href="#">Lançamentos</a>
                            </li>
                        </ul>
                        <form name="search" method="POST" action="#" class="form-inline">
                            <input type="search" name="search" class="form-control form-control-lg mr-1" autocomplete="off" placeholder=" Search... " id="search" title="Selecione um conteúdo referente a busca .." data-toggle="tooltip" data-placement="bottom" required/>
                            <button type="submit" class="btn btn-outline-success btn-lg">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <section class="jumbotron text-center">
                <div class="container">
                    <div class="h1 bd-lead text text-dark jumbotron-heading">Filmes em Cartaz</div>
                </div>
            </section>
            <section>
                <div class="container">
                    <form name="ordenacao" method="GET">
                        <div class="form-row justify-content-center">
                            <div class="col-sm-3 order-1">
                                <div class="form-group">
                                    <label class="text text-dark bd-lead form-label" for="Ordenar">Ordenar</label>
                                    <?php
                                        //estabelece conexão com MySQL
                                        require_once "include/connect_mysql.php";
                                            
                                        if(isset($_GET["ordenacao"]) AND !empty($_GET["ordenacao"]) AND is_string($_GET["ordenacao"])) {
                                            $ordenacao = $_GET["ordenacao"] ?? "Ordenação não selecionada !!";
                                            $query = "SELECT * FROM filmes ORDER BY {$ordenacao} ASC";
                                        }else {
                                            $ordenacao = null;
                                            $query = "SELECT * FROM filmes ORDER BY titulo ASC";
                                        }
                                    ?>
                                    <select name="ordenacao" class="form-control form-control-lg border shadow-sm" autocomplete="off" id="ordenacao" onchange="this.form.submit()">
                                        <option class="text text-dark bd-lead" value="titulo" <?php echo ($ordenacao == "titulo")?"selected=selected":"";?>>Titulo</option>
                                        <option class="text text-dark bd-lead" value="genero" <?php echo ($ordenacao == "genero")?"selected=selected":"";?>>Genero</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <?php
                            //Seleciona consulta query a classe PDO e executa através do metodo query()
                            $query = $connect->query($query);

                            if(isset($query) AND is_object($query) AND $query == TRUE) {
                                //echo "Consulta realizada com suscesso !!";
                            }else {
                                echo "Erro: " . $connect->errorInfo();
                            }

                            //testa se há dados na table de cadastro de filmes através do metodo de contagem de 
                            //linhas rowCount() da class PDO e seleciona conteudo
                            if($query->rowCount() > 0) {
                                //echo "Há dados para selecionar !!";
                                foreach ($query->fetchAll() as $value) {
                                    echo "<div class='col-sm-3 text-center'>"."<img src=".$value['image_filme']." width='300' class='img-responsive img-thumbnail img-fluid shadow'/>"."<div class='p-1'></div>"."<h4 class='text text-primary bd-lead'>".$value['titulo']."</h4>"."<div class='p-1'></div>"."<strong class='text text-success'>Genero: </strong><strong class='text text-dark bd-lead mr-4'>".$value['genero']."</strong>"."<strong class='text text-success'>Duração: </strong><strong class='text text-dark bd-lead mr-4'>".$value["duracao"]."</strong>"."<div class='p-1'></div>."."<a class='link-striped badge badge-primary' href='#' title='Histórico' data-toggle='modal' data-target='#info".$value['id']."'>Histórico</a>"."</div>";
                                    echo "<div class='modal fade' id='info".$value['id']."' role='dialog'>
                                             <div class='modal-dialog modal-lg  shadow-lg' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header bg-light'>
                                                        <h5 class='modal-title text text-dark bd-lead'>Histórico(".$value['titulo'].")</h5>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <span class='text text-dark'>".$value['historico']."</span>
                                                    </div>
                                                    <div class='modal-footer bg-light'>
                                                        <button type='button' class='btn btn-danger btn-lg' data-dismiss='modal'>Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>";
                                }
                            }else {
                                echo "<div class=alert alert-danger fade show alert-dismissible text-center' role='alert'>
                                    <span class='text text-light bd-lead text-center'>
                                        Não há Filmes em cartaz !!
                                    </span>
                                </div>";
                            }
                        ?>
                    </div>
                    <div class="p-1"></div>
                </div>
            </section>
        </main>
        <footer>
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col-sm-12 order-1 text-center">
                    <div class="p-1"></div>
                    <span class="text text-light bd-lead">www.filmesemcartaz.com.br</span>
                    <div class="p-1"></div>
                    <span class="text text-light bd-lead">Copyright 2020 - Todos os direitos reservados</span>
                    <div class="p-1"></div>
                    <span class="text text-light bd-lead">Developed By Roger Panosso</span>
                </div>
            </div>
        </div>
        </footer>
    </article>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>