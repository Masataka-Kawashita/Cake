<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task
 *
 * @author kawashita
 */
class Task extends AppModel {
    public  $hasMany =array('Note');


    public $validate = array(
        'name' => array(
            'rule' => array('maxLength',60),
            'required' => true,
            'allowEmpty' => false,
            'message' => 'タスク名を入力してください'
        ),
        'body' => array(
            'rule' => array('maxLength',255),
            'required' => true,
            'allowEmpty' => false,
            'message' => '詳細を入力してください'
        ),
    );
}
