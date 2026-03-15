<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\models\ChurchGroups;
use yii\bootstrap5\Offcanvas;

AppAsset::register($this);
$this->registerCssFile('@web/css/scroll-layout.css');

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?> | <?= Yii::$app->name ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 public-scroll-page">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark public-navbar fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Writings', 'url' => ['/site/writings']],
            [
                'label' => 'Church Groups', 
                'url' => '#', 
                'linkOptions' => [
                    'data-bs-toggle' => 'offcanvas', 
                    'data-bs-target' => '#offcanvasGroups'
                ]
            ],
            ['label' => 'About', 'url' => ['/site/about']],
#            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest
                ? ['label' => 'Login', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main" style="padding-top: 60px;">
    <div class="scroll-container">
        <div class="scroll-header">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
        </div>
        
        <div class="scroll-content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        
        <div class="scroll-footer">
            <p>&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        </div>
    </div>
</main>

<footer id="footer" class="mt-auto py-3">
    <div class="container text-center">
        <span class="text-white-50">To The Church</span>
    </div>
</footer>

<button class="floating-groups-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasGroups" aria-controls="offcanvasGroups" title="View Church Groups">
    <i class="bi bi-people-fill"></i>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
    </svg>
</button>

<?php
$groups = ChurchGroups::find()->orderBy(['name' => SORT_ASC])->all();
Offcanvas::begin([
    'id' => 'offcanvasGroups',
    'title' => 'Church Groups',
    'placement' => 'end',
    'options' => ['class' => 'offcanvas-scroll'],
]);
?>
<div class="list-group">
    <?php foreach ($groups as $group): ?>
        <a href="<?= \yii\helpers\Url::to(['site/writings', 'church_group_id' => $group->id]) ?>" class="list-group-item list-group-item-action">
            <strong><?= Html::encode($group->name) ?></strong>
            <br>
            <small class="text-muted"><?= count($group->writings) ?> writings</small>
        </a>
    <?php endforeach; ?>
</div>
<?php Offcanvas::end(); ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
