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

<div id="comment-list">
    <?php if (!empty($model->comments)): ?>
        <?php foreach ($model->comments as $existingComment): ?>
            <?php $this->renderPartial('_comment', array(
                'comment' => $existingComment,
            )); ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No comments yet.</p>
    <?php endif; ?>
</div>

<h3>Add a Comment</h3>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'comment-form',
    'action' => array('post/createComment', 'postId' => $model->id),
    'method' => 'post',
	)); ?>

    <div>
        <?php echo $form->label($comment, 'user_name'); ?>
        <?php echo $form->textField($comment, 'user_name'); ?>
        <?php echo $form->error($comment, 'user_name'); ?>
    </div>

    <div>
        <?php echo $form->label($comment, 'comment_text'); ?>
        <?php echo $form->textArea($comment, 'comment_text'); ?>
        <?php echo $form->error($comment, 'comment_text'); ?>
    </div>

    <div>
        <?php echo CHtml::ajaxSubmitButton(
			'Submit Comment',
			array('post/createComment', 'postId' => $model->id),
			array(
				'type' => 'POST',
				'success' => 'function(html) {
					$("#comment-list").append(html);
					$("#comment-form")[0].reset();
				}'
			)
		); ?>
    </div>

<?php $this->endWidget(); ?>