<?php include_once 'header.php'; ?>
<div class="main">
<a href="skill_add.php">Dodaj veščino</a>
<table cellpading="0" cellspacing="0" border="1">
    <tr>
        <th>Ime</th>
        <th>Opis</th>
        <th>Akcije</th>
    </tr>

    <?php
        $query = "SELECT * FROM skills";
        //pošljemo ukaz v bazo in shranimo rezultat
        $result = mysqli_query($link, $query);
        
        while($row = mysqli_fetch_array($result)) {
            echo '<tr>';
                echo '<td>'.$row['title'].'</td>';
                echo '<td><pre>'.$row['description'].'</pre></td>';
                echo '<td>';
                echo '<a href="skill_edit.php?id='.$row['id_s'].'">Uredi</a> ';
                echo '<a href="skill_delete.php?id='.$row['id_s'].'" onclick="return confirm(\'Prepričani?\')">Izbriši</a>';
                echo '</td>';
            echo '</tr>';
        }
    ?>
</table> 
</div>
<?php include_once 'footer.php'; ?>