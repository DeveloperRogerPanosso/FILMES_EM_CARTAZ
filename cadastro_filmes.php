<?php
        //define sessão
        session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>Cadastrar Filmes</title>
        <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap-reboot.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap4/css/style.css"/>
    </head>
<body class="bg-dark">
    <article>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 order-1 text-center">
                        <div class="p-4"></div>
                        <div class="h1 bd-lead text text-info">Cadastrar Filmes</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 order-1">
                        <a class="nav-link link-striped badge badge-primary p-2" title="Página Inicial" href="index.php" data-toggle="tooltip" data-placement="bottom">Inicio</a>
                        <div class="p-1"></div>
                        <?php
                            //define sessão de cadastro de filmes
                            if(isset($_SESSION["cadastro"]) AND !empty($_SESSION["cadastro"])) {
                                echo $_SESSION["cadastro"];
                                unset($_SESSION["cadastro"]);
                            }
                        ?>
                        <hr class="bg-light">
                    </div>
                </div>
            </div>
        </header>
        <section>
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12 order-1 text-center">
                    <div class="alert alert-warning alert-dismissible text-center" role="alert">
                        <span class="text text-dark bd-lead text-center">Preencha os seguintes campos abaixo para realizar o cadastro</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <form name="cadastro" method="POST" action="insert_dados_cadastro.php" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-sm-6 order-1">
                        <div class="form-group">
                            <label class="text text-light lead form-label" for="imagem">Imagem</label>
                            <input type="file" name="arquivo_imagem" class="form-control form-control-lg border border-info" autocomplete="off" placeholder=" Imagem.. " id="imagem" required/>
                            <small class="form-text text-muted">Selecione a URL da imagem referente.</small>
                        </div>
                    </div>
                    <div class="col-sm-6 order-2">
                        <div class="form-group">
                            <label class="text text-light lead form-label" for="titulo">Titulo</label>
                            <input type="text" name="titulo_filme" class="form-control form-control-lg border border-info" autocomplete="off" placeholder=" Titulo.. " id="titulo" required/>
                            <small class="form-text text-muted">Selecione o Titulo referente.</small>
                        </div>
                    </div>
                    <div class="col-sm-6 order-3">
                        <div class="form-group">
                            <label class="text text-light lead form-label" for="genero">Genero</label>
                            <select name="genero_filme" class="form-control form-control-lg border border-info" autocomplete="off" id="genero" required>
                                <option class="text text-dark bd-lead" value="ação">Ação</option>
                                <option class="text text-dark bd-lead" value="suspense">Suspense</option>
                                <option class="text text-dark bd-lead" value="ficcao_cientifica">Ficção Cientifica</option>
                                <option class="text text-dark bd-lead" value="comedia">Comédia</option>
                                <option class="text text-dark bd-lead" value="Terror">Terror</option>
                                <option class="text text-dark bd-lead" value="drama">Drama</option>
                                <option class="text text-dark bd-lead" value="romance">Romance</option>
                                <option class="text text-dark bd-lead" value="infantil">Infaltil</option>
                                <option class="text text-dark bd-lead" value="pornografia">Pornografia</option>
                            </select>
                            <small class="form-text text-muted">Selecione o Genero referente.</small>
                        </div>
                    </div>
                    <div class="col-sm-6 order-4">
                        <div class="form-group">
                            <label class="text text-light lead form-label" for="Duração">Duração</label>
                            <input type="text" name="duracao" class="form-control form-control-lg border border-info" autocomplete="off" placeholder=" Duração.. " id="duracao" required/>
                            <small class="form-text text-muted">Selecione o tempo de duração.</small>
                        </div>
                    </div>
                    <div class="col-sm-12 order-5">
                        <div class="form-group">
                            <label class="text text-light lead form-label" for="Historico">Histórico</label>
                            <textarea name="historico" rows="5" class="form-control form-control-lg border border-info" autocomplete="off" placeholder=" Histórico.. " id="historico" required></textarea>
                            <small class="form-text text-muted">Selecione o Historico do filme.</small>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 order-1 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block" title="Cadastrar Filme" data-toggle="tooltip" data-placement="bottom">Cadastrar</button>
                            <button type="reset" class="btn btn-danger btn-lg btn-block"  title="Resetar dados" data-toggle="tooltip" data-placement="bottom">Resetar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </section>
        <footer>
        </footer>
    </article>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>