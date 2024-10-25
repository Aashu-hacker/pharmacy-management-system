<!DOCTYPE html>
<html lang="en">
  <!-- [Head] start -->
  <head>
        <title>{{$titlee ?? 'PMS'}}</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="../assets/css/plugins/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" id="main-font-link">
        <link rel="stylesheet" href="../assets/fonts/phosphor/duotone/style.css">
        <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css">
        <link rel="stylesheet" href="../assets/fonts/feather.css">
        <link rel="stylesheet" href="../assets/fonts/fontawesome.css">
        <link rel="stylesheet" href="../assets/fonts/material.css">
        <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link">
        <link rel="stylesheet" href="../assets/css/style-preset.css">
    </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->
  <body>
    <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
@include('components.top-header');
@include('components.sidemenu');