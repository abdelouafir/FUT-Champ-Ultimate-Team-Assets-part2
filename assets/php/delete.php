<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "fut_champion";


$connexion =  mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error); //die -> stope le programe et affcher message erore
}
// $connexion -> close();
if(isset($_GET['deleted'])){
    $id = $_GET['deleted'];
    $sql="delete from statistickes where playerID = $id";
    $resumt = mysqli_query($connexion,$sql);
    if($resumt){
        header('location:http://localhost/FUT-Champ-Ultimate-Team-Assets-part2/dashbord.php');
 
    }else{
       die(mysqli_error($connexion));
    }
}
?>
