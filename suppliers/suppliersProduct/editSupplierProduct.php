<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$id = $_GET['editid'];

$sql2 = "SELECT * FROM suppliers_product WHERE id_supplierProduct = $id";

$reslt = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($reslt);
$sPN = $row['supplierProductName'];
$sIS = $row['id_supplier'];
$sN = $row['supplierName'];


if (isset($_POST['SUB'])){
    $suppProductName = $_POST['supplierProductName'];
    $suppName = $_POST['supplierName'];

    $upd = "UPDATE suppliers_product SET 
            supplierProductName = '$suppProductName', 
            supplierName = '$suppName' 
            WHERE id_supplierProduct = $id";

    $result = mysqli_query($conn, $upd);
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
<h1> РЕДАГУВАТИ ПРОДУКТ ВІД ПОСТАЧАЛЬНИКА</h1>

<a href="suppliersProductPage.php">назад</a><br><br>

<div>
    <form method="post">
        <div>
            <label> Назва продукту</label><br>
            <input type="text" name="supplierProductName" value=<?php echo $sPN; ?> >
        </div>
        <div>
            <br><label> Назва постачальника </label><br>
            <input type="text" name="supplierName" value=<?php echo $sN; ?> >
        </div>

        <div><br>
            <input type="submit" name="SUB" value="Оновити">
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
</html>