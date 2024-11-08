<html>
    <head>
        <title>Login</title>
    </head>
        <body>
            <form action="index.php" method="POST">
                <label>Username</label><br>
                <input type="text" name="user" required><br>
                <label>Password</label><br>
                <input type="password" name="pass" required><br>
                <input type="submit" name="sub" value="Login"><br>


            </form>
        </body>


</html>

<?php 

$servername = "localhost";
$usernameDB = "root";
$passwordDB = "";
$dbname = "simulazione_verifica";


$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname); 

if($conn->connect_error){
    die("connessione fallita: " . $conn->connect_error); 
}


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["sub"])){
    $user = $_POST["user"]; 
    $pass = $_POST["pass"]; 


    
    $stmt = $conn->query("SELECT * FROM user"); 
    $result = $stmt->fetch_all(MYSQLI_ASSOC); 

    

    if($result){
        $controllo = $conn->query("SELECT * FROM user WHERE nome = '$user'");
        $controlResult = $controllo->fetch_all(MYSQLI_ASSOC); 
        for($i = 0; $i < count($controlResult); $i++){
            if( $nome = $controlResult[$i]["nome"] && $pass = $controlResult[$i]["pass"]); 
            header("Location: insert.php"); 
           
            
        } 
    }
    else{
        $conn->query("INSERT INTO user(nome, pass) VALUES ('$user', '$pass')"); 
        header('Location: index.php'); 
    }
}

?>