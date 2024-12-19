<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "fut_champion";

$connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

// Vérification de la connexion
if (!$connexion) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $position = mysqli_real_escape_string($connexion, $_POST["position"]);
    $name = mysqli_real_escape_string($connexion, $_POST["name"]);
    $club = mysqli_real_escape_string($connexion, $_POST["club"]);
    $riting = mysqli_real_escape_string($connexion, $_POST["reting"]);
    $pace = isset($_POST["pacing"]) ? mysqli_real_escape_string($connexion, $_POST["pacing"]) : '';
    $shotion = mysqli_real_escape_string($connexion, $_POST["shooting"]);
    $passing = mysqli_real_escape_string($connexion, $_POST["passing"]);
    $dribling = mysqli_real_escape_string($connexion, $_POST["dribbling"]);
    $physical = mysqli_real_escape_string($connexion, $_POST["physical"]);
    $defending = mysqli_real_escape_string($connexion, $_POST["defending"]);


    $sql = "INSERT INTO players(position, NameCOM, rating) 
            VALUES ('$position', '$name', '$riting')";

    if (mysqli_query($connexion, $sql)) {
        echo "Le joueur a été ajouté avec succès<br>";
    } else {
        echo "Erreur lors de l'ajout du joueur : " . mysqli_error($connexion) . "<br>";
    }

    $sql1 = "INSERT INTO statistickes(pace, shooting, passing, dribbling, physical) 
            VALUES ('$pace', '$shotion', '$passing', '$dribling', '$physical')";

    if (mysqli_query($connexion, $sql1)) {
        echo "Les statistiques ont été ajoutées avec succès<br>";
    } else {
        echo "Erreur lors de l'ajout des statistiques : " . mysqli_error($connexion) . "<br>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/FUT-Champ-Ultimate-Team-Assets-part2/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="h-full">
       <form method="post" class="bg-cyan-300 h-full w-">
            <div id="formContenerJoueur" class="formContener w-5/12 m-auto ">
                        <div>
                            <label for="position">position</label>
                            <select name="position" id="position" value="<?php echo $position?>">
                                <option value="ST">ST</option>
                                <option value="CB">CB</option>
                                <option value="LB">LB</option>
                                <option value="CM">CM</option>
                                <option value="CAM">CAM</option>
                                <option value="RW">RW</option>
                                <option value="LW">LW</option>
                                <option value="RB">RB</option>
                            </select>
                        </div>
                        <div>
                            <input type="hidden" class='playerId' id="playerId" name="id_heddin">
                            <label for="NAme">entrez name de jeur</label>
                            <input id="NAme" type="text" placeholder="vini jr" name="name" value="<?php echo $name?>">
                        </div>
                        <div>
                            <label for="photo">photo</label>
                            <div class="inputPhoto">
                                <input id="photo" type="url" placeholder="https://..." name="photo" value="<?php echo $name?>">
                            </div>
                        
                        </div>
                    
                        <div>
                            <label for="flag">flag</label>
                            <div class="flagInput">
                                <input id="flag" type="url" placeholder="https://..." name="falag" value="<?php echo $name?>">
                            </div>
                        </div>
                        <div>
                            <label for="club">club</label>
                            <input id="club" type="text" placeholder="rial madrid" name="club" value="<?php echo $name?>">
                        </div>
                        <div >
                            <label for="logo">logo</label>
                            <div class="logoinput">
                                <input id="logo" type="url" placeholder="https://..." name="logo" value="<?php echo $name?>">
                            </div>
                        </div>
                        <div>
                            <label for="rating">rating</label>
                            <input id="rating" type="number" placeholder="number (99 - 10)" name="reting" value="<?php echo $name?>">
                        </div>
                        <div  class="inputtyprnumber">
                            <div>
                                <label for="pace">pace</label>
                                <input id="pace" type="number" placeholder="number (99 - 10)" name="pacing" value="<?php echo isset($pace) ? $pace : ''; ?>">
                                </div>
                            <div>
                                <label for="shooting">shooting</label>
                                <input id="shooting" type="number" placeholder="number (99 - 10)" name="shooting"  value="<?php echo $name?>">
                            </div>
                        </div>
                        <div class="inputtyprnumber">
                            <div>
                                <label for="passing">passing</label>
                                <input id="passing" type="number" placeholder="number (99 - 10)" name="passing" value="<?php echo $name?>">
                            </div>
                            <div>
                                <label for="dribbling">dribbling</label>
                                <input id="dribbling" type="number" name="dribbling" value="<?php echo $name?>">
                            </div>
                        </div>
                        <div class="inputtyprnumber">
                            <div>
                                <label for="defending">defending</label>
                                <input id="defending" type="number" placeholder="number (99 - 10)" name="defending" value="<?php echo $name?>">
                            </div>
                            <div>
                                <label for="physical">physical</label>
                                <input id="physical" type="number" placeholder="number (99 - 10)" name="physical" value="<?php echo $name?>">
                            </div>
                        </div>
                    
                        <div class="buttonAddjouer">
                            <button type="submit" id="buttonAddjouer">add new jeur</button>
                        </div>
                    </div>
          </form>
</body>
</html>