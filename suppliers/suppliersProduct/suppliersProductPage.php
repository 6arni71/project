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
<h1> ТАБЛИЦЯ ТОВАРІВ ПОСТАЧАЛЬНИКІВ </h1>

<a href="../../index.html">на головну</a><br>

<a href="../suppliersPage.php">постачальники</a><br>

<br><a href="addNewSuppliersProduct.php">додати новий продукт від постачальника</a><br><br>

<table class="table">
    <thead>
    <tr>
        <th> Номер продукту</th>
        <th> Назва </th>
        <th> Номер постачальника </th>
        <th> Назва </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sfc = "SELECT * FROM suppliers_product";
    $result = mysqli_query($conn, $sfc);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $id_supplierProduct = $row['id_supplierProduct'];
            $supplierProductName = $row['supplierProductName'];
            $id_supplier = $row['id_supplier'];
            $supplierName = $row['supplierName'];
            echo '
                        <tr>
                            <td>'.$id_supplierProduct.'</td>
                            <td>'.$supplierProductName.'</td>
                            <td>'.$id_supplier.'</td>
                            <td>'.$supplierName.'</td>
                            <td><button><a href="editSupplierProduct.php?editid='.$id_supplierProduct.'">Редагувати</a></button></td>
                            <td><button><a href="deleteSupplierProduct.php?deleteid='.$id_supplierProduct.'">Видалити</a></button></td>
                        </tr>
                    ';
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>