<div class="container text-center mt-4">
    <h4 class="text-success fw-bold fs-4"><?= @$message ?></h4>
    <h4 class="text-danger fw-bold fs-4"><?= @$error ?></h4>
    <?php
        if (isset($errArray)){
            foreach ($errArray as $key=>$value){
                echo '<h4 class="text-danger fw-bold fs-4">'.$value.'</h4>';
            }
        }
    ?>
    <h4 class="text-danger fw-bold fs-4"><?= @$failed ?></h4>
    <button class="btn btn-outline-warning">
        <a href="
    <?php
        if (isset($redirect)){
            echo ROOT_URL.$redirect;
        } else {
            echo ROOT_URL.'/admin/dashboard';
        }
        ?>
">
            <span class="text-black fw-bolder">Back</span>
        </a>
    </button>
</div>