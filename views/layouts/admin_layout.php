<?php

/** @var yii\web\View $this */
/** @var string $content */

/** @var \app\models\Users $user */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);


$this->registerCsrfMetaTags();
$user = Yii::$app->user->identity;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>To The Church | <?= Html::encode($this->title) ?></title>
  <link href="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/css/styles.css" rel="stylesheet"/>
  <link rel="icon" type="image/x-icon" href="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/assets/img/favicon.png"/>
  <script data-search-pseudo-elements defer src="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/js/all.min.js"
          crossorigin="anonymous"></script>

  <meta name="csrf-token" content="<?= Yii::$app->request->csrfToken ?>">
  <script src="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/js/feather.min.js" crossorigin="anonymous"></script>
  <?php $this->head() ?>
  <?php \app\assets\HtmlAsset::getHeaderStyleTag(); ?>
  <?php \app\assets\HtmlAsset::getHeaderScriptTag(); ?>

</head>
<body class="nav-fixed">
<?php $this->beginBody() ?>
<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
     id="sidenavAccordion">
  <!-- Sidenav Toggle Button-->
  <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle">
    <i data-feather="menu"></i></button>
  <!-- Navbar Brand-->
  <!-- * * Tip * * You can use text or an image for your navbar brand.-->
  <!-- * * * * * * When using an image, we recommend the SVG format.-->
  <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
  <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="<?= Url::to(['/ai-agents-center'])?>">To The Church</a>
  <!-- Navbar Search Input-->

  <!-- Navbar Items-->
  <ul class="navbar-nav align-items-center ms-auto">

    <!-- User Dropdown-->
    <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
      <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
         href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false"><img class="img-fluid" src="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/assets/img/illustrations/profiles/profile-1.png"/></a>
      <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
           aria-labelledby="navbarDropdownUserImage">
        <h6 class="dropdown-header d-flex align-items-center">
          <img class="dropdown-user-img" src="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/assets/img/illustrations/profiles/profile-1.png"/>
          <div class="dropdown-user-details">
            <div class="dropdown-user-details-name"><?= $user->username ?></div>
            <div class="dropdown-user-details-email">@ <?= $user->email ?></div>
          </div>
        </h6>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="<?= Url::toRoute(['/site/logout'])?>">
          <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <?= $this->render('@app/views/layouts/partials/_side_nav',['user'=>$user]) ?>
  </div>
  <div id="layoutSidenav_content">

    <?= $this->render('@app/views/layouts/partials/_alert') ?>

    <?= $content ?>

    <footer class="footer-admin mt-auto footer-light">
      <div class="container-xl px-4">
        <div class="row">
          <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
          <div class="col-md-6 text-md-end small">
            <a href="#!">Privacy Policy</a>
            &middot;
            <a href="#!">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>
<script src="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/js/bootstrap.bundle.min.js"></script>
<script src="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/js/scripts.js"></script>
<script src="<?= Yii::getAlias('@web'); ?>/theme/sb-admin/js/toasts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js" crossorigin="anonymous"></script>

<?php $this->endBody() ?>
<?php \app\assets\HtmlAsset::getFooterTags(); ?>
<?php \app\assets\HtmlAsset::getFooterScriptTag(); ?>
</body>
</html>
<?php $this->endPage() ?>
