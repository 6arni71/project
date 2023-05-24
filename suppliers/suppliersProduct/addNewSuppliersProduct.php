<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

if (isset($_POST['SUB'])){
    $supplierProductName = $_POST['supplierProductName'];
    $choseSupName = $_POST['choseSupName'];
    $asp = "INSERT INTO suppliers_product (supplierProductName, supplierName) VALUES
        ('$supplierProductName','$choseSupName')";

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
    <form method="post" action="">
        <div>
            <label> Назва продукту </label><br>
            <input type="text" name="supplierProductName">
        </div>
        <select name="supName">
            <option name="">chose</option>
            <?php
        $sfc = "SELECT supplierName FROM suppliers";
        $res = mysqli_query($conn, $sfc);
        if($res){
        while ($row = mysqli_fetch_assoc($res)){
        $SupName = $row['supplierName'];
        echo '
             <option value ="choseSupName">'.$SupName.'</option>
            ';}}
        ?>
        </select>
        <div><br>
            <input type="submit" name="SUB" value="Додати">
            <input type="reset" value="Очистити">
        </div>
    </form>
</div>

<?php
    if($result && $res)
        header('location:suppliersProductPage.php');
    else
        echo mysqli_error($conn);
?>

</body>