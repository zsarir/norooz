<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php require 'colorpallete.php';  ?>
  <style>
    <?php require __DIR__ . '/styles/index.css'; ?>
  </style>


</head>

<body>
  <?php require 'navbar.php';  ?>
  <div class="bd-filter-listing">
    <input class="bd-filter-listing_input" type="text" placeholder="Find a Listing">
    <div class="bd-icon-container">
      <svg class="bd-filter-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 21v-7m0-4V3m8 18v-9m0-4V3m8 18v-5m0-4V3M1 14h6m2-6h6m2 8h6" />
      </svg>
      <svg class="bd-search-icon" xmlns="http://www.w3.org/2000/svg" width="65" height="56" fill="none" viewBox="0 0 65 56">
        <rect width="65" height="56" fill="#569AF6" rx="4" />
        <rect width="64" height="55" x=".5" y=".5" stroke="#3F4B5B" stroke-opacity=".2" rx="3.5" />
        <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 35a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm-10 2 4.35-4.35" />
      </svg>

    </div>
  </div>
</body>

</html>