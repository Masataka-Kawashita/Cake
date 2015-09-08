<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Note
 *
 * @author kawashita
 */
class Note extends AppModel {
    //put your code here
    public $belongsTo =array('Task');
}
