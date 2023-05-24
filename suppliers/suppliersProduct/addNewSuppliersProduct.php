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
    $choseSupProd = $_POST['selectSuppliers'];
    $asp = "INSERT INTO suppliers_product (supplierProductName, supplierName) VALUES
        ('$supplierProductName','$choseSupProd')";

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
    <form action="" method="post">
        <label>назва </label>
        <input type="text" name="supplierProductName" value="">
        <select name="selectSuppliers">
            <option value="">Select </option>
            <?php
            $query ="SELECT supplierName FROM suppliers";
            $res = $conn->query($query);
            if($res->num_rows> 0){
                while($optionData=$res->fetch_assoc()){
                    $option =$optionData['supplierName'];
                    ?>
                        <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                        <?php
                    }}?>
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