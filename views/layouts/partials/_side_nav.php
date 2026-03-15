<?php

use app\models\User;
use yii\helpers\Url;

/** @var User $user */


?>

<nav class="sidenav shadow-right sidenav-light">
  <div class="sidenav-menu">
    <div class="nav accordion" id="accordionSidenav">
      <!-- Sidenav Menu Heading (Account)-->

        <!-- Sidenav Accordion (Dashboard)-->
        <div class="sidenav-menu-heading">App</div>

        <a class="nav-link" href="<?= Url::toRoute(['/church-groups']); ?>">
          <div class="nav-link-icon"><i data-feather="users"></i></div>
          Church Groups
        </a>

        <a class="nav-link" href="<?= Url::toRoute(['/tags']); ?>">
          <div class="nav-link-icon"><i data-feather="tag"></i></div>
          Tags
        </a>

        <a class="nav-link" href="<?= Url::toRoute(['/writings']); ?>">
          <div class="nav-link-icon"><i data-feather="book-open"></i></div>
          Writings
        </a>


    </div>
  </div>
  <!-- Sidenav Footer-->
  <div class="sidenav-footer">
    <div class="sidenav-footer-content">
      <div class="sidenav-footer-subtitle">Logged in as: <?= $user->username ?></div>
      <div class="sidenav-footer-title">@ <?= $user->email ?></div>
    </div>
  </div>
</nav>
