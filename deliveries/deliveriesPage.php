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
<h1> ТАБЛИЦЯ ЗАМОВЛЕНИХ ТОВАРІВ </h1>

<a href="../index.html">на головну</a><br><br>

<table class="table">
    <thead>
    <tr>
        <th> Номер товару </th>
        <th> Назва </th>
        <th> Одиниці вимірювання </th>
        <th> Ціна за од. вимірювання </th>
        <th> Кількість </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sfc = "SELECT * FROM deliveries";
    $result = mysqli_query($conn, $sfc);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $id_deliver = $row['id_deliver'];
            $merchName = $row['merchName'];
            $merchUnitMeasurement = $row['unitMeasurement'];
            $merchUnitPrice = $row['unitPrice'];
            $merchQuantity = $row['merchQuantity'];
            echo '
                        <tr>
                            <td>'.$id_deliver.'</td>
                            <td>'.$merchName.'</td>
                            <td>'.$merchUnitMeasurement.'</td>
                            <td>'.$merchUnitPrice.'</td>
                            <td>'.$merchQuantity.'</td>
                        </tr>
                    ';
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>