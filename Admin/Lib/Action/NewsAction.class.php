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
            $this->success("添加成功");
        }  else {
            dump($news);
        }
    }
}