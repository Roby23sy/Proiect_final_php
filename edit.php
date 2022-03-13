<?php
require_once "pdo.php";

session_start();

if ( !isset($_SESSION['name']) ) {
  die('Not logged in');
}
if ( isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year'])
     && isset($_POST['mileage']) && isset($_POST['autos_id']) ) {
    // Data validation
    if ( strlen($_POST['make']) < 1 || strlen($_POST['mileage']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['model']) < 1) {
        $_SESSION['error'] = 'Missing data';
        header("Location: edit.php?autos_id=".$_POST['autos_id']);
        return;
    }

    if ( !is_numeric($_POST['year']) || !is_numeric($_POST['mileage']) ) {
        $_SESSION['error'] = 'Bad data';
        header("Location: edit.php?autos_id=".$_POST['autos_id']);
        return;
    }


    $sql = "UPDATE autos SET make = :make, model = :model,
            year = :year, mileage = :mileage
            WHERE autos_id = :autos_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':mileage' => $_POST['mileage'],
        ':autos_id' => $_POST['autos_id']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}

// Guardian: Make sure that autos_id is present
if ( ! isset($_GET['autos_id']) ) {
  $_SESSION['error'] = "Missing autos_id";
  header('Location: index.php');
  return;
}

$stmt = $pdo->prepare("SELECT * FROM autos where autos_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['autos_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for autos_id';
    header( 'Location: index.php' ) ;
    return;
}

// Flash pattern
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}

$n = htmlentities($row['make']);
$m = htmlentities($row['model']);
$e = htmlentities($row['year']);
$p = htmlentities($row['mileage']);
$autos_id = $row['autos_id'];
?>
<head>
<title>Siniuc Robert-Valentin</title>

<link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
    crossorigin="anonymous">

<link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
    integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r"
    crossorigin="anonymous">

<link rel="stylesheet"
    href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css">

<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>

</head>
<p>Edit Auto</p>
<form method="post">
<p>Make:
<input type="text" name="make" value="<?= $n ?>"></p>
<p>Model:
<input type="text" name="model" value="<?= $m ?>"></p>
<p>year:
<input type="text" name="year" value="<?= $e ?>"></p>
<p>mileage:
<input type="text" name="mileage" value="<?= $p ?>"></p>
<input type="hidden" name="autos_id" value="<?= $autos_id ?>">
<p><input type="submit" value="Save"/>
  <input type="submit" name="cancel" value="Cancel"></p>
</form>
