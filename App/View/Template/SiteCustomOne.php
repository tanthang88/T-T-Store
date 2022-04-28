<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php
        if (isset($page_title)){
            echo $page_title;
        } else {
            echo "Trang Chủ";
        }
        ?>
    </title>
    <!--Swiper Slide-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--JQUERY-->
    <!--    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>-->
    <!--CK EDITOR 5-->
    <!--    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>-->

    <!--    Main Style-->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/css/main.css">
   <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!--Axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Demo styles -->
</head>
<body style="background: #f4f4f4">
<?php
$this->renderView('Site/Header');
$this->renderView('Site/Breadcrumb',$data);
$this->renderView($content, $data);
$this->renderView('Site/Footer');
?>
<script src="<?=ROOT_URL?>/node_modules/jquery/dist/jquery.min.js"></script>
<!--BOOTSTRAP BUNDLE-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="<?=ROOT_URL?>/public/js/main.js"></script>
<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    const swiper = new Swiper(".listImageRelated", {
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesProgress: true,
    });
    const swiper2 = new Swiper(".ProductImage", {
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
</body>
</html>
