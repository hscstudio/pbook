<?php

use yii\bootstrap\Html;
use yii\helpers\Url;
?>
<div class="v1-default-index">
    <h1>Guide v1.0</h1>
    <p>
        Manual API web service restful version 1.0 for developer.
    </p>
	<h2>List of API</h2>
    <p>
        <table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>DESCRIPTION</th>
			<th>URL API</th>
			<th>METHOD</th>
			<th>KEY REQUIRED</th>
			<th>SAMPLE OUTPUT</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Show all of the books</td>
			<td><?= Html::a('/v1/book/index',['/v1/book/index']) ?></a></td>
			<td>GET</td>
			<td>No</td>
		</tr>
		<tr>
			<td>2</td>
			<td>Show all of the books</td>
			<td><?= Html::a('/v1/book/list',['/v1/book/list']) ?></a></td>
			<td>GET</td>
			<td>Yes</td>
			<td>
				<code>
					{"message":"update success","result":{"id":1,"title":"Membangun Aplikasi Profesional Berbasis Web Menggunakan Yii Framework","author":"Hafid Mukhlasin","publisher":"Self Publishing","city":"Jakarta","year":2016,"status":1,"created_at":1461313437,"updated_at":1461965839}}
				</code>
			</td>
		</tr>
		<tr>
			<td>3</td>
			<td>Show one of the book record</td>
			<td><?= Html::a('/v1/book/view?id=1',['/v1/book/view','id'=>1]) ?></a></td>
			<td>GET</td>
			<td>Yes</td>
			<td>
				<code>
					{"message":"found","result":{"id":1,"title":"Membangun Aplikasi Profesional Berbasis Web Menggunakan Yii Framework","author":"Hafid Mukhlasin","publisher":"Self Publishing","city":"Jakarta","year":2016,"status":1,"created_at":1461313437,"updated_at":1461965839}}
				</code>
			</td>
		</tr>
		<tr>
			<td>4</td>
			<td>Update a book record</td>
			<td><?= Html::a('/v1/book/update?id=1',['/v1/book/update','id'=>1]) ?></a></td>
			<td>PUT</td>
			<td>Yes</td>
			<td>
				<code>
					{"message":"update success","result":{"id":1,"title":"Membangun Aplikasi Profesional Berbasis Web Menggunakan Yii Framework","author":"Hafid Mukhlasin","publisher":"Self Publishing","city":"Jakarta","year":2016,"status":1,"created_at":1461313437,"updated_at":1461965839}}
				</code>
			</td>
		</tr>
		<tr>
			<td>5</td>
			<td>Delete a book record</td>
			<td><?= Html::a('/v1/book/delete?id=1',['/v1/book/delete','id'=>1]) ?></a></td>
			<td>DELETE</td>
			<td>Yes</td>
			<td>
				<code>
					{"message":"delete success","result":[]}
				</code>
			</td>
		</tr>
		<tr>
			<td>6</td>
			<td>Create a book record</td>
			<td><?= Html::a('/v1/book/create',['/v1/book/create']) ?></a></td>
			<td>POST</td>
			<td>Yes</td>
			<td>
				<code>
					{"message":"create success","result":{"id":4,"title":"PHP Basic","author":"Fuad","publisher":"Andi Ofset","city":null,"year":2016,"status":1,"created_at":1461966360,"updated_at":1461966360}}
				</code>
			</td>
		</tr>
		</table>
    </p>
	<h2>Usage</h2>
	<p>
		If the API require a key, so we should add URL API with key as token
	</p>
	<p>
		<code><?= Url::to(['/v1/book/list','key'=>'YOUR_API_KEY'],true) ?></code>
	</p>
	<p>
		Other way, we can insert token in header of the request instead of in URL
	</p>
	<p>
		Example request in shell<br>
		<code>
			curl --request GET \<br>
			&nbsp;&nbsp;--url '<?= Url::to(['/v1/book/list'],true) ?>' \<br>
			&nbsp;&nbsp;--header 'key: your-api-key'<br>
		</code>
	</p>
	<p>
		Or we can tested it with tools Postman		
		<h3> Add Token </h3>
		<?= Html::img(['../images/postman.png'],['class'=>'img-thumbnail img-rounded']) ?>
	</p>
	<p>
		
		Sample<br>
		<h3> 1. Index </h3>
		<?= Html::img(['../images/index.png'],['class'=>'img-thumbnail img-rounded']) ?>
		<h3> 2. List </h3>
		<?= Html::img(['../images/list.png'],['class'=>'img-thumbnail img-rounded']) ?>
		<h3> 3. View </h3>
		<?= Html::img(['../images/view.png'],['class'=>'img-thumbnail img-rounded']) ?>
		<h3> 4. Update </h3>
		<?= Html::img(['../images/update.png'],['class'=>'img-thumbnail img-rounded']) ?>
		<h3> 5. Delete </h3>
		<?= Html::img(['../images/delete.png'],['class'=>'img-thumbnail img-rounded']) ?>
		<h3> 6. Create </h3>
		<?= Html::img(['../images/create.png'],['class'=>'img-thumbnail img-rounded']) ?>
	</p>
	<h2>API Key</h2>
	<p>
		For get API key : <?= Html::a('click here',['/site/profile']) ?> (login required)
	</p>
</div>
