<?php

include_once("conexao.php");

$result = mysqli_query($conn, "SELECT * FROM cadastro");

while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $cliente = $row['cliente'];
    $vendedor = $row['vendedor'];
    $descricao = $row['descricao'];
    $valor = $row['valor'];
    $data = $row['datas'];
    //echo "Cliente: ".$cliente." Vendedor: ".$vendedor." Descrição: ".$descricao." Valor: ".$valor." Data: ".$data."<br>";
}
$busca = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
$busca2 = filter_input(INPUT_POST, 'vendedor', FILTER_SANITIZE_STRING);
$busca3 = filter_input(INPUT_POST, 'datas', FILTER_SANITIZE_STRING);


$result = mysqli_query($conn, "SELECT * FROM cadastro WHERE cliente = '$busca' OR vendedor = '$busca2' OR datas = '$busca3'");

while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $cliente = $row['cliente'];
    $vendedor = $row['vendedor'];
    $descricao = $row['descricao'];
    $valor = $row['valor'];
    $data = $row['datas'];
    echo "Cliente encontrado: ID: ".$id." Nome: ".$cliente." Vendedor: ".$vendedor." Descrição: ".$descricao." Valor: ".$valor." Data: ".$data."<br><form action='editar.php' method='POST'><input name='id' type='hidden' value=".$row['id']."><input type='submit'/></form>";
}
 
?>

<html>

<head>


</head>
<body>
<form action="" method="POST">
<label>Cliente</label>
<input type="text" name="cliente"/><br><br>
<label>Vendedor</label>
<input type="text" name="vendedor"/><br><br>
<label>Data</label>
<input type="date" name="datas"/><br><br>
<input type="submit" name="procurar"/>
</form>

</body>




</html>



