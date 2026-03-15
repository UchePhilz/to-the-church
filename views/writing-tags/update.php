<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WritingTags $model */

$this->title = 'Update Writing Tags: ' . $model->writing_id;
$this->params['breadcrumbs'][] = ['label' => 'Writing Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->writing_id, 'url' => ['view', 'writing_id' => $model->writing_id, 'tag_id' => $model->tag_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="writing-tags-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
