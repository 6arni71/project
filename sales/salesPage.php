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
<h1> ТАБЛИЦЯ ПРОДАНИЗ ТОВАРІВ </h1>

<a href="../index.html">на головну</a><br><br>

<table class="table">
    <thead>
    <tr>
        <th> Номер продажу </th>
        <th> Назва товару </th>
        <th> Одиниці вимірювання </th>
        <th> Ціна за од. вимірювання </th>
        <th> Кількість </th>
        <th> дата продажу </th
    </tr>
    </thead>
    <tbody>
    <?php
    $sfc = "SELECT * FROM sales";
    $result = mysqli_query($conn, $sfc);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $idSale = $row['id_sale'];
            $merchName = $row['merchName'];
            $merchUnitMeasurement = $row['unitMeasurement'];
            $merchUnitPrice = $row['unitPrice'];
            $merchQuantity = $row['merchQuantity'];
            $saleDate = $row['saleDate'];
            echo '
                        <tr>
                            <td>'.$idSale.'</td>
                            <td>'.$merchName.'</td>
                            <td>'.$merchUnitMeasurement.'</td>
                            <td>'.$merchUnitPrice.'</td>
                            <td>'.$merchQuantity.'</td>
                            <td>'.$saleDate.'</td>                    
                        </tr>
                    ';
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>