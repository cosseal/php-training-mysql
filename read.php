<?php

include "connBD.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
        <tr>
            <th>Randonnées</th>
            <th>Difficulté</th>
            <th>Distance</th>
            <th>Durée</th>
            <th>Dénivelé</th>
        </tr>

      <?php
      $rando = "SELECT * FROM hiking WHERE 1";
      $result = $conn->query($rando);

      While($tab = $result->fetch_assoc()) {
          $duration = date_create($tab["duration"]);
          echo utf8_encode("<tr>
                    <td>".$tab["name"]."</td>
                    <td>".ucfirst($tab["difficulty"])."</td>
                    <td>".$tab["distance"]." km </td>
                    <td>".date_format($duration,'G:i')."</td>
                    <td>".$tab["height_difference"]." m </td>
                </tr>");

      }


      ?>
    </table>
  </body>
</html>
