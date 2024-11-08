<html>
    <head>
        <title>Puntate</title>
    </head>
        <body>

        </body>
</html>


<?php 

$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbname = "simulazione_verifica";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}




if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["salva"]) || isset( $_POST["finisci"])) {
    $c1 = $_POST["primaCarta"];
    $s1 = $_POST["primoSeme"];
    $c2 = $_POST["secondaCarta"];
    $s2 = $_POST["secondoSeme"];
    $puntata = $_POST["puntata"]; 
    $puntate_tot = 0; 
    $puntate_tot += $_POST["puntata"];

    $data = $_POST["data"];

    if($s1 != $s2 || $c1 != $c2){
        

        $sql = "INSERT INTO info(puntata) VALUES (?)"; 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $puntata); 
        $stmt->execute();

      

        
    }
    else{
        header('Location: index.php');
    }
    
    
}

?>