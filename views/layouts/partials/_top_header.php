<?php

use yii\helpers\Url; ?>

<header class="header">
  <button type="button" class="d-xl-none icon me-2 ms-n2.5 sidebar-toggle">
    <svg width="15" height="12" fill="none" class="pe-none" viewBox="0 0 16 13">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M1 1h14M1 6.25h9.546M1 11.5h14"/>
    </svg>
    <span class="visually-hidden">Open Sidebar</span></button>
  <a class="d-noe d-sm-block logo" href="<?= Url::toRoute(['/site/index']); ?>">To The Church</a> <i class="ms-auto"></i>

  <ul class="header-menu ms-6 ms-xl-10">

    <li class="d-sm-block dropdown">
      <button type="button" class="ph ph-palette" data-bs-toggle="dropdown" data-bs-display="static"
              data-bs-auto-close="outside" aria-expanded="false">
        <span class="visually-hidden">Theme Switch</span>
      </button>
      <div class="dropdown-menu header-dropdown-menu">
        <div class="align-items-center d-flex flex-shrink-0 h-11 px-4">
          <div class="fw-medium text-body-emphasis">Theme Switch</div>
          <div class="d-flex gap-px me-n2 ms-auto">
            <button type="button" class="icon ph ph-arrow-counter-clockwise"><span class="visually-hidden">Reset</span>
            </button>
          </div>
        </div>
        <div class="flex-grow-1 mx-n2 pt-2 px-2" data-simplebar>
          <div id="top-themes" class="d-flex flex-column gap-3 pb-4 px-4"></div>
        </div>
      </div>
    </li>
    <li class="dropdown">
      <button type="button" class="h-11 me-n0.5 p-2 rounded w-11" data-bs-toggle="dropdown" aria-expanded="false">
        <!-- <img class="h-8 rounded" src="<?= Yii::getAlias('@web'); ?>/theme/assets/1.e810f372.jpg"> -->
        <i class="ph ph-user-circle"></i>
      </button>
      <div class="dropdown-menu">
       <!-- <a href="<?= Url::toRoute(['/settings']); ?>" class="dropdown-item">
          <i class="ph ph-user-circle"></i> Settings
        </a>-->
        <a href="<?= Url::toRoute(['/site/terms-and-conditions', 'title' => 'Privacy Policy']); ?>"
           class="dropdown-item">
          <i class="ph ph-currency-circle-dollar"></i> Privacy Policy
        </a>
        <a href="<?= Url::toRoute(['/site/terms-and-conditions', 'title' => 'Terms And Conditions']); ?>"
           class="dropdown-item">
          <i class="ph ph-gear"></i> Terms & Condition
        </a>
        <a href="<?= Url::toRoute(['/site/logout']); ?>" class="dropdown-item">
          <i class="ph ph-sign-out"></i> Logout
        </a>
      </div>
    </li>

  </ul>
</header>

<div class="content-header" style="z-index: 0;">
  <h2 class="fs-6 m-0 ps-3 text-body-emphasis"><?= $this->title ?></h2>

  <nav aria-label="breadcrumb" class="d-none d-sm-flex ms-6">
    <?php if (!empty($this->params['breadcrumbs'])): ?>
      <?= \yii\bootstrap5\Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
    <?php endif ?>
  </nav>
  <i class="ms-auto"></i>

  <div class="align-items-center d-flex gap-1 ms-3">
    <a class="icon ph ph-arrow-arc-left" href="javascript:void(0);" onclick="history.back()"></a>
  </div>

</div>

<?php if (Yii::$app->session->hasFlash('success')): ?>

  <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" style="opacity: 1; position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1055;">
    <div class="toast-header text-success">
      <i class="me-2" data-feather="alert-octagon"></i>
      <strong class="me-auto">Success</strong>
      <small class="text-muted ms-2">just now</small>
      <button class="ms-2 mb-1 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body"><?= Yii::$app->session->getFlash('success') ?></div>
  </div>
<?php endif; ?>

<!-- display error message -->
<?php if (Yii::$app->session->hasFlash('error')): ?>
  <div class="toast fade show text-bg-secondary" role="alert" aria-live="assertive" aria-atomic="true" style="opacity: 1; position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1055;">
    <div class="toast-header text-danger">
      <i class="me-2" data-feather="alert-octagon"></i>
      <strong class="me-auto">Error</strong>
      <small class="text-muted ms-2">just now</small>
      <button class="ms-2 mb-1 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body"><?= Yii::$app->session->getFlash('error') ?></div>
  </div>
<?php endif; ?>
