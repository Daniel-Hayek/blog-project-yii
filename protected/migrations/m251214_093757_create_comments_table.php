<?php

class m251214_093757_create_comments_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('comments', array(
			'id' => 'pk',
			'post_id' => 'int NOT NULL',
			'comment_text' => 'text NOT NULL',
			'user_name' => 'varchar(255) NOT NULL',
			'created_at' => 'datetime NOT NULL',
		));

		$this->addForeignKey(
			'fk_comment_post',
			'comments',
			'post_id',
			'posts',
			'id',
			'CASCADE',
			'CASCADE'
		);
	}

	public function down()
	{
		$this->dropForeignKey('fk_comment_post', 'comments');
    	$this->dropTable('comments');
	}
}