<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>coffee shop</title>

    <!-- font awesome cdn link  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
    <!-- header section starts  -->

    <header class="header">
      <a href="index.php" class="logo">
        <img src="assets/images/logo.png" alt="logo-img" />
      </a>

      <nav class="navbar">
        <a href="index.php">home</a>
        <a href="#about">about</a>
        <a href="#menu">menu</a>
        <a href="#products">products</a>
        <a href="#review">review</a>
        <a href="#contact">contact</a>
        <a href="#blogs">blogs</a>
        <?php 
          if (!isset($_SESSION['role'])) :

        ?>
        <a href="singup.php">singup</a>
        <a href="login.php">login</a>
        <?php else: ?>
        <a href="logout.php">logout</a>
        <?php endif; ?>
      </nav>

      <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
      </div>

      <div class="search-form">
        <input type="search" id="search-box" placeholder="search here..." />
        <label for="search-box" class="fas fa-search"></label>
      </div>

      <div class="cart-items-container">
        <div class="cart-item">
          <span class="fas fa-times"></span>
          <img src="assets/images/cart-item-1.png" alt="" />
          <div class="content">
            <h3>cart item 01</h3>
            <div class="price">$15.99/-</div>
          </div>
        </div>
        <div class="cart-item">
          <span class="fas fa-times"></span>
          <img src="assets/images/cart-item-2.png" alt="" />
          <div class="content">
            <h3>cart item 02</h3>
            <div class="price">$15.99/-</div>
          </div>
        </div>
        <div class="cart-item">
          <span class="fas fa-times"></span>
          <img src="assets/images/cart-item-3.png" alt="" />
          <div class="content">
            <h3>cart item 03</h3>
            <div class="price">$15.99/-</div>
          </div>
        </div>
        <div class="cart-item">
          <span class="fas fa-times"></span>
          <img src="assets/images/cart-item-4.png" alt="" />
          <div class="content">
            <h3>cart item 04</h3>
            <div class="price">$15.99/-</div>
          </div>
        </div>
        <a href="#" class="btn">checkout now</a>
      </div>
    </header>

    <!-- header section ends -->
