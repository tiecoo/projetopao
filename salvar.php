<?php

include('conf/conexao.php');



$nome = $_POST["name"];
$email = $_POST["email"];

if($email == '' || $nome == ''){
    echo "Um dos campos esta vazio, por favor, preencha os dois campos!<br/>";?>
<a href="index.php">Voltar</a>

<?php
}
    
  
else {
if(!mysqli_query($link, "INSERT INTO funcionarios (nome, data, email) VALUES ('$nome', current_timestamp(), '$email')"))
	die("Erro ao inserir nome, nome pode estar repetido");


else {
	echo "Opção gravada com sucesso!";
}

header('Location:index.php');
}
?>
