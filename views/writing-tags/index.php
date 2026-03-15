<?php

use app\models\WritingTags;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\WritingTagsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Writing Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="writing-tags-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Writing Tags', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'writing_id',
            'tag_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, WritingTags $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'writing_id' => $model->writing_id, 'tag_id' => $model->tag_id]);
                 }
            ],
        ],
    ]); ?>


</div>
