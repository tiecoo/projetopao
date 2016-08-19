<?php

include('conf/conexao.php');
$dadosid = $_GET["dadosid"];

mysqli_query($link,"DELETE FROM `dados` WHERE id = $dadosid"); 

echo 'deletado com sucesso';