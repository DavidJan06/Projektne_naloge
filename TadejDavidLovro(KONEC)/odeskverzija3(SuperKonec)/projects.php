<?php
include_once 'header.php';
?>
<div class="main">
    
<h1>Projekti</h1>

<div class="center">
    
    
    
    <?php
    $id_u=$_SESSION['id_u'];
    
  
    
    
     echo '<a href="project.php">Dodajte Projekt</a> ';
    
echo "<br />";
?>
<a href='employer.php'>Pregled/Prijava Projektov</a>

<table class="tabcenter" border="1" cellspacing="0" cellpadding="0">
    <tr>
        <th>ID projekta</th>
        <th>Naziv projekta</th>
        <th>Ime Lastnika</th>
        <th>Priimek Lastnika</th>
    </tr>
    <?php 
        $query = "SELECT p.id_p, p.title, u.first_name, u.last_name 
                  FROM projects p
                  INNER JOIN users u
                  ON p.id_u=u.id_u";
        $result = mysqli_query($link, $query);
        //izpisal bom vse projekte
        //$st = 0;
        while ($row = mysqli_fetch_array($result)) {
            //$st++;
            
            
            echo "<tr>";
            //echo "<td>$st</td>";
            echo "<td>".$row['id_p']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['last_name']."</td>";
            /*echo "<td>";
            if ($_SESSION['id_u'] == $row['id_u']) {
                echo '<a href="project_edit.php?id='.$row['project_id'].'">Uredi</a> ';
                echo '<a href="project_delete.php?id='.$row['project_id'].'">IzbriĹˇi</a>';
            }
            echo "</td>";*/
            echo '</tr>';
        }
    ?>
</table>

</div>
</div>
<?php
include_once 'footer.php';
?>