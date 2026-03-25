<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Writings $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Writings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="writings-view container-xl px-4 mt-4">

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
        <div class="card-header">Writing Details</div>
        <div class="card-body p-0">
            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'table table-hover mb-0'],
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'church_group_id',
                        'value' => $model->churchGroup->name ?? 'N/A',
                    ],
                    'title',
                    'url_tag',
                    [
                        'attribute' => 'tag_list',
                        'value' => function($model) {
                            $tags = $model->tags;
                            if (empty($tags)) return 'No tags';
                            $badges = [];
                            foreach ($tags as $tag) {
                                $badges[] = Html::tag('span', Html::encode($tag->tag), ['class' => 'badge bg-primary me-1']);
                            }
                            return implode('', $badges);
                        },
                        'format' => 'raw',
                    ],
                    'published',
                    'body:raw',
                    'created_at:datetime',
                ],
            ]) ?>
        </div>
    </div>

</div>
