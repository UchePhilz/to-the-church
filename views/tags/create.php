<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tags $model */

$this->title = 'Create Tags';
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tags-create container-xl px-4 mt-4">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="card mb-4">
        <div class="card-header">Tag Details</div>
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
