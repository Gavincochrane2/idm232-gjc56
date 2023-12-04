<!DOCTYPE html>

<html>

<head>
  <title>Chefs Table</title>
  <link rel="stylesheet" href="./styles/general1.css">
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
  <h1>Dish Details</h1>
  <h3>A World of Tastes: Unleash Your Inner Chef with Our Recipes</h3>
  <div class="input">

  <button class="search" type="submit"> <a href="./index.php">Return</a> </button>
</div>
</header>
<div class="desc">
<?php
echo '<figcaption>' . $id . ' ' . $oneRecipe['Title'] . '</figcaption>';
?>

 </div>

</header>

  <!-- <div id="content"> -->
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
<div id="content"> 
    <?php
      // Get all the recipes from "recipes" table in the "idm232" database
      //$query = "SELECT * FROM recipes";
      // $query = "SELECT * FROM recipes WHERE id = 1";

      $recID = $_GET['recID'];
      $query = "SELECT * FROM recipes WHERE id = $recID";

      $results = mysqli_query($db_connection, $query);
      if ($results->num_rows > 0) {
        consoleMsg("Query successful! number of rows: $results->num_rows");
        while ($oneRecipe = mysqli_fetch_array($results)) {
          echo '<h2>' .$oneRecipe['Title']. ' - '  . $oneRecipe['Cal/Serving'] . 'cal' .  '</h2>'; 
          echo '<h3>' .$oneRecipe['Subtitle'].  '</h3>'; 
          $id = $oneRecipe['id'];
          if ($id % 2 == 0) {
            echo '<figure class="oneRec">';
          } else {
            echo '<figure class="oneRecOdd">';
          }
          echo '<img src="./images/' . $oneRecipe['Main IMG'] . '" alt="Dish Image">';
          //echo '<figcaption>' . $id . ' ' . $oneRecipe['Title'] . '</figcaption>';
          echo '</figure>';
          echo '<p>' .$oneRecipe['Description']. '</p>';
       
          //echo '<img src="./images/' . $oneRecipe['Ingredients IMG'] . '" alt="Ingredients Image">';
      }

      } else {
        consoleMsg("QUERY ERROR");
      }
    ?>
</div>
  <!-- </div> -->

  <div class="ingredients">
  <?php
      // Get all the recipes from "recipes" table in the "idm232" database
      //$query = "SELECT * FROM recipes";
      // $query = "SELECT * FROM recipes WHERE id = 1";
      $recID = $_GET['recID'];
      $query = "SELECT * FROM recipes WHERE id = $recID";

      $results = mysqli_query($db_connection, $query);
      if ($results->num_rows > 0) {
        consoleMsg("Query successful! number of rows: $results->num_rows");
        while ($oneRecipe = mysqli_fetch_array($results)) {
          $id = $oneRecipe['id'];
          if ($id % 2 == 0) {
           echo '<figure class="oneRecOdd">';
         } else {
            echo '<figure class="oneRecOdd">';
          }
   echo '<div class="ingredients">';
   
       
          echo '<img src="./images/' . $oneRecipe['Ingredients IMG'] . '" alt="Ingredients Image">';
          //echo '<p>' .$oneRecipe['All Ingredients'].'</p>';
          $ingredientsArray = explode("*", $oneRecipe['All Ingredients']);
         // echo '<p> Ingredients Array: ' . $ingredientsArray[1]  .  '</p>'; 
          echo '<ul>';
          for($lp = 0; $lp < count($ingredientsArray); $lp++) {
            echo '<li>' . $ingredientsArray[$lp] . '</li>';
          }
          echo '<ul>';
         echo '</div>';

         ?>
         </div>
         
        <div class="heading">
         <h3>Steps</h3>
        </div>

           <?php
 echo '<div class="steps">';
//  echo '<figure>';
          $stepTextArray = explode("*", $oneRecipe['All Steps']);
         
          
          $stepImagesArray = explode("*", $oneRecipe['Step IMGs']);
            

          for($lp = 0; $lp < count($stepTextArray); $lp++) {
            // If step starts with a number, get number minus one for image name
            $firstChar = substr($stepTextArray[$lp],0,1);
            if (is_numeric($firstChar)) {
              consoleMsg("First Char is: $firstChar");
              // echo '<ol>';
              echo '<div class="step">';
              echo ' <div class="stepimg">';
              echo '<img src="./images/' . $stepImagesArray[$firstChar-1] . '" alt="Step Image">';
            echo '</div>';
            }
            echo '<div class="steptext">';
            echo '<h5>' . $stepTextArray[$lp] . '</h5>';
            echo '</div>';
            echo '</div>';
            // echo '</ol>';
            // echo '</figure>';
           
          }
        }

      } else {
        consoleMsg("QUERY ERROR");
      }
      //}

     // } else {
     //   consoleMsg("QUERY ERROR");
      //} 
      echo '</div>';
    ?>
   

</div>
   
</div>


  <footer>

<h3>Copyright 2023 Gavin Cochrane</h3>

</footer>

</body>

</html>