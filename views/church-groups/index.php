<?php

use app\models\ChurchGroups;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\ChurchGroupsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Church Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="church-groups-index container-xl px-4 mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= Html::a('<i class="me-1" data-feather="plus"></i> Create Church Group', ['create'], ['class' => 'btn btn-primary']) ?>
    </div>

    <div class="card card-header-actions mb-4">
        <div class="card-header">
            Church Groups List
        </div>
        <div class="card-body p-0">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-hover mb-0'],
                'layout' => "{items}\n<div class='p-3'>{summary}{pager}</div>",
                'columns' => [

                    'name',
                    'url_tag',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, ChurchGroups $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>
