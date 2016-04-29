<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Book Services',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
	
	$items[] = ['label' => 'Home', 'url' => ['/site/index']];
	$items[] = ['label' => 'Search', 'url' => ['/search/index']];
	$items[] = ['label' => 'Guide', 'items' => [
		['label' => 'API v1.0', 'url' => ['/v1/default/index']],
		//['label' => 'Sample API v1.0', 'url' => ['/v1/default/sample']],
	]];
	//$items[] = ['label' => 'About', 'url' => ['/site/about']];
	//$items[] = ['label' => 'Contact', 'url' => ['/site/contact']];
	if(Yii::$app->user->isGuest){
		$items[] = ['label' => 'Signup', 'url' => ['/site/signup']];	
		$items[] = ['label' => 'Login', 'url' => ['/site/login']];	
	}
	else{
		$items[] = ['label' => substr(Yii::$app->user->identity->username,0,10), 'items' => [
			['label' => 'Profile', 'url' => ['/site/profile']],
			[
			  'label' => 'Logout',
			  'url' => ['/site/logout'],
			  'linkOptions' => ['data-method' => 'post']
			],
		]];
	}
	
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
		'activateParents' => true,
        'items' => $items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
		<?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
