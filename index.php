<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sangitstan | home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>
<section class="search-form">
   <form action="" method="post">
    <a href="search_page.php" style="width:100%;"> <input type="text" name="search_box" placeholder="search here..." maxlength="100" class="box" required ></a> 
      <button type="submit" class="fas fa-search" name="search_btn"></button>
   </form>
</section>



<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/img2.jpeg" alt="">
         </div>
         <div class="content">
            
            <a href="shop.php" class="btn">Listen now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/img.jpeg" alt="">
         </div>
         <div class="content">
      
            <a href="shop.php" class="btn">Listen now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/img1.jpeg" alt="">
         </div>
         <div class="content">
           
            <a href="shop.php" class="btn">Listen now</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>






<section class="home-products">

   <h1 class="heading">Listen by category</h1>

   <div class="swiper">

   <div class="swiper-wrapper">

   <form action="" method="post" class="swiper-slide slide" style=" background: linear-gradient(89.7deg, rgb(0, 0, 0) -10.7%, rgb(53, 92, 125) 88.8%);">

<img src="images/romantic.jpeg" alt="">


<a href="category.php?category=Romantic Songs" class="option-btn" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); color:#000; border-radius:3rem;"><i class="fa fa-external-link" aria-hidden="true"></i> Romantic Songs</a>


   </div>
   
   </form>
   
   <div class="swiper-pagination"></div>

   </div>

</section>


<section class="home-products">

 

   <div class="swiper">

   <div class="swiper-wrapper">

   <form action="" method="post" class="swiper-slide slide" style=" background: linear-gradient(89.1deg, rgb(251, 0, 83) 15.2%, rgb(179, 146, 231) 98.5%);">

<img src="images/rap.jpeg" alt="">


<a href="category.php?category=Rap Songs" class="option-btn" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); color:#000; border-radius:3rem;"><i class="fa fa-external-link" aria-hidden="true"></i> Rap Songs</a>

   </div>
   
   </form>
   
   <div class="swiper-pagination"></div>

   </div>

</section>



<section class="home-products">

 

   <div class="swiper">

   <div class="swiper-wrapper">

   <form action="" method="post" class="swiper-slide slide" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">

<img src="images/spritual.jpeg" alt="">


<a href="category.php?category=Spriual Songs" class="option-btn" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); color:#000; border-radius:3rem;"><i class="fa fa-external-link" aria-hidden="true"></i> Spriual Songs</a>
 


   </div>
   
   </form>
   
   <div class="swiper-pagination"></div>

   </div>

</section>


<section class="home-products">

 

   <div class="swiper">

   <div class="swiper-wrapper">

   <form action="" method="post" class="swiper-slide slide" style="background: linear-gradient(109.6deg, rgb(245, 239, 249) 30.1%, rgb(207, 211, 236) 100.2%);">

<img src="images/healing.jpeg" alt="">


<a href="category.php?category=Healing Songs" class="option-btn" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); color:#000; border-radius:3rem;"><i class="fa fa-external-link" aria-hidden="true"></i> Healing Songs</a>



   </div>
   
   </form>
   
   <div class="swiper-pagination"></div>

   </div>

</section>


<section class="home-products">

 

   <div class="swiper">

   <div class="swiper-wrapper">

   <form action="" method="post" class="swiper-slide slide" style="background: linear-gradient(109.6deg, rgb(0, 37, 84) 11.2%, rgba(0, 37, 84, 0.32) 100.2%);">

<img src="images/workout.jpeg" alt="">


<a href="category.php?category=Workout Songs" class="option-btn" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); color:#000; border-radius:3rem;"><i class="fa fa-external-link" aria-hidden="true"></i> Workout Songs</a>
 


   </div>
   
   </form>
   
   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

 

   <div class="swiper">

   <div class="swiper-wrapper">

   <form action="" method="post" class="swiper-slide slide" style="background: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);">

<img src="images/travle.jpeg" alt="">


<a href="category.php?category=Travling Songs" class="option-btn" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); color:#000; border-radius:3rem;"><i class="fa fa-external-link" aria-hidden="true"></i> Traveling Songs</a>
 


   </div>
   
   </form>
   
   <div class="swiper-pagination"></div>

   </div>

</section>


<section class="home-products">

 

   <div class="swiper">

   <div class="swiper-wrapper">

   <form action="" method="post" class="swiper-slide slide" style="background: linear-gradient(87.4deg, rgb(255, 241, 165) 1.9%, rgb(200, 125, 76) 49.7%, rgb(83, 54, 54) 100.5%);">

<img src="images/asthetic.jpeg" alt="">


<a href="category.php?category=Asthetic Songs" class="option-btn" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%); color:#000; border-radius:3rem;"><i class="fa fa-external-link" aria-hidden="true"></i> Asthetic Songs</a>



   </div>
   
   </form>
   
   <div class="swiper-pagination"></div>

   </div>

</section>
<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>