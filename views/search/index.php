<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Book Searches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-search-index">

    <h1><?= Html::encode($this->title) ?></h1>

	
    <p>
        <?php $form = ActiveForm::begin([
			'id' => 'search-form',
			//'method' => 'get',
		]); ?>
			<div class="row">    
				<div class="col-md-6">
						<?= $form->field($model, 'title',[
							//'template' => '{label} <div>{input}{error}{hint}</div>',
							'inputTemplate' => '
								<div class="input-group">{input}
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Search!</button>
									</span>
								</div>',
						])->textInput([
							'autofocus' => true,
							'placeholder' => 'search book',
						])->label(false) ?>		
				</div>	
			</div>

		<?php ActiveForm::end(); ?>
    </p>
	
	<?php Pjax::begin(['id'=>'pjax']); ?>    
		<?= ListView::widget([
			'options' => ['class' => 'list-group'],
			'dataProvider' => $dataProvider,
			'itemOptions' => ['class' => 'list-group-item'],
			'itemView' => function ($model, $key, $index, $widget) {
				return Html::a(Html::encode($model->title.' ('.$model->author.', '.$model->year.')'), ['view', 'id' => $model->id]);
			},
		]) ?>
	<?php Pjax::end(); ?>

</div>
