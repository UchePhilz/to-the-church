<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ChurchGroups $model */

$this->title = 'Update Church Groups: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Church Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="church-groups-update container-xl px-4 mt-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card mb-4">
        <div class="card-header">Edit Church Group</div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
