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
<h1> ТАБЛИЦЯ ПОКУПЦІВ </h1>

<a href="../index.html">на головну</a><br>

<a href="addNewBuyer.php">додати нового покупця</a><br><br>

<table class="table">
    <thead>
    <tr>
        <th> Номер покупця </th>
        <th> ПІБ </th>
        <th> Адреса </th>
        <th> Поштовий індекс </th>
        <th> Телефонний номер </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sfb = "SELECT * FROM buyers";
    $result = mysqli_query($conn, $sfb);
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $id_buyer = $row['id_buyer'];
            $buyerPIB = $row['PIB'];
            $buyerAddress = $row['address'];
            $buyerPostIndex = $row['postIndex'];
            $buyerPhoneNumber = $row['phoneNumber'];
            echo '
                        <tr>
                            <td>'.$id_buyer.'</td>
                            <td>'.$buyerPIB.'</td>
                            <td>'.$buyerAddress.'</td>
                            <td>'.$buyerPostIndex.'</td>
                            <td>'.$buyerPhoneNumber.'</td>
                            <td><button><a href="editBuyer.php?editid='.$id_buyer.'">Редагувати</a></button></td>
                            <td><button><a href="deleteBuyer.php?deleteid='.$id_buyer.'">Видалити</a></button></td>
                        </tr>
                    ';
        }
    }
    ?>
    </tbody>
</table>

</body>
</html>