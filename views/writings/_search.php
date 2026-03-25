<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ChurchGroups;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\search\WritingsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="writings-search mb-0">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'church_group_id')->dropDownList(
                ArrayHelper::map(ChurchGroups::find()->all(), 'id', 'name'),
                ['prompt' => 'Select Church Group']
            ) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList([
                $model::STATUS_DRAFT => 'Draft',
                $model::STATUS_PUBLISHED => 'Published',
            ], ['prompt' => 'Select Status']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'title') ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'url_tag') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'body') ?>
        </div>
    </div>

    <div class="form-group mb-0 mt-2">
        <?= Html::submitButton('<i class="me-1" data-feather="search"></i> Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="me-1" data-feather="refresh-cw"></i> Reset', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
