<?php

/** @var yii\web\View $this */
/** @var app\models\Writings[] $writings */
/** @var yii\data\Pagination $pages */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\LinkPager;
use app\models\ChurchGroups;

$this->title = 'Writings';
if (Yii::$app->request->get('church_group_id')) {
    $group = ChurchGroups::findOne(Yii::$app->request->get('church_group_id'));
    if ($group) {
        $this->title = 'Writings by ' . $group->name;
    }
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-writings">
    <div class="row">
        <?php foreach ($writings as $writing): ?>
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title"><?= Html::encode($writing->title) ?></h2>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?= Html::encode($writing->churchGroup->name) ?> on <?= date('F j, Y', strtotime($writing->created_at)) ?>
                        </h6>
                        <div class="card-text">
                            <?= \yii\helpers\StringHelper::truncateWords(strip_tags($writing->body), 50) ?>
                        </div>
                        <?= Html::a('Read More', ['site/view-writing?'. 'title='. urlencode($writing->title)], ['class' => 'btn btn-outline-secondary mt-2']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="pagination-wrapper mt-4">
        <?= LinkPager::widget([
            'pagination' => $pages,
            'options' => ['class' => 'pagination justify-content-center'],
        ]) ?>
    </div>

    <?php if (empty($writings)): ?>
        <p>No writings found.</p>
        <?php if (Yii::$app->request->get('church_group_id')): ?>
            <p><?= Html::a('View All Writings', ['site/writings'], ['class' => 'btn btn-outline-primary']) ?></p>
        <?php endif; ?>
    <?php endif; ?>
</div>
