<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tags $model */

$this->title = 'Tag: ' . $model->tag;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tags-view container-xl px-4 mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><?= Html::encode($this->title) ?></h1>
        <div>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">Tag Details</div>
        <div class="card-body p-0">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-hover mb-0'],
                'attributes' => [
                    'id',
                    'tag',
                ],
            ]) ?>
        </div>
    </div>

</div>
