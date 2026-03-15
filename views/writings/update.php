<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Writings $model */

$this->title = 'Update Writings: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Writings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="writings-update container-xl px-4 mt-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card mb-4">
        <div class="card-header">Edit Writing</div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
