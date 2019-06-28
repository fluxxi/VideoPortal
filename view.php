<?php
    //Video abspielen
    $dbh = new PDO("mysql:host=localhost;dbname=myvideoportal","root","");
    $id = isset($_GET['id'])? $_GET['id'] : "";
    $stat = $dbh->prepare("select * from mydatabase where id=?");
    $stat->bindParam(1,$id);
    $stat->execute();
    $row = $stat->fetch();
    header("Content-Type:".$row['mime']);
    echo $row['data'];
?>