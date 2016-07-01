<?php
namespace Home\Controller;
use Think\Controller;

use Think\Model;

/**
 * 文件操作，包括上传 和 下载
 */
class FileController extends Controller {
	
	
    public function index(){
       $this->display();   
    }
    
    
	//==================================kindEditor编辑器上传图片======================================================
	
	public function mangeUpload(){
		    $upload = new \Think\Upload();// 实例化上传类
		    $upload->maxSize   =     3145728 ;// 设置附件上传大小
		    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型  
		   // $upload->rootPath =  './Public/upload/';
			 $upload->savePath =  '';
		    //$upload->savePath  =     './editors/';
		    $info   =   $upload->upload(); 
			if(!$info) {// 上传错误提示错误信息   
				$this->error($upload->getError()); 
		    }else{// 上传成功 获取上传文件信息    
		    
		        //?????此处有待优化??????????
		        foreach($info as $file){
					$name=$file['savename'];
		        	$path=$file['savepath'].$name;
		        	       
				  }
				  $url=str_replace('./','/',$path);
				  
				  //-------本地上传--------		   
				  $data['error']=0;
				  $data['url']=__ROOT__.'/Uploads/'.$url;
				  
				  //--------sae上传-------			
				  // $preRoot='http://hszsj-uploads.stor.sinaapp.com/';
				  // //$preRoot=C('STORAGE');
				  // $data['error']=0;
				  // $data['url']=$preRoot.$url;
				  //$data['url']=$url;
				  
				  $this->ajaxReturn($data);

		    }
	}
	
	
	//===================================普通文件上传===========================================
	
	
	public function upload(){
		  // header('Content-Type:text/html; charset=utf-8');
		   $fileId=$_REQUEST['fileId'];
		  // $fileId='file1';
		   $upload = new \Think\Upload();// 实例化上传类
		   //$upload->maxSize = 3145728;// 设置附件上传大小 (3M是3145728)
	      //$upload->exts = array('jpg','gif','png','jpeg','doc','xls','ppt','txt');// 设置附件上传类型  
		  //$upload->rootPath =  './Public/upload/';
		   $upload->savePath =  '';
		  // $upload->savePath  =     './img/';
		   $info   =   $upload->uploadOne($_FILES[$fileId]);  
		   if(!$info) {// 上传错误提示错误信息 
		           $msg=$this->error($upload->getError());  
		     }else{// 上传成功 获取上传文件信息   
		           
		           $name = $info['name'];
				   $savename = $info['savename'];
		           $path= $info['savepath'].$savename;			   
		           //$path= $name;			   
				   $url=str_replace('./','/',$path);
				   
				  //-------本地上传--------		   
				  $data['name']=$name;
				  $data['url']=__ROOT__.'/Uploads/'.$url;
				  
				  //--------sae上传-------
				  // $preRoot='http://hszsj-uploads.stor.sinaapp.com/';
				  // //$preRoot=C('STORAGE');
				  // $data['name']=$name;
				  // $data['url']=$preRoot.$url;
				  // //$data['url']=$url;
				   
				  $this->ajaxReturn($data);
				  
		   }
		  
	}


    //===============================uploadify文件上传========================================

	public function uploadify() {
		$upload = new \Think\Upload();
		// 实例化上传类
		$upload -> maxSize = 0;
		// 设置附件上传大小
		//$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		// $upload->rootPath =  './Public/upload/';
		$upload -> savePath = '';
		//$upload->savePath  =     './editors/';
		$info = $upload -> upload();
		if (!$info) {// 上传错误提示错误信息
			$this -> error($upload -> getError());
		} else {// 上传成功 获取上传文件信息

			foreach ($info as $file) {
				$name = $file['name'];
				$savename = $file['savename'];
				$path = $file['savepath'] . $savename;

			}
			$url = str_replace('./', '/', $path);

			//-------本地上传--------
			$data['error'] = 0;
			$data['name'] = $name;
			$data['url'] = __ROOT__ . '/Uploads/' . $url;
			
			
			 //--------sae上传-------
				  // $preRoot='http://hszsj-uploads.stor.sinaapp.com/';
				  // //$preRoot=C('STORAGE');
				  // $data['name']=$name;
				  // $data['url']=$preRoot.$url;
				  // //$data['url']=$url;
			
			$this -> ajaxReturn($data);

		}
	}
	
	
    
}