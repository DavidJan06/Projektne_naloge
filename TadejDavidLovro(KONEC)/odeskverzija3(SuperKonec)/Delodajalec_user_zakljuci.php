<?php
include_once 'header.php';
?>


<div class="main">
    <div class="center" >
      
      <form action="Delodajalec_user_zakljuci_check.php" method="POST">
    <table border="1">
	<tr>
	<th> ID_uporabnika </th>
	<th colspan="2"> Uporabnik </th>
	<th> Ocena </th>
	<th> Dejanje </th>
	</tr>
    <?php
    $id_u = (int) $_GET['id_u'];
    
    $query = "DELETE FROM projects_users  WHERE id_u=".$id_u;
    
    $query1 = "UPDATE users SET active='0'  WHERE id_u=".$id_u;
    
    $query2 = "UPDATE users SET narejen=narejen+1  WHERE id_u=".$id_u;
    
    //pošljem ukaz v bazo
    mysqli_query($link, $query);
    mysqli_query($link, $query1);
    mysqli_query($link, $query2);
    
            $sql="SELECT u.id_u, u.first_name, u.last_name
                  FROM users u
                  WHERE u.id_u=".$id_u;
            $query4=mysqli_query($link, $sql);
            while($row = mysqli_fetch_array($query4))
            {
                echo '<tr>';
                echo '<td>'.$row['id_u'].'</td>';
                echo '<td>'.$row['first_name'].'</td>';
                echo '<td>'.$row['last_name'].'</td>';
                echo '<td>';
                echo '<span class="starRating">
                <input type="hidden" name="id_u" value="'.$id_u.'">     
                <input id="rating1" type="radio" name="rating" value="1">
                <label for="rating1">1</label>
                <input id="rating2" type="radio" name="rating" value="2">
                <label for="rating2">2</label>
                <input id="rating3" type="radio" name="rating" value="3" checked>
                <label for="rating3">3</label>
                <input id="rating4" type="radio" name="rating" value="4">
                <label for="rating4">4</label>
                <input id="rating5" type="radio" name="rating" value="5">
                <label for="rating5">5</label>
                </span>
                </td>';
                echo '<td> <input type="submit" value="Oceni"> </td>';
                echo '<tr>';
            }
            
            
            
            
            
            ?>
         </table>
        </form>
        
        
    </div>
</div>
         
        
        <?php include_once 'footer.php';  ?>