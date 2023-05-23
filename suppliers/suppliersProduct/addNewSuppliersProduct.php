<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

if (isset($_POST['SUB'])){
    $id_supplierProduct = $_POST['id_supplierProduct'];
    $supplierProductName = $_POST['supplierProductName'];
    $id_supplier = $_POST['id_supplier'];
    $supplierName = $_POST['supplierName'];

    $asp = "INSERT INTO suppliers_product VALUES
        ('$id_supplierProduct','$supplierProductName','$id_supplier','$supplierName')";

    $result = mysqli_query($conn, $asp);
}

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
<h1> ДОБАВИТИ НОВИЙ ТОВАР ВІД ПОСТАЧАЛЬНИКА </h1>

<a href="suppliersProductPage.php">назад</a><br><br>

<div>
    <form method="post">
        <div>
            <label> Номер продукту </label><br>
            <input type="text" name="idProduct">
        </div>
        <div>
            <br><label> Назва продукту </label><br>
            <input type="text" name="nameProduct">
        </div>
        <div>
            <br><label> Номер постачальника </label><br>
            <input type="text" name="idSupplier">
        </div>
        <div>
            <br><label> Назва постачальника </label><br>
            <input type="text" name="supplierName">
        </div>

        <div><br>
            <input type="submit" name="SUB" value="Додати">
            <input type="reset" value="Очистити">
        </div>
    </form>
</div>

<?php
    if($result)
        header('location:suppliersProductPage.php');
    else
        echo mysqli_error($conn);
?>

</body>