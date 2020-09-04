<?
include("../includes/config.php");
seguranca();
$preco=str_replace(',','.', str_replace('.','',$_POST['preco']));

####UPLOAD DE IMAGEM#####
// Pega o nome original do arquivo (sem o diretório)
$img = $_FILES['imagem']['name'];

// Pega o nome do arquivo no servidor (com o diretório)
$tmp = $_FILES['imagem']['tmp_name'];

// Variável gerada para montar o nome final do arquivo
$destino = "produtos/" . $_FILES['imagem']['name'];

// Testa se o arquivo foi enviado
if (is_uploaded_file($tmp)) {
	
	// Cria um array com os tipos de arquivo permitidos
	//	$permitidos = array("jpg", "gif", "png");
	
	//	if (array_search($extensao, $permitidos) === false) {


	// Pega os tres ultimos digitos do nome da imagem e tranforma tudo em minuculo e testa se é jpg
	if (strtolower(substr($img, -3, 3)) != "jpg") {
		print "<script language='javascript'>
					alert('A extensão inválida. Envie imagens JPG.');
					history.back();
				 </script>;";
		exit;
	}

	// Pega o tamanho real da imagem	e retorna num array()
	$tamanho = getimagesize($tmp);
	
	if ($tamanho[0] > $tamanho[1]) {
		$largura = 250;
		$altura = round(($tamanho[1] * ($largura/$tamanho[0])));
	} else {
		$altura = 188;
      $largura = round(($tamanho[0] * ($altura/$tamanho[1])));	
	}

	//print $largura . "X" . $altura; exit;

	$src_img = imagecreatefromjpeg($tmp);
	$dst_img = imagecreatetruecolor($largura, $altura);
	imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $largura, $altura, $tamanho[0], $tamanho[1]);
	imagejpeg($dst_img, "../" . $destino, 60);
}
####FIM DO UPLOAD####

$busca = mysqli_query($link, "insert into `produtos`
											(
											`tipo`,
											`modelo`,
											`fabricante`,
											`preco`,
											`descricao`,
											`img`
											)
											 values
											(
											'$_POST[tipo]',
											'$_POST[modelo]',
											'$_POST[fabricante]',
											'$preco', 
											'$_POST[descricao]',
											'$destino'
											);"
							);
							
print mysqli_error($link);

header("Location: lista.php");
?>