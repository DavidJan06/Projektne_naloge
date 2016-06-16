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
            <th colspan="2"> Odgovorna oseba </th>
            <th>Preglej projekt</a> </th>
            <th>Zakleni projekt</a> </th>
            <th>Odkleni projekt</a> </th>
            <th>Zaključi projekt</a> </th>
        </tr>
        <?php
        $id_u=$_SESSION['id_u'];

        //$active = "SELECT active FROM users WHERE id_u =".$id_u;
        //$result1 = mysqli_query($link, $active);
        //$user1 = mysqli_fetch_array($result1);
      
     
        
        $sql="SELECT p.id_p, p.title, p.start_date, p.end_date, p.description, u.first_name, u.last_name, u.id_u
                FROM projects as p
                INNER JOIN users as u
                ON u.id_u=p.id_u
                WHERE p.id_u=".$id_u;
        
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
            
            echo '<td>';
             echo '<a href="Delodajalec_preglej.php?id_p='.$row['id_p'].'"> Preglej </a>';
            echo '</td>';
            
            echo '<td>';
            
            $status = "SELECT p.status_p FROM projects as p INNER JOIN users as u
                ON u.id_u=p.id_u WHERE p.id_p =".$row['id_p'];
            $result12 = mysqli_query($link, $status);
            $status_p = mysqli_fetch_array($result12);
            
            if($status_p['status_p'] == 0){
            echo '<a href="Delodajalec_zakleni.php?id_p='.$row['id_p'].'"> Zakleni </a>';
            }
            else{
            echo "Že zaklenjeno!";
            } 
            echo '</td>';
            
            echo '<td>';
            
            if($status_p['status_p'] == 1){
            echo '<a href="Delodajalec_odkleni.php?id_p='.$row['id_p'].'"> Odkleni </a>';
            }
            else{
                echo "Že odklenjeno!";
            } 
            echo '</td>';
            
            echo '<td>';
            echo '<a href="Delodajalec_zakljuceno.php?id_p='.$row['id_p'].'" onclick="return confirm(\'Prepričani? Če niste znotraj projekta ocenili in končali posameznega uporabnika boste kaznovani! \')">Zaključi Projekt</a>';
            echo '</td>';
            

            echo '</tr>';
        }
        ?>
    </table>
        
    
    
    
    
    <!--
    
        <hr>
    <h3> Moj aktivni projekt </h3>
    <div class="center">
    <table class="tabcenter" border="1">
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
        $sql2="SELECT p.id_p, p.title, p.start_date, p.end_date, p.description, u.first_name, u.last_name, u.id_u
                FROM projects p
               INNER JOIN projects_users pu ON p.id_p = pu.id_p
               INNER JOIN users u
              ON pu.id_u=u.id_u
              WHERE pu.id_u=".$id_u;
     
        
        
        $query2=mysqli_query($link, $sql2);
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
            
           
            
            $akti = "SELECT * 
                FROM projects_users pu WHERE pu.id_u=".$id_u;
            $result3 = mysqli_query($link, $akti);
            $user3 = mysqli_fetch_array($result3);
            
            echo $user3['pu.id_u'];
            echo '<td>';
            
            if($user3['id_u'] == $id_u ){
            echo '<a href="employer_deleteproject.php?id='.$row['id_p'].'" onclick="return confirm(\'Prepričani?\')">Odjavi se projekta</a>';
            }
            
        else{
            echo "Niste se še prijavili na projekt";
        }
        
            echo '</td>';
        
            //echo '<td> <a href="employer_finish.php"> Zaključi </a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
    -->
    
    
</div>

<?php include_once 'footer.php'; ?>