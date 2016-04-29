<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BookSearch */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Book Searches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-search-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('&laquo; Back', ['index'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'author',
            'publisher',
            'city',
            'year',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
