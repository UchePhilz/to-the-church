<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ChurchGroups;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Writings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    p {
        margin-bottom: 2px
    }
</style>

<div class="writings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'church_group_id')->dropDownList(
        ArrayHelper::map(ChurchGroups::find()->all(), 'id', 'name'),
        ['prompt' => 'Select Church Group']
    ) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'status')->dropDownList([
                $model::STATUS_DRAFT => 'Draft',
                $model::STATUS_PUBLISHED => 'Published',
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'tag_list')->dropDownList(
                ArrayHelper::map(\app\models\Tags::find()->all(), 'tag', 'tag'),
                [
                    'multiple' => true,
                    'class' => 'form-control select2-tags',
                    'id' => 'writings-tag_list'
                ]
            ) ?>
        </div>
    </div>

    <?= $form->field($model, 'body')->hiddenInput(['id' => 'writings-body'])->label(false) ?>
    <div id="quill-editor" style="height: 400px;"><?= $model->body ?></div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
\app\assets\HtmlAsset::addHeaderStyleTagEx('https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css');
\app\assets\HtmlAsset::addFooterScriptTagEx('https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js');

$js = <<<JS
$(document).ready(function() {
   

    var quill = new Quill('#quill-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'script': 'sub'}, { 'script': 'super' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'direction': 'rtl' }],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'align': [] }],
                ['link', 'image', 'video'],
                ['clean']
            ],
            history: {
                delay: 2000,
                maxStack: 500,
                userOnly: true
            }
        }
    });

    // Update the hidden input before form submission
    $('form').on('submit', function() {
        $('#writings-body').val(quill.root.innerHTML);
    });
});
JS;
\app\assets\HtmlAsset::addFooterScript($js);
?>
