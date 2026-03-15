<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tags $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tags-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'tag')->textInput(['maxlength' => true, 'placeholder' => 'Enter tag name...']) ?>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save Tag', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
