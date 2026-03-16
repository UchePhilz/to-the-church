<?php

/** @var yii\web\View $this */
/** @var app\models\Writings $model */

use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Writings', 'url' => ['writings']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['meta_description'] = \yii\helpers\StringHelper::truncateWords(strip_tags($model->body), 50);
\yii\web\YiiAsset::register($this);
?>
<style>
    p {
        margin-bottom: 2px
    }
</style>

<div class="site-view-writing">
    <div class="writing-header mb-4">
        <p class="text-muted">
            <strong><?= Html::encode($model->churchGroup->name) ?></strong>
            on <?= date('F j, Y', strtotime($model->created_at)) ?>
        </p>

        <?php if (!empty($model->tags)): ?>
            <div class="tags mb-3">
                <?php foreach ($model->tags as $tag): ?>
                    <span class="badge bg-secondary"><?= Html::encode($tag->tag) ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="writing-body">
        <?= nl2br($model->body) ?>
    </div>

    <hr>

    <div class="navigation mt-4">
        <?= Html::a('&larr; Back to Writings', ['writings'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>
</div>
