<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-profile">
	<h1><?= Html::encode($this->title) ?></h1>

    <p>
	<table class="table table-striped table-bordered">
	<tr>
		<td>Name</td>
		<td><?= Yii::$app->user->identity->username; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?= Yii::$app->user->identity->email; ?></td>
	</tr>
	<tr>
		<td>API Key</td>
		<td><code><?= Yii::$app->user->identity->auth_key; ?></code></td>
	</tr>
	</table>
	</p>
</div>
