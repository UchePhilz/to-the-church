<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Writings $model */

$this->title = 'Create Writings';
$this->params['breadcrumbs'][] = ['label' => 'Writings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="writings-create container-xl px-4 mt-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card mb-4">
        <div class="card-header">Writing Details</div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
