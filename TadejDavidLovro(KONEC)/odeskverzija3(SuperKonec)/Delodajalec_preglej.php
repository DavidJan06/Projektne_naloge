<?php include_once 'header.php'; ?>
<div class="main">
    <h3> Pregled Mojih Projektov </h3>
    <table class="center" border="1">
        <tr>
            <th> ID projekta </th>
            <th> Ime projekta </th>
            <th> Začetek </th>
            <th> Konec </th>
            <th> Opis projekta </th>
            <th colspan="2"> Delavci </th>
            <th> Veščine delavca </th>
            <th> Narejenih nalog delavca </th>
            <th> Ocena delavca </th>
            <th>Izbriši Osebo</a> </th>
            <th>Zaključi Osebo</a> </th>
        </tr>
<?php

$id_u=$_SESSION['id_u'];

$id_p = (int) $_GET['id_p'];


    
            //$sql5= "SELECT s.title
             //   FROM users u
             //   INNER JOIN skills_users as su ON
             //   su.id_u = u.id_u
             //   INNER JOIN skills as s ON
             //   su.id_s = s.id_s
             //   WHERE su.id_u =".$id_u;
           // $query5=mysqli_query($link, $sql5);
        //while($row=mysqli_fetch_array($query5))
       // {
           
        //            echo '<tr>';
       //             echo '<td>'.$row['title'].'</td>';
        //            echo '</tr>';
       // }

        $sql3="SELECT p.id_p, p.title, p.start_date, p.end_date, p.description, u.first_name, u.last_name, u.id_u, u.narejen, u.score
                FROM projects as p
                INNER JOIN projects_users as pu ON p.id_p = pu.id_p
                INNER JOIN users as u
                ON pu.id_u=u.id_u
   
                WHERE pu.id_p =".$id_p;
     
        
        $query2=mysqli_query($link, $sql3);
        while($row=mysqli_fetch_array($query2))
        {
            echo '<tr>';
            echo '<td>'.$row['id_p'].'</td>';
            echo '<td>'.$row['title'].'</td>';
            echo '<td>'.$row['start_date'].'</td>';
            echo '<td>'.$row['end_date'].'</td>';
            echo '<td>'.$row['description'].'</td>';
            echo '<td>'.$row['first_name'].'</td>';
            echo '<td>'.$row['last_name'].'</td>';
     
            
            
            $vescine= "SELECT s.title
                FROM users u
                INNER JOIN skills_users as su ON
                su.id_u = u.id_u
                INNER JOIN skills as s ON
                su.id_s = s.id_s
                WHERE su.id_u =".$id_u;
            $result3=mysqli_query($link, $vescine);
            $row1=mysqli_fetch_array($result3);
             echo '<td>';
                    echo $row1['title'];
             echo '</td>';
            
             
            echo '<td>'.$row['narejen'].'</td>';
            echo '<td>'.$row['score'].'</td>';
            
            //$akti = "SELECT * 
             //   FROM projects_users pu WHERE pu.id_u=".$id_u;
            //$result3 = mysqli_query($link, $akti);
            //$user3 = mysqli_fetch_array($result3);
            
            //echo $user3['pu.id_u'];
            
            
            echo '<td>';
            
            echo '<a href="Delodajalec_delete_user.php?id_u='.$row['id_u'].'" onclick="return confirm(\'Prepričani?\')">Odjavi Uporabnika</a>';
            
            echo '</td>';
            
            
            echo '<td>';
            
            echo '<a href="Delodajalec_user_zakljuci.php?id_u='.$row['id_u'].'" onclick="return confirm(\'Prepričani?\')">Zaključi Uporabnika</a>';
            
            echo '</td>';

            
            echo '</tr>';
        }
        ?>
    </table>
    
    <a href="Delodajalec.php"> Nazaj na meni </a>
</div>
  
    
    


<?php include_once 'footer.php'; ?>