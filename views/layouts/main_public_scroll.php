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
    <?= $this->render('@app/views/layouts/partials/_public_nav') ?>


</header>

<main id="main" class="flex-shrink-0" role="main" style="padding-top: 60px;">
    <div class="scroll-container">
        <div class="scroll-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="scroll-content">
            <?= $content ?>
        </div>
        
        <div class="scroll-footer">
            <p>&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        </div>
    </div>
</main>

<?= $this->render('@app/views/layouts/partials/_public_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
