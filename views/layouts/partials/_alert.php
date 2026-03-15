<?php
?>
<div style="position: fixed; top: 1rem; right: 1rem; z-index: 1050;">
  <?php if (Yii::$app->session->hasFlash('success')): ?>

    <div class="toast mt-2" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white">
        <strong class="me-auto">Success</strong>
        <small class="text-white-50">just now</small>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <?= Yii::$app->session->getFlash('success') ?>
      </div>
    </div>
  <?php endif; ?>

  <!-- display error message -->
  <?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="toast mt-2" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
        <strong class="me-auto">Error</strong>
        <small class="text-white-50">just now</small>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        <?= Yii::$app->session->getFlash('error') ?>
      </div>
    </div>
  <?php endif; ?>
</div>
