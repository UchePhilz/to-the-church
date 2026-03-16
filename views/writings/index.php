<?php

use app\models\Writings;
use app\models\ChurchGroups;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap5\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\search\WritingsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Writings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="writings-index container-xl px-4 mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Html::a('<i class="me-1" data-feather="plus"></i> Create Writing', ['create'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="accordion mb-4" id="accordionSearch">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSearch">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
                    <i class="me-2" data-feather="search"></i> Search & Filters
                </button>
            </h2>
            <div id="collapseSearch" class="accordion-collapse collapse" aria-labelledby="headingSearch" data-bs-parent="#accordionSearch">
                <div class="accordion-body">
                    <?= $this->render('_search', ['model' => $searchModel]); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php $models = $dataProvider->getModels(); ?>
        <?php if (!empty($models)): ?>
            <?php foreach ($models as $index => $model): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-start-lg border-start-primary">
                        <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
                            <div class="text-xs fw-bold text-primary text-uppercase">
                                <?= Html::encode($model->churchGroup->name ?? 'N/A') ?>
                                <span class="ms-2 badge <?= $model->status === $model::STATUS_PUBLISHED ? 'bg-success' : 'bg-warning text-dark' ?>">
                                    <?= ucfirst(Html::encode($model->status)) ?>
                                </span>
                            </div>
                            <div class="dropdown no-caret">
                                <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton<?= $model->id ?>" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="more-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownMenuButton<?= $model->id ?>">
                                    <?= Html::a('<div class="dropdown-item-icon"><i data-feather="eye"></i></div> View', ['view', 'id' => $model->id], ['class' => 'dropdown-item']) ?>
                                    <?= Html::a('<div class="dropdown-item-icon"><i data-feather="edit"></i></div> Update', ['update', 'id' => $model->id], ['class' => 'dropdown-item']) ?>
                                    <?= Html::a('<div class="dropdown-item-icon"><i data-feather="trash-2"></i></div> Delete', ['delete', 'id' => $model->id], [
                                        'class' => 'dropdown-item',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-primary"><?= Html::encode($model->title) ?></h4>
                            <div class="mb-3">
                                <?php foreach ($model->tags as $tag): ?>
                                    <span class="badge bg-primary-soft text-primary me-1"><?= Html::encode($tag->tag) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <p class="card-text text-muted small">
                                <?= \yii\helpers\StringHelper::truncate(strip_tags($model->body), 150) ?>
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 small text-muted d-flex justify-content-between">
                            <span><i class="me-1" data-feather="calendar"></i> <?= Yii::$app->formatter->asDate($model->created_at) ?></span>
                            <span><i class="me-1" data-feather="clock"></i> <?= Yii::$app->formatter->asTime($model->created_at, 'short') ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center p-5">
                <div class="text-muted h4 mb-3">No writings found.</div>
                <?= Html::a('<i class="me-1" data-feather="plus"></i> Create Writing', ['create'], ['class' => 'btn btn-primary']) ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="card mb-4">
        <div class="card-body p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <?= $dataProvider->getCount() > 0 ? 'Showing ' . ($dataProvider->pagination->offset + 1) . '-' . ($dataProvider->pagination->offset + $dataProvider->getCount()) . ' of ' . $dataProvider->getTotalCount() . ' items.' : '' ?>
                </div>
                <div>
                    <?= LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                        'options' => ['class' => 'pagination pagination-sm mb-0'],
                        'linkContainerOptions' => ['class' => 'page-item'],
                        'linkOptions' => ['class' => 'page-link'],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
