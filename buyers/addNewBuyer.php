<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

if (isset($_POST['SUB'])){
    $PIB = $_POST['PIB'];
    $buyerAddress = $_POST['address'];
    $buyerPostIndex = $_POST['postIndex'];
    $buyerPhoneNumber = $_POST['phoneNumber'];

    $ads = "INSERT INTO buyers (PIB, address, postIndex, phoneNumber) VALUES (    
       '$PIB',
       '$buyerAddress',
       '$buyerPostIndex',
       '$buyerPhoneNumber')";

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

<a href="buyersPage.php">назад</a><br><br>

<div>
    <form method="post">
        <div>
            <br><label> ПІБ</label><br>
            <input type="text" name="PIB">
        </div>
        <div>
            <br><label> Адреса  </label><br>
            <input type="text" name="address">
        </div>
        <div>
            <br><label> Поштовий код </label><br>
            <input type="text" name="postIndex">
        </div>
        <div>
            <br><label> Телефонний номер </label><br>
            <input type="text" name="phoneNumber">
        </div>

        <div><br>
            <input type="submit" name="SUB" value="Додати">
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