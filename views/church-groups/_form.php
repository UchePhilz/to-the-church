<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ChurchGroups $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="church-groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Enter group name...']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'url_tag')->textInput([
                'maxlength' => true, 
                'placeholder' => 'Enter URL tag...',
                'onkeyup' => "this.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9\-]/g, '');"
            ]) ?>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save Group', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
