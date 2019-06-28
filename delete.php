<!-- Video löschen -->

<?php
            
    $con =mysqli_connect('localhost','root');
    mysqli_select_db($con,'myvideoportal');
      
    $sql = "DELETE FROM mydatabase WHERE ID='$_GET[id]'";  
           
            
    if(mysqli_query($con,$sql)) {
            echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz wurde gelöscht</p>";
            header("refresh:2; url=index.php");
        }
        else {
            echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz konnte nicht gelöscht werden</p>";
        }
   
?>