<!DOCTYPE html>

<html>

<head>
  <title>Chefs Table</title>
  <link rel="stylesheet" href="./styles/general.css">
</head>

<body>

<?php
  // $msg = "HOWDY";
  // echo '<script type="text/javascript">console.log("'. $msg .'");</script>';

  require_once './includes/fun.php';
  consoleMsg("PHP to JS .. is Wicked FUN");

  // Include env.php that holds global vars with secret info
  require_once './env.php';

  // Include the database connection code
  require_once './includes/database.php';


?>

  <header>
  <h1>Chef's Table</h1>
  <h3>A World of Tastes: Unleash Your Inner Chef with Our Recipes</h3>
  <div class="input">
  <form action="index.php" method="POST" class="search">
    <label for="search">Search:</label>
  <input type="search" id="search" name="search" value="<?php echoSearchValue(); ?>">
  <button class="search" type="submit" name="submit" id="submit">Search</button>
  </form>
 
</div>
<ul id="filters">
    <li><a href="index.php?filter=beef">Beef</a></li>
    <li><a href="index.php?filter=chicken">Chicken</a></li>
    <li><a href="index.php?filter=pork">Pork</a></li>
    <li><a href="index.php?filter=vegitarian">Vegetarian</a></li>
    <li><a href="index.php?filter=turkey">Turkey</a></li>
    <li><a href="index.php?filter=steak">Steak</a></li>

  </ul>
  <!-- <ul>
    <button>Chicken</button>
    <button>Beef</button>
    <button>Pork</button>
    <button>Turkey</button>
    <button>Steak</button>
    <button>Vegetarian</button>
  </ul> -->
</header>

  <div id="content">
    <?php
      // // echo "Holla";
      // $rNum = rand(1, 15);
      // for ($lp = 0; $lp <= $rNum; $lp++) {
      //   // echo "works";

      //   if ($lp % 2 == 0) {
      //     echo "<figure class='oneRec'>";
      //   } else {
      //     echo "<figure class='oneRecOdd'>";
      //   }

      //   echo "<img src='images/0101_FPP_Chicken-Rice_97338_WEB_SQ.png' alt='FPP Chicken Rice'>";
      //   echo "<figcaption>" . $lp . " Ancho-Orange Chicken</figcaption>";
      //   echo "</figure>";
      // }
    ?>

    <?php
      
      $search = $_POST['search'];
      consoleMsg("Search is: $search");

      // STEP 06 Build Filter Query
      // Get filter info if passed in URL
      $filter = $_GET['filter'];
      consoleMsg("Filter is: $filter");

      if (!empty($search)) {
        consoleMsg("Doing a SEARCH");
        // $query = "select * FROM recipes WHERE title LIKE '%{$search}%'";
        $query = "select * FROM recipes WHERE title LIKE '%{$search}%' OR subtitle LIKE '%{$search}%'";
        $result = mysqli_query($connection, $query);
      } elseif (!empty($filter)) {
        consoleMsg("Doing a FILTER");
        $query = "select * FROM recipes WHERE proteine LIKE '%{$filter}%'";
      } else {
        consoleMsg("Loading ALL RECIPES");
        $query = "SELECT * FROM recipes";
      }

// Get all the recipes from "recipes" table in the "idm232" database
      // $query = "SELECT * FROM recipes";
      $results = mysqli_query($db_connection, $query);
      if ($results->num_rows > 0) {
        consoleMsg("Query successful! number of rows: $results->num_rows");
        while ($oneRecipe = mysqli_fetch_array($results)) {
          // echo '<h3>' .$oneRecipe['Title']. ' - '  . $oneRecipe['Cal/Serving']  .  '</h3>'; 
          $id = $oneRecipe['id'];

          echo '<a href="./detail.php?recID='. $id .'">';
          if ($id % 2 == 0) {
            echo '<figure class="oneRec">';
          } else {
            echo '<figure class="oneRec">';
          }
          echo '<img src="./images/' . $oneRecipe['Main IMG'] . '" alt="Dish Image">';
          echo '<figcaption>' . $id . ' ' . $oneRecipe['Title'] . ' ' . $oneRecipe['Subtitle'] .'</figcaption>';
          // echo '<br>';
          // echo '<figcaption>' . ' ' . $oneRecipe['Subtitle'] . '</figcaption>';
          echo '</figure>';
          echo '</a>';
        }

      } else {
        consoleMsg("QUERY ERROR");
      }
    ?>

  </div>

  <footer>

<h3>Copyright 2023 Gavin Cochrane</h3>

</footer>

</body>

</html>