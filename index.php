<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Videoportal</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body>
    
    <h1>Videoportal B-MMI02</h1>
    <h2>von Sven Wilhelm</h2>


    <!-- Formular / Eingabe Attribute / Ändern der Videos / Upload der Videos -->
    
    <form action= "change.php" method="post" enctype="multipart/form-data">
         <label>Titel: <br> 
        <input type="text" name="titel" value=""><br>
             
        Spieldauer(Std:Min:Sek): <br> 
        <input type="text" name="dauer" value=""><br>
             
        Schauspieler: <br> 
        <input type="text" name="schauspieler" value=""><br>
        
         ID: <br> 
        <small> (Bitte zum Ändern eines Datensatzes die dazugehörige ID angeben)</small> <br>
        <input type="text" name="id2" value="">
        <button class="btn" name="change">Ändern</button><br><br> 
             
        Zum Uploaden eines Videos: <br> 
        <small> (Bitte vor dem Upload die Attribute Titel, Spieldauer und Schauspieler angeben)</small> <br>
        <input type="file" name="myfile"/>
        <button class="btn" name="btn">Upload</button><br><br></label>

        
            
    </form>
    
    
    <!-- Ausgabe der Videos auf der Startseite -->
    

    <ol>
    <?php
    $dbh = new PDO("mysql:host=localhost;dbname=myvideoportal","root","");
    $stat = $dbh->prepare("select * from mydatabase");
    $stat->execute();
    while($row = $stat->fetch()){
        
        $time = date("H", strtotime($row['dauer']));
        $time2 = date("i", strtotime($row['dauer']));
        $time3 = date("s", strtotime($row['dauer']));
      
        echo "<hr>" ;
        echo "<li><a href='view.php?id=".$row['id']."' class=videolink target='_blank'>Titel: ".$row['titel']."</a></li>";
        echo "Videolänge: <strong>$time</strong> Stunden <strong> $time2</strong> Minuten<strong> $time3</strong> Sekunden<br>";
        echo "Hauptdarsteller: <strong>".$row['schauspieler']." </strong><br>" ;
        echo "Die ID des Videos: <strong>".$row['id']." </strong><br>" ;
        echo "Format: <strong>".$row['mime']." </strong><br>" ;
        echo "<a href='delete.php?id=".$row['id']."' class=delete >Video löschen</a><br>";
        echo "<a href='xml.php?id=".$row['id']."&dauer=".$row['dauer']."&schauspieler=".$row['schauspieler']."&titel=".$row['titel']."&mime=".$row['mime']."' class=xml >XML-Ansicht</a><br>";

        }
    ?>
    </ol>
    
    
    </body>   
</html>