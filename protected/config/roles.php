<?php
return array(
    'roles' => array(
        'admin' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'admin',
            'children' => array('createPost', 'updatePost', 'deletePost', 'viewPost'),
        ),
        'editor' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'editor',
            'children' => array('createPost', 'updatePost', 'viewPost'),
        ),
    ),
    'operations' => array(
        'createPost' => array('type' => CAuthItem::TYPE_OPERATION),
        'updatePost' => array('type' => CAuthItem::TYPE_OPERATION),
        'deletePost' => array('type' => CAuthItem::TYPE_OPERATION),
        'viewPost'   => array('type' => CAuthItem::TYPE_OPERATION),
    ),
);
