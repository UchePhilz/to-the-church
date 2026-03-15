<?php

/** @var yii\web\View $this */
/** @var app\models\Writings[] $writings */
/** @var yii\data\Pagination $pages */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap5\LinkPager;
use app\models\ChurchGroups;

$this->title = 'The wisdom of God the Church';

$this->params['breadcrumbs'][] = "";
?>
<div class="site-writings">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-text" style="font-size: x-large;">
                        God has been very gracious to the world and to the church. <br>
                        He has given us His Spirit so we can be his able children in this world.<br>
                        <hr>
                        These writings are for:
                        <ul>
                            <li>Those that are seeking God in their heart.</li>
                            <li>Those that say they believe but are lost.</li>
                            <li>Those that are now confident.</li>
                        </ul>
                        <hr>
                        The Spirit of God will Guide you to the truth, and you shall see yourself as you see Him<br>
                    </div>
                </div>
                <?= Html::a('View Writings', ['site/writings'], ['class' => 'btn btn-outline-secondary mt-2']) ?>
            </div>
        </div>
    </div>


</div>
