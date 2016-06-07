<?php
include_once 'odesk_baza.php';
?>
<html>
    <head>  
        <meta charset="UTF-8">
    </head>
    <body>
        <h3> Izberite ponudbe </h3>
        <table border="1">
            <tr>
                <th> ID projekta </th>
                <th> Ime projekta </th>
                <th> Začetek </th>
                <th> Konec </th>
                <th> Opis projekta </th>
                <th colspan="2"> Odgovorna oseba </th>
            </tr>
            <?php
            $sql="SELECT p.id_p, p.title, p.start_date, p.end_date, p.description, u.first_name, u.last_name
                  FROM projects p
                  INNER JOIN users u
                  ON u.id_u=p.id_u";
            $query=mysqli_query($link, $sql);
            while($row=mysqli_fetch_array($query))
            {
                echo '<tr>';
                echo '<td>'.$row['id_p'].'</td>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td>'.$row['start_date'].'</td>';
                echo '<td>'.$row['end_date'].'</td>';
                echo '<td>'.$row['description'].'</td>';
                echo '<td>'.$row['first_name'].'</td>';
                echo '<td>'.$row['last_name'].'</td>';
                echo '<td> <a href="employer_choose.php"> Izberi </a></td>';
                echo '</tr>';
            }
            ?>
        </table>
        
        <hr>
        <h3> Aktivni projekti </h3>
        <table border="1">
            <tr>
                <th> ID projekta </th>
                <th> Ime projekta </th>
                <th> Začetek </th>
                <th> Konec </th>
                <th> Opis projekta </th>
                <th colspan="2"> Odgovorna oseba </th>
                <th colspan="2"> Dejanje </th>
            </tr>
            <?php
            $sql="SELECT ap.id_project, ap.project_title, ap.project_date_start, ap.project_date_end, ap.project_description, ap.user_firstname, ap.user_lastname
                  FROM active_projects ap";
            $query=mysqli_query($link, $sql);
            while($row=mysqli_fetch_array($query))
            {
                echo '<tr>';
                echo '<td>'.$row['id_project'].'</td>';
                echo '<td>'.$row['project_title'].'</td>';
                echo '<td>'.$row['project_date_start'].'</td>';
                echo '<td>'.$row['project_date_end'].'</td>';
                echo '<td>'.$row['project_description'].'</td>';
                echo '<td>'.$row['user_firstname'].'</td>';
                echo '<td>'.$row['user_lastname'].'</td>';
                echo '<td> <a href="employer_deleteproject.php"> Odstrani </a></td>';
                echo '<td> <a href="employer_finish.php"> Zaključi </a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </body>
</html>
