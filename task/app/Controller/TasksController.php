<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TasksController
 *
 * @author kawashita
 */
class TasksController extends AppController {
    //put your code here
    //public $scaffold;
    
    public function index(){
        $options =array(
            'conditions'=>array('Task.status'=>0)
        );
        
        $tasks_data = $this->Task->find('all',$options);
        $this->set('tasks_data', $tasks_data);
        
        $this->render('index');
    }
    
    public function done(){
        $id = $this->request->pass[0];
        $this->Task->id = $id;
        $this->Task->saveField('status',1);
        $msg =  sprintf('タスク%sを完了しました。',$id);
        
        $this->flash($msg,'/task/index');
    }
    
    public function  create(){
        if($this->request->is('post')){
           $data = array(
                'name' => $this->request->data['name'],
                'body' =>$this->request->data['body']
            );
            // データを登録
            $id = $this->Task->save($data);
            $msg = sprintf(
                'タスク %s を登録しました。',
                $this->Task->id
            );
            
            // メッセージを表示してリダイレクト
            $this->Session->setFlash($msg);
            $this->redirect('/tasks/index');
            return;            
        }
        $this->render('create');
    }
}
