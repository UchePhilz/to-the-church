<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\WritingTags $model */

$this->title = 'Create Writing Tags';
$this->params['breadcrumbs'][] = ['label' => 'Writing Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="writing-tags-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
