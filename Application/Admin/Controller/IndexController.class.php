<?php
namespace Admin\Controller;
use Think\Controller;

use Think\Model;

class IndexController extends AdminController {
	
	
    public function index(){
       $this->display();   
    }
    
	
	public function main(){
		$object = M('News');
		$list = $object -> order('id desc')->limit(6)->select();
		$this->assign('list',$list);
		$this->display();
	}
    
    
}