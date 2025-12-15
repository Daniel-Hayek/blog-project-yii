<?php

class RegisterForm extends CFormModel {
    public $username;
    public $password;
    public $password_repeat;

    public function rules() {
        return array(
            array('username, password, password_repeat', 'required'),
            array('password', 'compare', 'compareAttribute'=>'password_repeat'),
            array('username', 'unique', 'className'=>'User', 'attributeName'=>'username'),
        );
    }
}

