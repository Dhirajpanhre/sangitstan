<?php


include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};


if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

   $image_01 = $_POST['image_01'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);

 

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $image_01 = $_POST['pimage_01'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="products">

   <h1 class="title">Listen</h1>

   <div class="box-container">

   <?php
      $category_name = $_GET['category'];
      $select_songs = $conn->prepare("SELECT * FROM `songs` WHERE category = ?");
      $select_songs->execute([$category_name]);
      if($select_songs->rowCount() > 0){
         while($fetch_songs = $select_songs->fetch(PDO::FETCH_ASSOC)){ 
   ?>
 <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_songs['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_songs['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_songs['description']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_songs['image_01']; ?>">

      <a href="quick_view.php?pid=<?= $fetch_songs['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_songs['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_songs['name']; ?></div>
      <div class="name"><?= $fetch_songs['description']; ?></div>
     
      <a href="category.php?category=?" class="option-btn" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); color:#000; border-radius:3rem;"><i class="fa fa-play-circle" aria-hidden="true"></i> Play </a>
     
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }

   ?>

   </div>

</section>







<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>