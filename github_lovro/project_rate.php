<?php
include_once 'odesk_baza.php';
?>
<html>
    <head>  
        <meta charset="UTF-8">
    </head>
    <body>
        <h3> Ocenite uporabnike </h3>
        <table border="1">
            <tr>
                <th> ID uporabnika </th>
                <th colspan="2"> Ime in Priimek uporabnika </th>
                <th> Ime projekta </th>
                <th> Ocena </th>
            </tr>
            <?php
            $sql="SELECT p.id_p, u.first_name, u.last_name, p.title
                  FROM projects p
                  INNER JOIN users u
                  ON u.id_u=p.id_u";
            $query=mysqli_query($link, $sql);
            while($row=mysqli_fetch_array($query))
            {
                echo '<tr>';
                echo '<td>'.$row['id_p'].'</td>';
                echo '<td>'.$row['first_name'].'</td>';
                echo '<td>'.$row['last_name'].'</td>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td>
                    <div class="rating">
                    <span>☆</span>
                    <span>☆</span>
                    <span>☆</span>
                    <span>☆</span>
                    <span>☆</span>
                 </div> </td>';
                echo '<td> <a href="project_mark.php"> oceni </a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>
