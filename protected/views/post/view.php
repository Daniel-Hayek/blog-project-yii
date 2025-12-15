<?php
/* @var $this PostController */
/* @var $model Post */

$this->breadcrumbs=array(
	'Posts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Post', 'url'=>array('index')),
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Update Post', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Post', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>View Post #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'content',
		'author',
		'created_at',
		'updated_at',
	),
)); ?>

<h2>Comments</h2>

<?php if (!empty($model->comments)): ?>

    <?php foreach ($model->comments as $comment): ?>
        <div class="comment">
            <strong>
                <?php echo CHtml::encode($comment->user_name); ?>
            </strong>
            <em>
                (<?php echo CHtml::encode($comment->created_at); ?>)
            </em>

            <p>
                <?php echo nl2br(CHtml::encode($comment->comment_text)); ?>
            </p>
        </div>
        <hr>
    <?php endforeach; ?>

<?php else: ?>
    <p>No comments yet.</p>
<?php endif; ?>