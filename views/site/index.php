<?php

/** @var yii\web\View $this */
/** @var app\models\Writings[] $writings */
/** @var yii\data\Pagination $pages */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\LinkPager;
use app\models\ChurchGroups;

$this->title = 'Writings';

$this->params['breadcrumbs'][] = "";
?>
<div class="site-writings">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Title</h2>
                    <h6 class="card-subtitle mb-2 text-muted">
                        Something
                    </h6>
                    <div class="card-text">
                        something something
                    </div>
                </div>
                <?= Html::a('View Writings', ['site/writing'], ['class' => 'btn btn-outline-secondary mt-2']) ?>
            </div>
        </div>
    </div>


</div>
