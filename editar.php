<?php

include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

$result = mysqli_query($conn, "SELECT * FROM cadastro WHERE id = '$id'");

while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $cliente = $row['cliente'];
    $vendedor = $row['vendedor'];
    $descricao = $row['descricao'];
    $valor = $row['valor'];
    $datas = $row['datas'];
    echo  "<form action='' method='POST'>
    <input type='hidden' name='id' value=".$id.">
    <input type='text' name='cliente' value=".$cliente.">
    <input type='text' name='vendedor'  value=".$vendedor.">
    <input type='text' name='descricao' value=".$descricao.">
     <input type='text' name='valor'  value=".$valor.">
      <input type='date' name='datas'  value=".$datas.">
      <input type='submit' name='editar'>
</form>";
}
if(isset($_POST['editar'])){
   $id  = $_POST['id'];
$cliente  = $_POST['cliente'];
$vendedor  = $_POST['vendedor'];
$descricao  = $_POST['descricao'];
$valor  = $_POST['valor'];
$datas  = $_POST['datas'];
    $result = mysqli_query($conn, "UPDATE cadastro SET cliente = '$cliente', vendedor = '$vendedor', descricao = '$descricao', valor = '$valor', datas = '$datas' where id ='$id'");
    echo $cliente.$vendedor.$descricao.$valor.$datas."Essa é a ID:".$id;
    echo " Atualizado";
}


?>