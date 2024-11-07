<html>
    <head>
        <title>Puntate</title>
    </head>
        <body>

        </body>
</html>


<?php 

if ($_SERVER['REQUEST_METHOD' == "POST"] && isset($_POST["salva"]) || isset( $_POST["finisci"])) {
    $c1 = $_POST["primaCarta"];
    $s1 = $_POST["primoSeme"];
    $c2 = $_POST["secondaCarta"];
    $s2 = $_POST["secondoSeme"];
    $puntata = $_POST["puntata"];
    $data = $_POST["data"];

    if($si != $s2 || $c1 != $c2){
        $Giocata = array(
            "PrimaFigura" => $c1,
            "PrimoSeme" => $s1, 
            "SecondaFigura" => $c2, 
            "SecondoSeme" => $s2, 
            "Puntata" => $puntata, 
            "Data"=> $data
        ); 

        
    }
    else{
        header('Location: index.php');
    }
    
    
}

?>