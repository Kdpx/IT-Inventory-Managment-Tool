<?php
if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cc_inventory";

    $conn = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT * FROM inventory WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $quantity = $row["quantity"];
    $userID = $row["lmu"];
    $lmd = date("Y-m-d"); 

    $sql = "INSERT INTO activity (inv_ID, lmd,lmu,ActName,ActDescr,OldVal,NewVal)" .
            "VALUES ('$id', '$lmd', '$userID','Deleted','','$quantity', '0')";
    $result = $conn->query($sql);

    $sql = "DELETE FROM inventory WHERE id=$id";
    $conn->query($sql);


}

header("location: inventory.php");
exit;
?>