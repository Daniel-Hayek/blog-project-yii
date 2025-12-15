<?php

class m251215_103520_create_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('users', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'role' => 'string NOT NULL',
        ));
	}

	public function down()
	{
		$this->dropTable('users');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}