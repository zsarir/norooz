<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/navbar.php"); ?>

<div class="bd-gap-100"></div>
<section class="bd-wrapper bd-grid-right-sidebar">
    <div class="bd-panel-sidebar-left bd-bordered ">
        <div clascs="bd-panel-sidebar-left_left">
            <div class="bd-img-holder"></div>
            <div class="bd-gap-24"></div>
            <button class="btn-primary  ">
                Edit Photo
            </button>
        </div>

        <div class="bd-panel-sidebar-left_right">
            <form action="/updateinformation" method="POST">
                <div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="name">Name</label>
                    <input name="name" class="bd-input-simple_input" type="text">
                </div>
                <div class="bd-gap-24"></div>
                <div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="user_name">Username</label>
                    <input name="user_name" class="bd-input-simple_input" type="text">
                </div>
                <div class="bd-gap-24"></div>
                <div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="display_name">Display Name</label>
                    <input name="display_name" class="bd-input-simple_input" type="text">
                </div>
                <div class="bd-gap-24"></div>
                <div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="email">Email</label>
                    <input name="email" class="bd-input-simple_input" disabled type="text" <?php
                                                                                            echo "value='{$email}'";
                                                                                            ?>>
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
        <div class="bd-img-holder"></div>
        <div class="bd-gap-24"></div>
        <div class="bd-title-welcome">Welcome</div>

        <div class="bd-title-welcome">Jeffery</div>
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