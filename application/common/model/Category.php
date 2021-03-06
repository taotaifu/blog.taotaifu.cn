<?php

namespace app\common\model;

use Houdunwang\Arr\Arr;
use think\Model;

class Category extends Model
{
    protected $pk = 'cate_id';
    protected $table='blog_cate';

    //获取分类数据的树状结构
    public function getAll(){

        //return Arr::tree(db('cate')->order('cate_sort desc,cate_id')->select (), 'cate_name', $fieldPri = 'cate_id', $fieldPid = 'cate_pid');
		//动态调用
		return (new Arr())->tree (db('cate')->order('cate_sort desc,cate_id')->select (), 'cate_name', $fieldPri = 'cate_id', $fieldPid = 'cate_pid');
	}
    public function store($data){
         //1.执行验证
		// 调用当前模型对应的User验证器类进行数据验证
		$result = $this->validate(true)->save($data);
		//2.执行添加
		if(false === $result){
			// 验证失败 输出错误信息
			//dump($this->getError());
			return ['valid'=>0,'msg'=>$this->getError()];
		}else{
			return ['valid'=>1,'msg'=>'添加成功'];
		}

	}

	//处理所属分类

	public function getCateData($cate_id){
        //1.首先找到$cate_id的子级
		$cate_ids=$this->getSon(db ('cate')->select (),$cate_id);
		//halt ($cate_ids);
		//2.将自己追加进去
		$cate_ids[]=$cate_id;
		//dump ($cate_ids);
		//3.找到除了他们之外的数据
		$field=db ('cate')->whereNotIn ('cate_id',$cate_ids)->select ();
		//halt ($field);
		//return Arr::tree($field,'cate_name','cate_id','cate_pid');
		return (new Arr())->tree($field,'cate_name','cate_id','cate_pid');

	}

	//找子级
	public function getSon($data,$cate_id){
         static $temp=[];
         foreach ($data as $k=>$v){

         	if ($cate_id==$v['cate_pid']){
               $temp[]=$v['cate_id'];
               //利用递归
               $this->getSon ($data,$v['cate_id']);
			}
		 }

		 return $temp;

	}

	//编辑栏目

	public function edit($data){

           $result=$this->validate(true)->save ($data,[$this->pk=>$data['cate_id']]);
           if ($result){
                 //执行成功
			   return ['valid'=>1,'msg'=>'编辑成功'];
		   }else{
                //执行失败
			   return ['valid'=>0,'msg'=>$this->getError()];
		   }
	}

	//删除栏目

	public function del($cate_id)
	{
		//获取当前要删除数据的cate_id
		$cate_pid=$this->where ('cate_id',$cate_id)->value ('cate_pid');
		//halt ($cate_pid);
		//将当前要删除的$code_id的子集数据的pid修改成$cate_pid
		$this->where ('cate_pid',$cate_id)->update(['cate_pid'=>$cate_pid]);
		//执行当前数据的删除
		if (Category::destroy ($cate_id)){
			//删除成功提示
		      return ['valid'=>1,'msg'=>'删除成功'];
		}else{

			//删除失败提示
			return ['valid'=>0,'msg'=>'删除失败'];
		}

	}
}
