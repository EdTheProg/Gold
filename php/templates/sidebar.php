<?php
require 'View/sidebar_functions.php';


?>
<script src="./assets/jquery.js"></script>
<style type="text/css">
  #sidebar {
    position: fixed;

    left: 0;
    width: 50px;
    height: 100vh;
    transition: left 0.3s;
    overflow-x: scroll;
  }

  /* Hide scrollbar for Chrome, Safari and Opera */
  #sidebar::-webkit-scrollbar {
    display: none;
  }

  /* Hide scrollbar for IE, Edge and Firefox */
  #sidebar {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
  }

  #sidebar.active {
    left: 0;
    width: 250px;
  }

  #content {
    padding: 20px;
    margin-left: 50px;
    

    transition: margin 0.3s;
  }

  #content.active {
    margin-left: 250px;
  }

  /* Additional styles for the sidebar header (optional) */
  .sidebar-header {
    text-align: center;
    padding-bottom: 1rem;
  }

  /* Additional styles for the sidebar links (optional) */
  #sidebar ul.components li a {
    color: white;
  }

  #sidebar ul.components li a:hover {
    background-color: #444;
  }

  span.navigation-text {
    display: inline-block !important;
  }

  span.navigation-text:not(.active) {
    display: none !important;
  }

  .subli2 {
    display: none;
  }

  .subli2.active {
    display: block;
  }

  #sidebar-head.active {
    display: block;
  }

  #sidebar-head {
    display: none;
  }


  .three-level-list li ul {
    margin-left: 10px;
    list-style: none;
  }

  .three-level-list li ul li {
    margin-left: 20px;
  }
</style>

<div class="wrapper">
  <!-- Sidebar -->
  <nav id="sidebar" class="active" style=" background-color: #231f20!important">
 
    <div class="container logout" style="height: 80%">
      <a href="Dashboard"><img src="assets/logo/logo.png" alt="" class="" style="max-width: 200px" /></a>
      <ul>
      <?php
        echo newSangla();
        echo Patubo();
        echo Redeem();
      ?>
      </ul>
    </div>
    <div class="container logout " style="height: auto;">
      <ul>
        <?php
        echo logout();
      ?>
      </ul>
    </div>
  </nav>
  <!-- Page content -->