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
            <label class="bd-input-simple_label" for="user_email">Email</label>
            <input name="user_email" id="user_email" class="bd-input-simple_input" type="text" <?php if (isset($params['user_email'])) {
                                                                                                    echo "value='{$params['user_email']}'";
                                                                                                } ?>>
        </div>
        <?php
        if (isset($errors['user_email']))
            echo "<div class='bd-error'>{$errors['user_email']}</div>";
        ?>
        <div class="bd-gap-24"></div>
        <div class="bd-input-simple">
            <label class="bd-input-simple_label" for="user_login">User Name</label>
            <input name="user_login" id="user_login" class="bd-input-simple_input" type="text" <?php
                                                                                                if (isset($params['user_login'])) {
                                                                                                    echo "value='{$params['user_login']}'";
                                                                                                }  ?>>
        </div>

        <?php
        if (isset($errors['user_login']))
            echo "<div class='bd-error'>{$errors['user_login']}</div>";
        ?>
        <div class="bd-gap-24"></div>
        <div class="bd-input-simple">
            <label class="bd-input-simple_label" for="user_pass">Password</label>
            <input name="user_pass" id="user_pass" class="bd-input-simple_input" type="password">
        </div>
        <?php
        if (isset($errors['user_pass']))
            echo "<div class='bd-error'>{$errors['user_pass']}</div>";
        ?>

        <div class="bd-gap-24"></div>
        <div class="bd-input-simple">
            <label class="bd-input-simple_label" for="user_nicename">Name</label>
            <input name="user_nicename" id="user_nicename" class="bd-input-simple_input" type="text" <?php
                                                                                                        if (isset($params['user_nicename'])) {
                                                                                                            echo "value='{$params['user_nicename']}'";
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