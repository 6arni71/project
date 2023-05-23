<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

if (isset($_POST['SUB'])){
    $idSupplier = $_POST['idSupplier'];
    $supplierName = $_POST['supplierName'];
    $supplierAddress = $_POST['supplierAddress'];
    $supplierPostAddress = $_POST['supplierPostAddress'];
    $supplierPhoneNumber = $_POST['supplierPhoneNumber'];
    $supplierIPN = $_POST['SupplierIPN'];

    $ads = "INSERT INTO suppliers VALUES 
        ('$idSupplier','$supplierName','$supplierAddress','$supplierPostAddress','$supplierPhoneNumber','$supplierIPN')";

    $result = mysqli_query($conn, $ads);
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
<h1> ДОБАВИТИ НОВОГО ПОСТАЧАЛЬНИКА </h1>

<a href="suppliersPage.php">назад</a><br><br>

<div>
    <form method="post">
        <div>
            <label> Номер постачальника </label><br>
            <input type="text" name="idSupplier">
        </div>
        <div>
            <br><label> Назва постачальника</label><br>
            <input type="text" name="supplierName">
        </div>
        <div>
            <br><label> Адреса постачальника </label><br>
            <input type="text" name="supplierAddress">
        </div>
        <div>
            <br><label> Поштовий код постачальника </label><br>
            <input type="text" name="supplierPostAddress">
        </div>
        <div>
            <br><label> Телефонний номер постачальника </label><br>
            <input type="text" name="supplierPhoneNumber">
        </div>
        <div>
            <br><label> ІПН постачальника </label><br>
            <input type="text" name="supplierIPN">
        </div>

        <div><br>
            <input type="submit" name="SUB" value="Додати">
            <input type="reset" value="Очистити">
        </div>
    </form>
</div>

<?php
if($result)
    header('location:suppliersPage.php');
else
    echo mysqli_error($conn);
?>

</body>
</html>