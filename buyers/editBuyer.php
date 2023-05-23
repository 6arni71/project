<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$id = $_GET['editid'];

$sql = "SELECT * FROM buyers WHERE id_buyer = $id";

$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$PIB = $row['PIB'];
$bA = $row['address'];
$bPA = $row['postIndex'];
$bPN = $row['phoneNumber'];

if (isset($_POST['SUB'])){
    $buyerName = $_POST['PIB'];
    $buyerAddress = $_POST['address'];
    $buyerPostAddress = $_POST['postAddress'];
    $buyerPhoneNumber = $_POST['phoneNumber'];


    $upd = "UPDATE buyers SET 
        PIB = '$buyerName', 
        address = '$buyerAddress', 
        postIndex = '$buyerPostAddress', 
        phoneNumber = '$buyerPhoneNumber'
        WHERE id_buyer = $id";

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

<a href="buyersPage.php">назад</a><br><br>

<div>
    <form method="post">
        <div>
            <label> ПІБ</label><br>
            <input type="text" name="PIB" value=<?php echo $PIB; ?> >
        </div>
        <div>
            <br><label> Адреса </label><br>
            <input type="text" name="address" value=<?php echo $bA; ?> >
        </div>
        <div>
            <br><label> Поштовий код </label><br>
            <input type="text" name="postAddress" value=<?php echo $bPA; ?> >
        </div>
        <div>
            <br><label> Телефонний номер </label><br>
            <input type="text" name="phoneNumber" value=<?php echo $bPN; ?> >
        </div>

        <div><br>
            <input type="submit" name="SUB" value="Оновити">
            <input type="reset" value="Очистити">
        </div>
    </form>
</div>

<?php
if($result)
    header('location:buyersPage.php');
else
    echo mysqli_error($conn);
?>

</body>
</html>