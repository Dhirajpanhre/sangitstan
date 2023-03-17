<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">
   <div class="icons">
   <div id="menu-btn" class="fas fa-bars"></div>
</div>
      <a href="index.php" class="logo"><strong><ul><span><i class="fa fa-music" aria-hidden="true"></i> SANGITSTAN</span></ul></strong></a>

      <nav class="navbar">
         <a href="index.php"><strong>Home</strong></a>
         <a href="about.php"><strong>About</strong></a>
         <a href="songs.php"><strong>Songs</strong></a>
         <a href="contact.php"><strong>Contact</strong></a>
        
        
      </nav>
 
      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         
         
         <a href="wishlist.php" style="color:red;"><i class="fas fa-heart"></i><span></span></a>
         <!-- <a href="cart.php"><i class="fas fa-shopping-cart"></i></a> -->
         <!-- <div id="user-btn" class="fas fa-user"></div> -->
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">Update Profile</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">Register</a>
            <a href="user_login.php" class="option-btn">Login</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">Logout</a> 
         <?php
            }else{
         ?>
         <p>please Login or Register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">Register</a>
            <a href="user_login.php" class="option-btn">Login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header> 