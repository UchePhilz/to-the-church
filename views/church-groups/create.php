<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ChurchGroups $model */

$this->title = 'Create Church Groups';
$this->params['breadcrumbs'][] = ['label' => 'Church Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="church-groups-create container-xl px-4 mt-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card mb-4">
        <div class="card-header">Church Group Details</div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
