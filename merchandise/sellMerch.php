<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

if (isset($_POST['SUB'])){
    $id_merch = $_POST['id_merhc'];
    $merchName = $_POST['merchName'];
    $unitMeasurement = $_POST['unitMeasurement'];
    $unitPrice = $_POST['unitPrice'];
    $merchQuantity = $_POST['merchQuantity'];
    $merch_id_order = $_POST['id_order'];
    $merch_id_supplier = $_POST['id_supplier'];

    $anm = "INSERT INTO merchandise VALUES (
       '$id_merch',     
       '$merchName',
       '$unitMeasurement',
       '$unitPrice',
       '$merchQuantity',
       '$merch_id_order',                 
       '$merch_id_supplier')";

    $result1 = mysqli_query($conn, $anm);

    $ano = "INSERT INTO deliveries VALUES (
       '$id_merch',     
       '$merchName',
       '$unitMeasurement',
       '$unitPrice',
       '$merchQuantity')";

    $result2 = mysqli_query($conn, $ano);
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

<a href="merchandisePage.php">назад</a><br><br>

<div>
    <form method="post">
        <div>
            <label> Номер товару </label><br>
            <input type="text" name="id_merhc">
        </div>
        <div>
            <br><label> Назва товару </label><br>
            <input type="text" name="merchName">
        </div>
        <div>
            <br><label> Од. вимірювання </label><br>
            <input type="text" name="unitMeasurement">
        </div>
        <div>
            <br><label> ціна за од. вим </label><br>
            <input type="text" name="unitPrice">
        </div>
        <div>
            <br><label> кількість </label><br>
            <input type="text" name="merchQuantity">
        </div>
        <div>
            <label> номер замовлення </label><br>
            <input type="text" name="id_order">
        </div>
        <div>
            <br><label> номер постачальника </label><br>
            <input type="text" name="id_supplier">
        </div>

        <div><br>
            <input type="submit" name="SUB" value="Додати">
            <input type="reset" value="Очистити">
        </div>
    </form>
</div>

<?php
if($result1 || $result2)
    header('location:merchandisePage.php');
else
    echo mysqli_error($conn);
?>

</body>
</html>