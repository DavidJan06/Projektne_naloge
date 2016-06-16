 <?php
    include_once 'header.php';
include_once 'odesk_baza.php';
    //shrani si id trenutno prijavljenega uporabnika
    $id_u = $_SESSION['id_u'];
    $query = "SELECT * FROM users WHERE id_u =".$id_u;
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_array($result);
?>
<div class="main">
<h2>Vaš profil</h2>
<form action="profile_update.php" method="POST" enctype="multipart/form-data">
    Ime: <input type="text" name="first_name" value="<?php echo $user['first_name']; ?>" /><br />
    Priimek: <input type="text" name="last_name" value="<?php echo $user['last_name']; ?>" /><br />
    Država: <select name="id_c">        
        <?php 
            $query = "SELECT * FROM countries";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                if ($row['id_c'] == $user['id_c']) {
                    echo '<option value="'.$row['id_c'].'" selected="selected">'.$row['title'].'</option>';
                }
                else {
                    echo '<option value="'.$row['id_c'].'">'.$row['title'].'</option>';
                }
            }
        ?>
    </select><br />
    <?php
        if (!empty($user['avatar'])) {
            echo '<img src="'.$user['avatar'].'" alt="Avatar" height="100px" />';
        }
        else {
            echo '<img src="slike/no.jpg" alt="Ni slike" height="100px" />';
        }
    ?>
    <input type="file" name="fileToUpload" /><br />
    <input type="submit" name="submit" value="Posodobi" />
</form>
<br />
<hr />
<h2>Opis</h2>
<form action="description_update.php" method="POST">
    <textarea name="description" cols="25" rows="5"><?php echo $user['description'];?></textarea><br />
    <input type="submit" name="submit" value="Posodobi" />
</form>
<br />
<hr />
<h2>Veščine</h2>
<div class="center">
<form action="skills_profile_update.php" method="POST">    
    <?php 
        //zapomnim si trenute veščine, ki jih ima
        $query = "SELECT * FROM skills_users WHERE id_u =".$id_u;
        $result = mysqli_query($link, $query);
        //naredim prazno tabelo
        $skills = array();
        while($row = mysqli_fetch_array($result)) {
            //napolnim tabelo z veščinami, ki jih obvladam :)
            $skills[] = $row['id_s'];
        }   
        $query = "SELECT * FROM skills";
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_array($result)) {
            if (in_array($row['id_s'], $skills)) {
                echo '<input type="checkbox"
                        name=skills[] value="'.$row['id_s'].'" checked="checked" />'.$row['title'];
            }
            else {
                echo '<input type="checkbox" 
                        name=skills[] value="'.$row['id_s'].'" />'.$row['title'];
            }
            
        }
        echo '<br />';
            echo '<br />';
        echo '<input type="submit" value="Posodobi" />';
            
        
        $akti = "SELECT *
                FROM projects_users pu WHERE pu.id_u=".$id_u;
            $result3 = mysqli_query($link, $akti);
            $user3 = mysqli_fetch_array($result3);
        
      
             echo '<hr />';
             echo '<br />';
             
             echo '<h2> Opravljenih nalog </h2>';
            $vescine= "SELECT u.narejen
                FROM users u
                WHERE u.id_u =".$id_u;
            $result5=mysqli_query($link, $vescine);
            
            $row1=mysqli_fetch_array($result5);
             
                   
                    echo "Vi ste trenutno naredili"." ";
                    echo $row1['narejen']." ";
                    echo "projektov.";
             
                    
            echo '<br />';
            echo '<br />';
            
            
            echo '<hr />';
            echo '<br />';
             
            echo '<h2> Vaša ocena </h2>';
            $score= "SELECT u.score
                FROM users u
                WHERE u.id_u =".$id_u;
            $result6=mysqli_query($link, $score);
            
            $row2=mysqli_fetch_array($result6);
             
                   
                    echo "Vaša ocena je"." ";
                    echo $row2['score']." , ";
                    echo "Večjo število imate, boljšo kredibilnost imate!";
    ?>
    <br /><br />
</form>
</div>
</div>
<?php
include_once 'footer.php';
?>