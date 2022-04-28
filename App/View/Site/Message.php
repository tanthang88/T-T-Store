<div class="container text-center mt-4">
    <h4 class="text-success fw-bold fs-4"><?= @$message ?></h4>
    <h4 class="text-danger fw-bold fs-4"><?= @$error ?></h4>
    <?php
//    if (isset($errArray)){
//        foreach ($errArray as $key=>$value){
//            echo '<h4 class="text-danger fw-bold fs-4">'.$value.'</h4>';
//        }
//    }
    ?>
    <h4 class="text-danger fw-bold fs-4"><?= @$failed ?></h4>
    <button class="btn btn-outline-warning">
        <a class="text-decoration-none" href="
    <?php
        if (isset($redirect)){
            echo $redirect;
        } else {
            echo ROOT_URL;
        }
        ?>
">
            <span class="text-black fw-bolder">Quay lại</span>
        </a>
    </button>
</div>