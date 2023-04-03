<?php

use app\content\Plans;
use app\content\CompHtml;

$builder = new CompHtml;
?>
<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/navbar.php"); ?>
<!-- page 1 -->
<div id="newListing-page-1" class="bd-wrapper-normal ">
    <?php echo $builder->gap(50); ?>
    <?php echo $builder->backBtn(); ?>
    <?php echo $builder->gap(24); ?>
    <div class="bd-price-title">
        Create Listing
    </div>
    <div class="bd-wrapper-120">
        <?php echo $builder->progress_bar(1); ?>
    </div>
    <div class="bd-warning-container">
        Please choose a fee plan for your listing:
    </div>
    <?php echo $builder->categorySelectDD(); ?>
    <?php echo $builder->gap(50); ?>
    <div class="bd-grid-3 ">
        <?php echo (new Plans)->getPlans(); ?>
    </div>
    <?php echo $builder->gap(100); ?>
</div>
<!-- Page 2 -->
<div id="newListing-page-2" class="bd-wrapper-normal ">
    <?php echo $builder->gap(50); ?>
    <?php echo $builder->backBtn(); ?>
    <?php echo $builder->gap(24); ?>
    <div class="bd-price-title">
        Create Listing
    </div>
    <div class="bd-wrapper-120">
        <?php echo $builder->progress_bar(2); ?>
    </div>

    <?php echo $builder->inputSingle('name', 'Name', 'Search a Listing'); ?>
    <?php echo $builder->gap(24); ?>
    <?php echo $builder->inputSingle('shortbd', 'Short Business Description'); ?>
    <?php echo $builder->gap(24); ?>
    <?php echo $builder->inputSingle('longbd', 'Long Business Description'); ?>
    <?php echo $builder->gap(24); ?>
    <div class="bd-grid-2">
        <?php echo $builder->inputSingle('phone', 'Phone Number'); ?>
        <?php echo $builder->inputSingle('website', 'Website'); ?>
    </div>
    <?php echo $builder->gap(24); ?>
    <div class="bd-grid-2">
        <?php echo $builder->inputSingle('city', 'City'); ?>
        <?php echo $builder->inputSingle('zipcode', 'Zip Code'); ?>
    </div>
    <?php echo $builder->gap(24); ?>
    <div class="bd-grid-2">
        <?php echo $builder->inputSingle('fadcebook', 'FaceBook'); ?>
        <?php echo $builder->inputSingle('twitter', 'Twitter'); ?>
    </div>
    <?php echo $builder->gap(24); ?>
    <?php echo $builder->inputSingle('address', 'Address'); ?>
    <?php echo $builder->gap(24); ?>
    <div class="bd-grid-2">
        <?php echo $builder->inputSingle('fax', 'Business Fax'); ?>
        <?php echo $builder->inputSingle('stocksymbol', 'Stock Symbol'); ?>
    </div>
    <?php echo $builder->gap(50); ?>
    <?php echo $builder->btn_back_next('addListing-p1', 'addListing-p3'); ?>
    <?php echo $builder->gap(100); ?>
</div>

<!-- page 3 -->
<div id="newListing-page-3" class="bd-wrapper-normal ">
    <?php echo $builder->gap(50); ?>
    <?php echo $builder->backBtn(); ?>
    <?php echo $builder->gap(24); ?>
    <div class="bd-price-title">
        Create Listing
    </div>
    <div class="bd-wrapper-120">
        <?php echo $builder->progress_bar(3); ?>
    </div>

    <div class="bd-sub-title bd-text-align-start">
        current images
    </div>
    <?php echo $builder->gap(5) ?>
    <div class="bd-sub-title_light bd-text-align-start">
        There are no images attached to your listing.
    </div>
    <?php echo $builder->gap(24); ?>
    <div class="bd-sub-title bd-text-align-start">
        Upload Images
    </div>
    <div id="image-preview"></div>
    <div class="bd-sub-title_light bd-text-align-start">
        File size: 300 KB - 98 MB; Image width: 0px - 500px; Image height: 0px - 500px </div>
    <div id="drop-area">
        <p>Drag and drop images here <br> or</p>
        <input class="bd-btn-choseImg" type="file" name="images[]" id="images" multiple>
    </div>






    <?php echo $builder->gap(50); ?>
    <?php echo $builder->btn_back_next('addListing-p2', 'addListing-p4'); ?>
    <?php echo $builder->gap(100); ?>
</div>
<!-- page 4 -->
<div id="newListing-page-4" class="bd-wrapper-normal ">
    <?php echo $builder->gap(50); ?>
    <?php echo $builder->backBtn(); ?>
    <?php echo $builder->gap(24); ?>
    <div class="bd-price-title">
        Create Listing
    </div>
    <div class="bd-wrapper-120">
        <?php echo $builder->progress_bar(4); ?>
    </div>

    <div class="bd-sub-title bd-text-align-start">
        Add Attachment
    </div>
    <div id="image-preview"></div>
    <div class="bd-sub-title_light bd-text-align-start">
        Attachments limit: 1 (1 remaining); Max. upload size: 1,000.00 KB; Supported file extensions: PDF, PNG, JPG, GIF, RTF, TXT
    </div>
    <?php echo $builder->gap(24); ?>
    <div class="bd-input-file-single">
        <input name="Name" type="file">
        <button class="btn-primary bd-width-200 ">
            Upload
        </button>
    </div>
    <?php echo $builder->gap(24); ?>
    <?php echo $builder->inputSingle('fileDec', 'File Description'); ?>
    <?php echo $builder->gap(50); ?>
    <?php echo $builder->btn_back_next('addListing-p3-4', 'addListing-submit'); ?>
    <?php echo $builder->gap(100); ?>
</div>

<?php require base_path("views/partials/footer.php"); ?>