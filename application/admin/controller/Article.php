<?php
namespace app\admin\controller;
use think\Controller;
class Article extends Controller 
{
    public function lst()
    {
    	$arts=\think\Db::name('article')->paginate(3);
    	$this->assign('arts',$arts);
      return $this->fetch();
    }

    public function add()
    {
    	if(request()->isPost()){
    		$data=[
    			'title'=>input('title'),
    			'keywords'=>input('keywords'),
    			'desc'=>input('desc'),
    			'content'=>input('content'),
          'time'=>time(),
   			];
   			if($_FILES['pic']['tmp_name']){//判断图片的上传
               $file = request()->file('pic');
    
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                if($info){
                    // 成功上传后 获取上传信息
                   $data['pic']='/static/uploads/'.date('Ymd').'/'.$info->getfilename();
                   //拼装的调用路径
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                   //echo $info->getSaveName();die;
                   
                }else{
                    // 上传失败获取错误信息
                    return $this->error($file->getError());
                }
           }

           $validate= \think\Loader::validate('Article');
           if($validate->check($data)){
           		$db=\think\Db::name('article')->insert($data);
           		if($db){
           			return $this->success('添加作品成功','lst');
           		}else{
           			return $this->error('添加作品失败');
           		}
           }else{
           		return $this->error($validate->getError());

           }
           return;

    	}
    	return $this->fetch();

    }
    public function edit()
    {
    	if(request()->isPost()){
    		$data=[
    			'title'=>input('title'),
    			'keywords'=>input('keywords'),
    			'desc'=>input('desc'),
    			'content'=>input('content'),
                'time'=>time(),
   			];
   			if($_FILES['pic']['tmp_name']){//判断图片的上传
               $file = request()->file('pic');
    
                // 移动到框架应用根目录/public/uploads/ 目录下
                $info = $file->move(ROOT_PATH . 'public' . DS . '/static/uploads');
                if($info){
                    // 成功上传后 获取上传信息
                   $data['pic']='/static/uploads/'.date('Ymd').'/'.$info->getfilename();
                   //拼装的调用路径
                    // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                   //echo $info->getSaveName();die;
                   
                }else{
                    // 上传失败获取错误信息
                    return $this->error($file->getError());
                }
           }

           $validate= \think\Loader::validate('Article');
           if($validate->check($data)){
           		$db=\think\Db::name('article')->insert($data);
           		if($db){
           			return $this->success('修改作品成功','lst');
           		}else{
           			return $this->error('修改作品失败');
           		}
           }else{
           		return $this->error($validate->getError());

           }
           return;

    	}
    	$id=input('id');
    	$artis=db('article')->where('id',$id)->find();
    	$this->assign('artis',$artis);

    	return $this->fetch();

    }
    public function del(){
    	if(db('article')->delete(input('id'))){
    		return $this->success('删除作品成功','lst');

    	}else{
    		return $this->error('删除作品失败');
    	}

    }
}
