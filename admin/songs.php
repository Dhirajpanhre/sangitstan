<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_POST['add_song'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $lyrics = $_POST['lyrics'];
   $lyrics = filter_var($lyrics, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);

   $link = $_POST['link'];
   $link = filter_var($link, FILTER_SANITIZE_STRING);

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;


   $select_songs = $conn->prepare("SELECT * FROM `songs` WHERE name = ?");
   $select_songs->execute([$name]);

   if($select_songs->rowCount() > 0){
      $message[] = 'song name already exist!';
   }else{

      $insert_songs = $conn->prepare("INSERT INTO `songs`(name, description, lyrics, category ,image_01, link) VALUES(?,?,?,?,?,?)");
      $insert_songs->execute([$name, $description, $lyrics, $category, $image_01, $link]);

      if($insert_songs){
         if($image_size_01 > 2000000 ){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
        
            $message[] = 'new song added!';
         }

      }

   }  

};

if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_songs_image = $conn->prepare("SELECT * FROM `songs` WHERE id = ?");
   $delete_songs_image->execute([$delete_id]);
   $fetch_delete_image = $delete_songs_image->fetch(PDO::FETCH_ASSOC);
   unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
 
   $delete_songs = $conn->prepare("DELETE FROM `songs` WHERE id = ?");
   $delete_songs->execute([$delete_id]);
   
   $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
   $delete_wishlist->execute([$delete_id]);
   header('location:songs.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Songs</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="add-products">

   <h1 class="heading">add Songs</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <div class="inputBox">
            <span>Song name (required)</span>
            <input type="text" class="box" required maxlength="100" placeholder="enter name" name="name">
         </div>
         <div class="inputBox">
            <span>Song Description (required)</span>
            <input type="text"  class="box" require placeholder="enter description"name="description">
         </div>
         <div class="inputBox">
         <select name="category" class="box" required>
            <option value="" selected disabled>select category</option>
               <option value="Romantic songss">Romantic songs</option>
               <option value="Rap songs">Rap songs</option>
               <option value="spiritual songs">Spiritual songs</option>
               <option value="Healing songs"> Healing songs</option>
               <option value="Workout songs"> Workout songs</option>
               <option value="Traveling songs"> Traveling songs</option>
               <option value="Asthetic songs"> Asthetic songs</option>
         </select>
         </div>

        <div class="inputBox">
            <span>image 01 (required)</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>

         <div class="inputBox">
            <span> lyrics (required)</span>
            <textarea name="lyrics" placeholder="enter product details" class="box" required  cols="30" rows="10"></textarea>
         </div>
      </div>
      <div class="inputBox">
            <span>link (required)</span>
            <input type="text"  class="box" require placeholder="enter link"name="link">
         </div>
      <input type="submit" value="add song" class="btn" name="add_song">
   </form>

</section>
<!-- 
<section class="show-products">

   <h1 class="heading">Songs added</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <img src="../uploaded_img/<?= $fetch_products['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="price">$<span><?= $fetch_products['price']; ?></span>/-</div>
      <div class="details"><span><?= $fetch_products['details']; ?></span></div>
      <div class="flex-btn">
         <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">update</a>
         <a href="products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
      </div>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>
   
   </div>

</section> -->








<script src="../js/admin_script.js"></script>
   
</body>
</html>