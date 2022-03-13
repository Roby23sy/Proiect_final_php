<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

?>
<html>
<head>
<title>Siniuc Robert-Valentin</title>
</head><body>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

  if ( isset($_SESSION['name']) ){
$stnr = $pdo->prepare('Select autos_id from autos');
$stnr->execute();

if($stnr->rowCount() == 0) {
  echo "No rows found";
}

else{
  echo('<table border="1">'."\n");
  $stmt = $pdo->query("SELECT make, model, year, mileage, autos_id FROM autos");
  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
      echo "<tr><td>";
      echo(htmlentities($row['make']));
      echo("</td><td>");
      echo(htmlentities($row['model']));
      echo("</td><td>");
      echo(htmlentities($row['year']));
      echo("</td><td>");
      echo(htmlentities($row['mileage']));
      echo("</td><td>");
      echo('<a href="edit.php?autos_id='.$row['autos_id'].'">Edit</a> / ');
      echo('<a href="delete.php?autos_id='.$row['autos_id'].'">Delete</a>');
      echo("</td></tr>\n");
  }
}}

else {

  echo("<a href=\"login.php\">Please log in</a>");
}

?>
</table>
<br>
<a href="add.php">Add New Entry</a>
<br>
<input type="submit" name="logout" value="Logout">
