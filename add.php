<?php
require_once "pdo.php";
session_start();
if ( !isset($_SESSION['name']) ) {
  die('Not logged in');
}

if ( isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year'])
     && isset($_POST['mileage']) ) {

       // Data validation
       if ( strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['mileage']) < 1) {
           $_SESSION['error'] = 'All fields are required';
           header("Location: add.php");
           return;
       }

       if ( !is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ) {
           $_SESSION['error'] = 'Bad data';
           header("Location: add.php");
           return;
       }

    $sql = "INSERT INTO autos (make, model, year, mileage)
              VALUES (:make, :model, :year, :mileage)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage']));
    $_SESSION['success'] = 'added';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
?>
<head>
<title>Siniuc Robert-Valentin</title>
</head>
<p>Add A New Auto</p>
<form method="post">
<p>Make:
<input type="text" name="make"></p>
<p>Model:
<input type="text" name="model"></p>
<p>Year:
<input type="text" name="year"></p>
<p>Mileage:
<input type="text" name="mileage"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
