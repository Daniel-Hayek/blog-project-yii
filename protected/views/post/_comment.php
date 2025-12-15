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
    <hr>
</div>