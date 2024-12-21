<?php
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "fut_champion";


$connexion =  mysqli_connect($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("Échec de la connexion à la base de données : " . $connexion->connect_error); //die -> stope le programe et affcher message erore
}
// $connexion->close();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tableau de bord FUT Champions</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="h-screen bg-gray-100 text-gray-800">
  <!-- Conteneur principal -->
  <div class="h-full flex">
    <!-- Barre laterale -->
    <aside class="w-1/5 bg-gray-800 text-white flex flex-col p-4">
      <h2 class="text-lg font-bold mb-4">FUT Champions</h2>
      <nav>
        <ul>
          <li class="py-2 hover:bg-gray-700 cursor-pointer">les joueur</li>
          <li class="py-2 hover:bg-gray-700 cursor-pointer">Vue d'ensemble</li>
          <li class="py-2 hover:bg-gray-700 cursor-pointer">Statistiques des joueurs</li>
         
        </ul>
      </nav>
    </aside>

    <!-- Contenu principal -->
    <div class="flex-1 flex flex-col">


      <!-- Contenu -->
      <main class="flex-1 p-6 bg-gray-50">

        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="font-bold text-lg">Taux de victoire</h2>
            <div class="mt-2 text-3xl font-bold text-green-600">75%</div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="font-bold text-lg">Buts marques</h2>
            <div class="mt-2 text-3xl font-bold">45</div>
          </div>
          <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="font-bold text-lg">Meilleur joueur</h2>
            <div class="mt-2 text-xl">Kylian Mbappe</div>
          </div>
        </section>
        <dev class="btn-add-new-element">
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> <a href="assets/php/create.php" class="">add joueur</a></button> 
        </dev>

      
        <!-- table de jouer -->
         

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                           <th scope="col" class="px-6 py-3 text-center">
                            joueur ID
                             </th>
                            <th scope="col" class="px-6 py-3 text-center">
                            name
                             </th>
                             <th scope="col" class="px-6 py-3 text-center">
                            natenaliti
                             </th>
                            <th scope="col" class="px-6 py-3 text-center">
                            position
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                            rating
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                            pace
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                            shooting
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                            passing
                            </th> <th scope="col" class="px-6 py-3 text-center">
                            dribbling
                            </th> <th scope="col" class="px-6 py-3 text-center">
                            defending
                            </th>
                            </th> <th scope="col" class="px-6 py-3 text-center">
                            physical
                            </th>
                            </th> <th scope="col" class="px-6 py-3 text-center">
                            supr/upd
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>

                       <?php 
                            $sql = "
                            SELECT * FROM players
                            JOIN statistickes on statistickes.playerID=players.playerID
                            JOIN club on club.playerID=players.playerID
                            JOIN nationality ON nationality.playerID=players.playerID
                            ";
                            $resultat = $connexion->query($sql);
                                while ($ligne = $resultat->fetch_assoc()) {
                                  echo "<tr class='odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700'>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['playerID'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center flex mt-2'>" . "<img class='w-5 ' src='" . $ligne['photo'] . "' alt=''>" . $ligne['NameCOM'] ."<img class='w-5 ml-2' src='" . $ligne['clubphoto'] . "' alt=''>" ."</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . "<img class='w-8  ml-10 ' src='" . $ligne['photo_nationality'] . "' alt=''>"  . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['position'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['rating'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['pace'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['shooting'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['passing'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['dribbling'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['pace'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" . $ligne['physical'] . "</td>";
                                  echo "<td class='px-6 py-4 text-center'>" .
                                  "<button class='bg-teal-400'>" .
                                  "<a href='assets/php/delete.php?deleted=" . $ligne['playerID'] . "'>Supprimer</a>" .
                                  "</button> " .
                                  "<button type='submit' class='bg-rose-600 mt-2'>" .
                                  "<a href='assets/php/updete.php?updete=" . $ligne['playerID'] . "'>Modifier</a>" .
                                  "</button>" .
                                  "</td>";
                                   echo "</tr>";
                                }

                                ?>
                        <!-- <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                         
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex">
                               <img class="w-5 h-5" src="https://cdn.sofifa.net/players/158/023/25_120.png" alt=""> 
                               <p class="ml-2">Lionel Messi</p> 
                               <img class="w-4 h-4 ml-3 mr-1" src="https://cdn.sofifa.net/flags/ar.png" alt="">
                               <img class="w-4 h-4" src="https://cdn.sofifa.net/meta/team/239235/120.png" alt="">

                            </td>
                            <td class="px-6 py-4 text-center">
                                93
                            </td>
                            <td class="px-6 py-4 text-center">
                                85
                            </td>
                            <td class="px-6 py-4 text-center">
                                92
                            </td>
                            <td class="px-6 py-4 text-center">
                                92
                            </td>
                            <td class="px-6 py-4 text-center">
                                92
                            </td>
                            <td class="px-6 py-4 text-center">
                                92
                            </td>
                            <td class="px-6 py-4 text-center">
                                92
                            </td><td class="px-6 py-4 text-center">
                                92
                            </td>
                            <td class="px-6 py-4 text-center flex">
                                <button> <img src="src/assets/img/delete_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" alt="">
                                </button>
                                <button><img src="src/assets/img/open_in_new_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" alt="">
                                </button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
    </section>
      </main>
      <!-- Pied de page -->
      <footer class="bg-gray-200 text-center p-4">
        <p class="text-gray-600 text-sm"> 2024 Tableau de bord FUT Champions</p>
      </footer>
    </div>
  </div>

  <script src="scrept.js"></script>
</body>
</html>

<?php
                              