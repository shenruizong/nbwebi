<?php
class RegAction extends Action
{
	function index()
	{
		$this->display();
	}
	function show_inwindow()
	{
		$this->display();
	}
	function RegDb()
	{
		echo "abc";
		$member = new MemberModel();
		if($member->create())
		{
			$member->save();
			$this->success("成功");
		}else {
			echo $member->getError();
		}
	}
}