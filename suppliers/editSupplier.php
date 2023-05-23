<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$id = $_GET['editid'];

$sql = "SELECT * FROM suppliers WHERE id_supplier = $id";

$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$sN = $row['supplierName'];
$sA = $row['supplierAddress'];
$sPA = $row['postIndex'];
$sPN = $row['phoneNumber'];
$sIPN = $row['IPNSupplier'];

if (isset($_POST['SUB'])){
    $supplierName = $_POST['supplierName'];
    $supplierAddress = $_POST['supplierAddress'];
    $supplierPostAddress = $_POST['supplierPostAddress'];
    $supplierPhoneNumber = $_POST['supplierPhoneNumber'];
    $supplierIPN = $_POST['supplierIPN'];

    $upd = "UPDATE suppliers SET 
        supplierName = '$supplierName', 
        supplierAddress = '$supplierAddress', 
        postIndex = '$supplierPostAddress', 
        phoneNumber = '$supplierPhoneNumber', 
        IPNSupplier = '$supplierIPN'
        WHERE id_supplier = $id";

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
<h1> РЕДАГУВАТИ ПОСТАЧАЛЬНИКА</h1>

<a href="suppliersPage.php">назад</a><br><br>

<div>
    <form method="post">
        <div>
            <label> Назва постачальника</label><br>
            <input type="text" name="supplierName" value=<?php echo $sN; ?> >
        </div>
        <div>
            <br><label> Адреса постачальника </label><br>
            <input type="text" name="supplierAddress" value=<?php echo $sA; ?> >
        </div>
        <div>
            <br><label> Поштовий код постачальника </label><br>
            <input type="text" name="supplierPostAddress" value=<?php echo $sPA; ?> >
        </div>
        <div>
            <br><label> Телефонний номер постачальника </label><br>
            <input type="text" name="supplierPhoneNumber" value=<?php echo $sPN; ?> >
        </div>
        <div>
            <br><label> ІПН постачальника </label><br>
            <input type="text" name="supplierIPN" value=<?php echo $sIPN; ?> >
        </div>

        <div><br>
            <input type="submit" name="SUB" value="Оновити">
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