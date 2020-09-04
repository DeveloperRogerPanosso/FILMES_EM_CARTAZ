//define function de cadastro
function cadastroFilmes() {
    var info = confirm("Deseja realizar novos cadastros de Filmes ? ");

    if(info == TRUE) {
        window.location.href="cadastro_filmes.php";
        return true;
    }else {
        window.location.href="index.php";
        return false;
    }
}

//define function acionando tooltip
$(function(){
    $('[data-toggle="tooltip"]').tooltip();
});