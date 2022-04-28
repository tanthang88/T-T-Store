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
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/ffe6867d81.js" crossorigin="anonymous"></script>
    <!--JQUERY-->
    <!--    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>-->
    <!--CK EDITOR 5-->
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <!--    Main Style-->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/css/main.css">
</head>
<body>
<?php
//$this->renderView('Site/Header');
$this->renderView($content, $data);
//$this->renderView('Site/Footer');
?>
<!--BOOTSTRAP BUNDLE-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
