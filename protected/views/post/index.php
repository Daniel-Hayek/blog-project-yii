<?php
/* @var $this PostController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Posts',
);

$this->menu=array(
	array('label'=>'Create Post', 'url'=>array('create')),
	array('label'=>'Manage Post', 'url'=>array('admin')),
);
?>

<h1>Posts</h1>

<div class="search-form">
<?php $form = $this->beginWidget('CActiveForm', array(
    'method' => 'get',
    'action' => array('post/index'),
)); ?>

    <div>
        <?php echo $form->label($model, 'title'); ?>
        <?php echo $form->textField($model, 'title'); ?>
    </div>

    <div>
        <?php echo $form->label($model, 'author'); ?>
        <?php echo $form->textField($model, 'author'); ?>
    </div>

    <div>
        <?php echo CHtml::submitButton('Search'); ?>
        <?php echo CHtml::link('Reset', array('post/index')); ?>
    </div>

<?php $this->endWidget(); ?>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
