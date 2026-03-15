<?php
?>

<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-md navbar-dark public-navbar fixed-top']
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ms-auto'],
    'items' => [
        ['label' => 'Home', 'url' => ['/site/index']],
        [
            'label' => 'Writings',
            'url' => '#',
            'linkOptions' => [
                'data-bs-toggle' => 'offcanvas',
                'data-bs-target' => '#offcanvasGroups'
            ]
        ],
        ['label' => 'About', 'url' => ['/site/about']],
#            ['label' => 'Contact', 'url' => ['/site/contact']],

    ]
]);
NavBar::end();
?>
