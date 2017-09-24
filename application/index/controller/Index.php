<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller 
{
    public function index()
    {
    	
    	$arts=\think\Db::name('article')->paginate(3);
    	$this->assign('arts',$arts);
        
        return $this->fetch();
    }
}
