<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wholesale_warehouse_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $dft = "DELETE FROM suppliers WHERE id_supplier = $id";
    $result = mysqli_query($conn, $dft);

    if($result)
        header('location:suppliersPage.php');
    else
        echo mysqli_error($conn);
}
