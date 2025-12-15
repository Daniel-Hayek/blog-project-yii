<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>
    <?php if(Yii::app()->user->isGuest): ?>
        <?php echo CHtml::link('Login', array('site/login')); ?> |
        <?php echo CHtml::link('Register', array('site/register')); ?>
    <?php else: ?>
        Hello, <?php echo CHtml::encode(Yii::app()->user->name); ?> |
        <?php echo CHtml::link('Logout', array('site/logout')); ?>
    <?php endif; ?>
</p>

<p>This is my personal blog, where I post my thoughts and allow others to read them!</p>

<p>Here you may see all the posts, or create some of your own!</p>

<a href="http://localhost/blog-project-yii/index.php?r=post/index">Check out my Posts!</a>

<?php if(!Yii::app()->user->isGuest): ?>
    <br><br><br>
    <p>
        Current role: <b><?php echo CHtml::encode(Yii::app()->user->role); ?></b>
    </p>

    <?php echo CHtml::link(
        'Toggle Role',
        array('site/toggleRole'),
        array('class'=>'btn btn-primary')
    ); ?>
<?php endif; ?>
