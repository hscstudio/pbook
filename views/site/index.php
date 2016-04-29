<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Book Services';
?>
<div class="site-index panel panel">

    <div class="jumbotron">
        <h1>Book Services!</h1>

        <p class="lead">Book finder services, best and number one in the world.</p>
		
		<!--
        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
		-->
    </div>

    <div class="body-content">
		
		<?php $form = ActiveForm::begin([
			'id' => 'search-form',
			'action' => ['search/index'],
			//'method' => 'get',
			'options' => [
                'class' => 'form-horizontal',
            ],
		]); ?>
			<div class="row">    
				<div class="col-sm-6 col-sm-offset-3">
						<?= $form->field($model, 'title',[
							'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button class="btn btn-success" type="submit">Search!</button></span></div>',
						])->textInput([
							'autofocus' => true,
							'placeholder' => 'search book',
						])->label(false) ?>		
				</div>	
			</div>

		<?php ActiveForm::end(); ?>
        <div class="row">
            <div class="col-sm-3  col-sm-offset-3">
                <h2>Student</h2>

                <p>You can find your interested book here.</p>

                <p><?= Html::a('Find a book',['search/index'],['class'=>'btn btn-default']) ?></p>
            </div>
            <div class="col-sm-3 text-right">
                <h2>Developer</h2>

                <p>We provide API for database of books</p>

				<p><?= Html::a('API Documentation',['v1/default/index'],['class'=>'btn btn-default']) ?></p>
            </div>
        </div>

    </div>
</div>
