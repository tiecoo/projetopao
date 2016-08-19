<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php   
include('head.php');
include('conf/conexao.php');

echo '<br/><br/><br/><br/><br/><center>>';

$func = $_POST["asker"];
$recheio = $_POST["recheio"];

if(strtotime(date("Y-m-d H:i:s")) > strtotime(date("Y-m-d 14:30:00"))){
echo "<h2>Você não pode pedir pão depois das 14:30h!</h2>";
} else {
    $rep = mysqli_query($link, "SELECT func_id FROM dados WHERE func_id = '$func' AND DATE(DATA) = DATE(NOW())");
    if ($rep->num_rows > 0) {
        echo "<h2>Voce já pediu pão hoje, Peça amanhã novamente!</h2>";
    } else {
        if (mysqli_query($link, "INSERT INTO dados (func_id, recheio, data) VALUES ('$func', '$recheio', current_timestamp())")) {
            include('mail_confirm.php');
        }
        header('Location:index.php');
    }
}
?>
<br/><br/><br/><br/><br/><br/><center/>
<a href="index.php">Voltar</a>
<br/>
<?php include('footer.php'); ?>