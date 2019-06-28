    <!-- Video Upload -->

<?php

    $dbh = new PDO("mysql:host=localhost;dbname=myvideoportal","root","");
    if(isset($_POST['btn'])){
        
       
    
        $titel = $_FILES['myfile']['name'];
        $mime = $_FILES['myfile']['type'];
        $data = file_get_contents($_FILES['myfile']['tmp_name']);
     
      
        $position= strpos($titel, ".");

        $fileextension= substr($titel, $position + 1);

        $fileextension= strtolower($fileextension);
        //Überprüfung des Formats
        if (
            ($fileextension !== "ogv") and
            ($fileextension !== "ogg") and
            ($fileextension !== "mp4") and
            ($fileextension !== "avi") and
            ($fileextension !== "flv")
        )
        {   
            //Falsches Dateiformat
             echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Dieser Dateityp ist nicht erlaubt</p>";
            header("refresh:5; url=index.php");       
            
        }
        
        else {
  
        //Nach erfolgreicher Überprüfung wird das Video hochgeladen
        $stmt = $dbh->prepare("insert into mydatabase values('',?,?,?,?,?)");
        $titel= $_POST['titel'];
        $dauer = $_POST['dauer'];
        $schauspieler = $_POST['schauspieler'];
        $stmt->bindParam(1,$titel);
        $stmt->bindParam(2,$dauer);
        $stmt->bindParam(3,$schauspieler);
        $stmt->bindParam(4,$mime);
        $stmt->bindParam(5,$data, PDO::PARAM_LOB);
        $stmt->execute();
        echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Video erfolgreich hochgeladen</p>";
        header("refresh:2; url=index.php");  
        }
    }

?>



<!-- Video Change -->

<?php
     
    $dbh = new PDO("mysql:host=localhost;dbname=myvideoportal","root","");
   if(isset($_POST['change'])){
        $changeVideo = 0;
        $id2 = $_POST['id2'];
        $titel = $_POST['titel'];
        $dauer = $_POST['dauer'];
        $schauspieler = $_POST['schauspieler'];
       
 
       //Überprüfen welche Daten geändert werden sollen
       if ($titel != ''){
           $changeVideo = 1;
  
        }
        
        if ($schauspieler != ''){
            $changeVideo = 2;
             

        }
       
        if ($dauer != ''){
           $changeVideo = 3;
  
        }      
       
       
        if (($titel != '') and
        ($dauer != '')) {
           $changeVideo = 4; 
        }
       
       
        if (($titel != '') and
        ($schauspieler != '')) {
           $changeVideo = 5; 
        }
       
        if (($dauer != '') and
        ($schauspieler != '')) {
           $changeVideo = 6; 
        }
       
       
        if (($titel != '') and
        ($dauer != '') and
        ($schauspieler != '')) {
           $changeVideo = 7; 
        }
       
       
           
       //Ändern der Daten mit Switch Anweisung
       switch ($changeVideo) {
               
       case 0:  
             //Wenn kein Attribut verändert wurde  
            echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Kein Datensatz zum Ändern</p>";
            header("refresh:2; url=index.php");

            break;      
        case 1:
            //Wenn nur der Titel editiert wurde
            $statement = $dbh->prepare("UPDATE mydatabase SET titel = '$titel' WHERE id = '$id2'");
           
            if ($statement->execute()) {
                

                echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz wurde geändert</p>";
                header("refresh:2; url=index.php");
            }
               else {
                    echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz konnte nicht geändert werden werden</p>";
                    header("refresh:2; url=index.php");
        }
            break;
        case 2:
            //Wenn nur der Schauspieler editiert wurde 
            $statement = $dbh->prepare("UPDATE mydatabase SET schauspieler = '$schauspieler' WHERE id = '$id2'");
           
            if ($statement->execute()) {
                

                echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz wurde geändert</p>";
                header("refresh:2; url=index.php");
            }
               else {
                    echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz konnte nicht geändert werden werden</p>";
                    header("refresh:2; url=index.php");
        }
            break;
        case 3:
            //Wenn nur die Dauer editiert wurde
            $statement = $dbh->prepare("UPDATE mydatabase SET dauer = '$dauer' WHERE id = '$id2'");
           
            if ($statement->execute()) {
                

                echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz wurde geändert</p>";
                header("refresh:2; url=index.php");
            }
               else {
                    echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz konnte nicht geändert werden werden</p>";
                    header("refresh:2; url=index.php");
        }
            break;
               
               
        case 4:   
            //Wenn Titel und Dauer editiert wurden
               $statement = $dbh->prepare("UPDATE mydatabase SET titel = '$titel', dauer = '$dauer' WHERE id = '$id2'");

           
            if ($statement->execute()) {
                

                echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz wurde geändert</p>";
                header("refresh:2; url=index.php");
            }
               else {
                    echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz konnte nicht geändert werden werden</p>";
                    header("refresh:2; url=index.php");
        }             

            break;
               
               
        case 5:   
            //Wenn Titel und Schauspieler editiert wurden
               $statement = $dbh->prepare("UPDATE mydatabase SET titel = '$titel', schauspieler = '$schauspieler' WHERE id = '$id2'");

           
            if ($statement->execute()) {
                

                echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz wurde geändert</p>";
                header("refresh:2; url=index.php");
            }
               else {
                    echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz konnte nicht geändert werden werden</p>";
                    header("refresh:2; url=index.php");
        }             

            break;
               
               
        case 6:   
            //Wenn Dauer und Schauspieler editiert wurden
               $statement = $dbh->prepare("UPDATE mydatabase SET dauer = '$dauer', schauspieler = '$schauspieler' WHERE id = '$id2'");

           
            if ($statement->execute()) {
                

                echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz wurde geändert</p>";
                header("refresh:2; url=index.php");
            }
               else {
                    echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz konnte nicht geändert werden werden</p>";
                    header("refresh:2; url=index.php");
        }             

            break;
               
        case 7:   
            //Wenn Titel Schauspieler und Dauer editiert wurden
               $statement = $dbh->prepare("UPDATE mydatabase SET titel = '$titel', schauspieler = '$schauspieler', dauer = '$dauer' WHERE id = '$id2'");

           
            if ($statement->execute()) {
                

                echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz wurde geändert</p>";
                header("refresh:2; url=index.php");
            }
               else {
                    echo "<p style='text-align: center;'><span style='font-size: large; font-family: georgia,palatino; color: #003366;'>Datensatz konnte nicht geändert werden werden</p>";
                    header("refresh:2; url=index.php");
        }             

            break;
               

    }
       
       
       
       
}
     

?>
