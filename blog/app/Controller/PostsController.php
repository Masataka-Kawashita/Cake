<?php
class PostsController extends AppController{
	//public $scaffold;
	public $helpers = array('Html','Form');
	
	public  function index(){
		$this->set('posts',$this->Post->find('all'));
	}
	
	public function view($id=null){
		$this->Post->id =$id;
		$this->set('post',$this->Post->read());
	}
	
	public function add(){
		if($this->request->is('post')){
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('Success');
				$this->redirect(array('action'=>'index'));
			}else{
				$this->Session->setFlash('failed');
			}
		}
	}
	
	public function edit($id=null){
		$this->Post->id = $id;
		if($this->request->is('get')){
			$this->request->data = $this->Post->read();	
			
		}else{
			if($this->Post->save($this->request->data)){
				$this->Session->setFlash("succes");
				$this->redirect(array('action'=>'index'));
			}else{
				
				$this->Session->setFlash("failed");
			}
			
		}
			
	}
	
	public function delete($id){
		if($this->request->is('get')){
			throw new MethodNotAllowedException();			
		}
		/*if($this->request->is('ajax')){
			if($this->Post->delete($id)){
				$this->autoRender=false;
				$this->autoLayout=false;
				$response=array('id' => $id);
				$this->header('Content-Type:application/json');
				echo json_encode($response);
				exit();
			}
		}
		$this->redirect(array('action'=>'index'));*/
		    if ($this->Post->delete($id)) {
        $this->Session->setFlash(
            __('The post with id: %s has been deleted.', h($id))
        );
    } else {
        $this->Session->setFlash(
            __('The post with id: %s could not be deleted.', h($id))
        );
    }

    return $this->redirect(array('action' => 'index'));
	
	}
	
}