<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/navbar.php"); ?>
<div class="bd-wrapper-thin">
    <div class="bd-gap-50"></div>
    <div class="bd-back-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="none" viewBox="0 0 24 25">
            <path stroke="#569AF6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12.5H5m7 7-7-7 7-7" />
        </svg>
        <a href="/">back</a>
    </div>

    <div class="bd-title-welcome bd-text-align-center">
        Sign Up!!
    </div>
    <div class="bd-gap-50"></div>
    <form action="/signup" method="POST">
        <div class="bd-input-simple">
            <label class="bd-input-simple_label" for="email">Email</label>
            <input name="email" id="email" class="bd-input-simple_input" type="text" <?php if (isset($params['email'])) {
                                                                                            echo "value='{$params['email']}'";
                                                                                        } ?>>
        </div>
        <?php
        if (isset($errors['email']))
            echo "<div class='bd-error'>{$errors['email']}</div>";
        ?>
        <div class="bd-gap-24"></div>
        <div class="bd-input-simple">
            <label class="bd-input-simple_label" for="user_name">User Name</label>
            <input name="user_name" id="user_name" class="bd-input-simple_input" type="text" <?php
                                                                                                if (isset($params['user_name'])) {
                                                                                                    echo "value='{$params['user_name']}'";
                                                                                                }  ?>>
        </div>

        <?php
        if (isset($errors['user_name']))
            echo "<div class='bd-error'>{$errors['user_name']}</div>";
        ?>
        <div class="bd-gap-24"></div>
        <div class="bd-input-simple">
            <label class="bd-input-simple_label" for="pass">Password</label>
            <input name="pass" id="pass" class="bd-input-simple_input" type="password">
        </div>
        <?php
        if (isset($errors['pass']))
            echo "<div class='bd-error'>{$errors['pass']}</div>";
        ?>

        <div class="bd-gap-24"></div>
        <div class="bd-input-simple">
            <label class="bd-input-simple_label" for="name">Name</label>
            <input name="name" id="name" class="bd-input-simple_input" type="text" <?php
                                                                                    if (isset($params['name'])) {
                                                                                        echo "value='{$params['name']}'";
                                                                                    }
                                                                                    ?>>
        </div>

        <div class="bd-gap-24"></div>
        <div class="bd-input-simple">
            <label class="bd-input-simple_label" for="display_name">Display Name</label>
            <input name="display_name" id="display_name" class="bd-input-simple_input" type="text" <?php if (isset($params['display_name'])) {
                                                                                                        echo "value='{$params['display_name']}'";
                                                                                                    } ?>>
        </div>

        <div class="bd-gap-24"></div>
        <div class="bd-checkbox-single-container">
            <input name="rememberme" id="rememberme" class="bd-checkbox" type="checkbox">
            <label class="bd-input-simple_label" for="rememberme">Remember me</label>
        </div>
        <div class="bd-grid-50-width bd-grid-50-width_gap">
            <button class="btn-primary  ">
                Register
            </button>
            <button class="btn-tertiary  ">
                Forget Password
            </button>
        </div>
    </form>
    <div class="bd-gap-100"></div>



</div>

<?php require base_path("views/partials/footer.php"); ?>