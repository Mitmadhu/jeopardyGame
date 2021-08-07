<?php 
    if (!isset($_SESSION['username'])) {
      header('location: ./login');
    }
?>


<div class="top-bar" id="example-menu">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class=""><a href="/jeopardy">Jeopardy</a></li>
      <!-- <li>
        <a href="#">One</a>
        <ul class="menu vertical">
          <li><a href="#">One</a></li>
          <li><a href="#">Two</a></li>
          <li><a href="#">Three</a></li>
        </ul>
      </li> -->
      <li><a href="/jeopardy/profile">Profile</a></li>
      <li><a href="/jeopardy/contact">Contact us</a></li>
    </ul>
  </div>

  <div class="top-bar-right">
    <ul class="menu">
      <li><a href="/jeopardy/logout" class="button">Logout</a></li>
    </ul>
  </div>
</div>
<!-- 
<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="example-menu"></button>
  <div class="title-bar-title">Menu</div>
</div> -->