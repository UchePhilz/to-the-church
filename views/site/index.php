<?php

/** @var yii\web\View $this */
/** @var app\models\Writings[] $writings */
/** @var yii\data\Pagination $pages */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\LinkPager;
use app\models\ChurchGroups;

$this->title = 'The wisdom of God the Church';
$this->params['meta_description'] = "To those that are seeking God in their heart, The Spirit of God will Guide you to the truth.";

$this->params['breadcrumbs'][] = "";
?>
<div class="site-writings">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-text" style="font-size: x-large;">
                        God has been very gracious to the world and to the Church.<br>
                        He has given us His Spirit so that we may be His able children in this world.<br>
                        <hr>
                        These writings are for:
                        <ul>
                            <li>Those who are seeking God in their heart.</li>
                            <li>Those who say they believe, yet are lost.</li>
                            <li>Those who are now confident.</li>
                        </ul>
                        <hr>
                        The Spirit of God will guide you to the truth, and you shall see yourself as you see Him.<br>
                    </div>
                </div>
                <?= Html::a('View Writings', ['site/writings'], ['class' => 'btn btn-outline-secondary mt-2']) ?>
            </div>
        </div>
    </div>


</div>
