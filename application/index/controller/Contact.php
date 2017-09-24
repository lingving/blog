<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Validate;
use app\index\model\Comment;
class contact extends Controller 
{
    
    public function index()
    {
        return $this->fetch('contact');
    }
   
  
    //  public function index()
    // {
    //     return $this->fetch();
    // }
    


    public function addcomment(){
    	
        $comment = new comment;

        $data['name']=$_POST['name'];
        $data['email']=$_POST['email'];
        $data['subject']=$_POST['subject'];
    	$data['message']=$_POST['message'];	
        $data['time']=time();

        $validate = \think\Loader::validate('comment');
        
      
           if($validate->check($data)){
                $ret=$comment->save($data);
                if($ret){
                    return $this->success('添加足迹成功','contact');
                }else{
                    return $this->error('添加足迹失败');
                }
           }else{
                return $this->error($validate->getError());

           }
           return;
       


        // $ret=$comment->validate(true)->save($data);
       
        // if(false === $ret){
        //         // 验证失败 输出错误信息
        //     dump($ret->getError());
        //     }

       
        

        // if(true!==$ret){
        //     return $this->error($ret);
        // }
        // $res=$comment->save($data);
        // if($res){
        //     return $this->success('chonggong','index');

        // }else{
        //     return $comment->getError();
        // }
        

    			


    	   
    	  
    	}
    	//return $this->fetch();
}

	
