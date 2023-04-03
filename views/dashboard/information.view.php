<?php


use app\Login; ?>
<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/navbar.php"); ?>

<div class="bd-gap-100"></div>
<section class="bd-wrapper bd-grid-right-sidebar">
    <div class="bd-panel-sidebar-left bd-bordered ">
        <div clascs="bd-panel-sidebar-left_left">
            <?php if (Login::userPhoto() === '') : ?>
                <div id="userPhoto" class="bd-img-holder"></div>
            <?php else : ?>
                <img class="bd-img-holder" src="<?php echo SITE_URL; ?>/public/assets/images/users/<?php echo Login::userPhoto(); ?>" alt="Profile Image">
            <?php endif ?>
            <form action="/change-user-photo" method="POST" enctype="multipart/form-data">
                <div class="bd-input-simple">
                    <label class=" bd-input-simple_label" for="imageInput">Select file</label>
                    <input type="file" id="imageInput" title=" " name="images[]" class="btn-primary bd-input-simple_input" />
                </div>
                <div class="bd-gap-24"></div>
                <div id="uploadStatus"></div>
                <button type="submit" class="btn-primary  ">
                    Edit Photo
                </button>
            </form>
        </div>

        <div class="bd-panel-sidebar-left_right">
            <form action="/update-info" method="POST">
                <div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="user_nicename">Name</label>
                    <input name="user_nicename" class="bd-input-simple_input" type="text" value="<?php echo $_SESSION['user']['user_nicename'] ?>">
                </div>
                <?php
                if (isset($errors['user_nicename']))
                    echo "<div class='bd-error'>{$errors['user_nicename']}</div>";
                ?>
                <div class="bd-gap-24"></div>
                <div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="user_login">Username</label>
                    <input name="user_login" class="bd-input-simple_input" type="text" value="<?php echo $_SESSION['user']['user_login'] ?>">
                </div>
                <?php
                if (isset($errors['user_login']))
                    echo "<div class='bd-error'>{$errors['user_login']}</div>";
                ?>
                <div class="bd-gap-24"></div>
                <div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="display_name">Display Name</label>
                    <input name="display_name" class="bd-input-simple_input" type="text" value="<?php echo $_SESSION['user']['display_name'] ?>">
                </div>
                <?php
                if (isset($errors['display_name']))
                    echo "<div class='bd-error'>{$errors['display_name']}</div>";
                ?>
                <div class="bd-gap-24"></div>
                <div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="user_email">Email</label>
                    <input name="user_email" class="bd-input-simple_input" disabled type="text" value="<?php echo $_SESSION['user']['user_email'] ?>">
                </div>
                <div class="bd-gap-50"></div>

                <button type="submit" class="btn-primary">
                    Update Info
                </button>
            </form>
        </div>

    </div>
    <div class="bd-panel-sidebar-right bd-bordered">
        <div class="bd-gap-60"></div>
        <?php if (Login::userPhoto() === '') : ?>
            <div id="userPhoto" class="bd-img-holder"></div>
        <?php else : ?>
            <img class="bd-img-holder" src="<?php echo SITE_URL; ?>/public/assets/images/users/<?php echo Login::userPhoto(); ?>" alt="Profile Image">
        <?php endif ?>
        <div class="bd-gap-24"></div>
        <div class="bd-title-welcome">Welcome</div>

        <div class="bd-title-welcome">
            <?php echo $_SESSION['user']['display_name'] ?>
        </div>
        <div class="bd-gap-50"></div>
        <div class="bd-side-menu bd-side-menu-active">
            INFORMAtion
        </div>
        <div class="bd-side-menu">
            Listings
        </div>
        <div class="bd-side-menu">
            plans
        </div>
        <div class="bd-side-menu">
            settings
        </div>
        <div class="bd-gap-100"></div>

    </div>
</section>
<div class="bd-gap-100"></div>

<?php require base_path("views/partials/footer.php"); ?>