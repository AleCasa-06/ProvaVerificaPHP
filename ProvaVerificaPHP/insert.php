
<html>
    <head>
        <title>Inserisci le carte</title>
    </head>
        <body>
            <form method="POST" >
                <label>Seleziona la prima carta</label><br>
                <select required name="primaCarta">
                    
                    <option value=""></option>
                    <option value="A">A</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="J">J</option>
                    <option value="Q">Q</option>
                    <option value="K">K</option>

                </select><br>

                <label>Seleziona il seme della prima carta</label><br>
                    <select required name="primoSeme">
                        <option value=""></option>
                        <option value="Q">Quadri</option>
                        <option value="C">Cuori</option>ù
                        <option value="F">Fiori</option>
                        <option value="P">Picche</option>

                        
                        
                    </select><br>

                    <label>Seleziona la seconda carta</label><br>
                <select required name="secondaCarta">
                    <option value=""></option>
                    <option value="A">A</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="J">J</option>
                    <option value="Q">Q</option>
                    <option value="K">K</option>

                </select><br>

                <label>Seleziona il seme della seconda carta</label><br>
                    <select required name="secondoSeme">
                        <option value=""></option>
                        <option value="Q">Quadri</option>
                        <option value="C">Cuori</option>ù
                        <option value="F">Fiori</option>
                        <option value="P">Picche</option>

                        
                        
                    </select><br>
                
                <label>Data della giocata</label>
                <input type="date" name="data" required><br>
                <label>Puntata</label>    
                <input type="number" min="0" max="100000" required name="puntata"><br>
                <label>Vinto</label>
                <input type="radio" value="Vinto" name="result" required><br>
                <label>Perso</label>
                <input type="radio" value="Perso" name="result" required><br>
                <input type="reset" value="PARTITA">
                <input type="submit" formaction="insert.php"  value="SALVA" name="salva">
                <input type="submit"  formaction="incassi.php"  value="FINISCI" name="finisci">
            </form>

        
      
            


            


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
        header('Location: insert.php');
    }
}
?>