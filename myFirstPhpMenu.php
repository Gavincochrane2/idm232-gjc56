<!DOCTYPE html>
<html>

<head>
  <title>Static Main Menu</title>
  <link rel="stylesheet" href="general.css">
</head>

<body>
  <h1>Static Main Menu</h1>

<!-- <div id="content">
<figure class="oneRec">

  <img src="images/0101_FPP_Chicken-Rice_97338_WEB_SQ.png" alt="FPP Chicken rice">
  
  <figcaption>
    Anco-Oragnge Chicken
  </figcaption>

</figure>

<figure class="oneRecOdd" >

  <img src="images/0101_FPP_Chicken-Rice_97338_WEB_SQ.png" alt="FPP Chicken rice">
  <figcaption>
    Anco-Oragnge Chicken
  </figcaption>
</figure>

<figure class="oneRec">

  <img src="images/0101_FPP_Chicken-Rice_97338_WEB_SQ.png" alt="FPP Chicken rice">
  <figcaption>
    Anco-Oragnge Chicken
  </figcaption>
</figure>

</div> -->

<div id="content">

  <?php

// echo "Holla";
// echo "<figure class='oneRec'>";

// echo "<img src='images/0101_FPP_Chicken-Rice_97338_WEB_SQ.png' alt='FPP Chicken rice'>";

// echo "<figcaption> Anco-Oragnge Chicken </figcaption>";

// echo "</figure>";

$rNum = rand(1, 15);

for ($lp = 0; $lp <= $rNum; $lp++) {

  if ($lp % 2 == 0){
    echo "<figure class='oneRec'>";
  } else{
    echo "<figure class='oneRecOdd'>";
  }

  echo "<figure class='oneRec'>";

echo "<img src='images/0101_FPP_Chicken-Rice_97338_WEB_SQ.png' alt='FPP Chicken rice'>";

echo "<figcaption>. $lp . Anco-Oragnge Chicken</figcaption>";

echo "</figure>";


}

  ?>

</div>

</body>

</html>