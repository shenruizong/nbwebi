<?php

class NewsAction extends Action
{
	function Index()
	{
		$newsdb = new Model("news");
		$news = $newsdb->select();
		$this->assign("list",$news);
		$this->display();
	}
	function Add()
	{
		$type = M("newstype");
		$list = $type->select();
		$this->assign("list",$list);
		$this->display();
	}
	function AddDb()
	{
		$news = new NewsModel();
		$news->create();
		if($news->add())
		{
			$this->success("添加成功","__URL__");
		}  else {
			$this->error($news->getError());
		}
	}
	function Del()
	{
		$id = $_GET['id'];
		if($id)
		{
			$type = M("newstype");
			$list = $type->select();
			$this->assign("list",$list);
			$news = new NewsModel();
			$result = $news->where("id = '".$id."'")->delete();
			if($result)
			{
				$this->success("删除成功");
			}else {
				$this->error($news->getError());
			}
		}else 
		{
			$this->error("操作错误","__APP__");
		}
	}
	function edit()
	{
		$id = $_GET['id'];
		if($id)
		{
			$news = new NewsModel();
			$typeDb = new Model("newstype");
			$list = $news->where("id='".$id."'")->find();
			$type = $typeDb->select();
			$this->assign("type",$type);
			$this->assign("list",$list);
			$this->display();
		}else
		{
			$this->error("操作错误","__APP__");
		}
	}
	function editDb()
	{
		$news = new NewsModel();
		$news->create();
		$result = $news->save();
		if($result)
		{
			$this->success("保存成功");
		}else
		{
			$this->error("保存失败。".$news->getError());
		}
	}
}