<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
</head>
<body>
<h1> ТАБЛИЦЯ ПОСТАЧАЛЬНИКІВ </h1>

<a href="../index.html">на головну</a><br><br>

<td><button><a href="orderNewMerch.php">замовити новий товар</a></button></td><br>

<table class="table">
    <thead>
    <tr>
        <th> Номер товару </th>
        <th> Назва </th>
        <th> Одиниці вимірювання </th>
        <th> Ціна за од. вимірювання </th>
        <th> Кількість </th>
        <th> Номер замовлення </th>
        <th> Номер постачальника </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sfc = "SELECT * FROM merchandise";
    $result = mysqli_query($conn, $sfc);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $id_merch = $row['id_merhc'];
            $merchName = $row['merchName'];
            $merchUnitMeasurement = $row['unitMeasurement'];
            $merchUnitPrice = $row['unitPrice'];
            $merchQuantity = $row['merchQuantity'];
            $merch_id_order = $row['id_order'];
            $merch_id_supplier = $row['id_supplier'];
            echo '
                        <tr>
                            <td>'.$id_merch.'</td>
                            <td>'.$merchName.'</td>
                            <td>'.$merchUnitMeasurement.'</td>
                            <td>'.$merchUnitPrice.'</td>
                            <td>'.$merchQuantity.'</td>
                            <td>'.$merch_id_order.'</td>
                            <td>'.$merch_id_supplier.'</td>      
                            <td><button><a href="orderMerch.php?orderid='.$id_merch.'">замовити товар</a></button></td> 
                            <td><button><a href="sellMerch.php?sellid='.$id_merch.'">продати товар</a></button></td>                                              
                        </tr>
                    ';
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>