<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>
        <?php
        if (isset($page_title)){
            echo $page_title;
        } else {
            echo "Đăng Kí - Đăng Nhập";
        }
        ?>
    </title>
    <script src="<?=ROOT_URL.'/public/js/form/jquery.min.js'?>"></script>
    <!--Bootstrap CSS-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <!-- Custom Theme files -->
    <link href="public/css/form.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- //for-mobile-apps -->
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
    <!--Font-Awesome-->
    <script src="https://kit.fontawesome.com/ffe6867d81.js" crossorigin="anonymous"></script>
</head>
<body>
<!--header start here-->
<div class="header">
<?php
$this->renderView($content, $data);
?>
</div>
<!--header end here-->
<div class="copyright">
    <p>© 2022. All rights reserved | Design by  <a href="https://facebook.com/dumf080802" target="_blank">  PD05015 </a></p>
</div>
<!--footer end here-->
</body>
</html>