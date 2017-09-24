<?php
namespace app\index\controller;
use think\Controller;

class Single extends Controller 
{
    public function index()
    {            
    	$a=$_GET['id'];//取到前页传过来的ID
    	//var_dump($a);

    	$artis= db('article')->where('id',$a)->find();
    	//var_dump($artis);

		$this->assign('artis',$artis);
        return $this->fetch('single');
    }
}
