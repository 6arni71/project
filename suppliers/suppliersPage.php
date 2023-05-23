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

<a href="../index.html">на головну</a><br>

<a href="suppliersProduct/suppliersProductPage.php">товари постачальників</a><br>

<br><a href="addNewSupplier.php">додати постачальника</a><br><br>

<table class="table">
    <thead>
        <tr>
            <th> Номер постачальника </th>
            <th> Назва </th>
            <th> Адреса </th>
            <th> Поштовий індекс </th>
            <th> Телефонний номер </th>
            <th> ІПН </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sfc = "SELECT * FROM suppliers";
            $result = mysqli_query($conn, $sfc);
            if($result){
                while ($row = mysqli_fetch_assoc($result)){
                    $id_supplier = $row['id_supplier'];
                    $supplierName = $row['supplierName'];
                    $supplierAddress = $row['supplierAddress'];
                    $postIndex = $row['postIndex'];
                    $phoneNumber = $row['phoneNumber'];
                    $IPNSupplier = $row['IPNSupplier'];
                    echo '
                        <tr>
                            <td>'.$id_supplier.'</td>
                            <td>'.$supplierName.'</td>
                            <td>'.$supplierAddress.'</td>
                            <td>'.$postIndex.'</td>
                            <td>'.$phoneNumber.'</td>
                            <td>'.$IPNSupplier.'</td>
                            <td><button><a href="editSupplier.php?editid='.$id_supplier.'">Редагувати</a></button></td>
                            <td><button><a href="deleteSupplier.php?deleteid='.$id_supplier.'">Видалити</a></button></td>
                        </tr>
                    ';
                }
            }
        ?>
    </tbody>
</table>

</body>
</html>