<?php
class RegAction extends Action
{
	function index()
	{
		
	}
	function show_inwindow()
	{
		$this->display();
	}
	function RegDb()
	{
		$member = new MemberModel();
		if($member->create())
		{
			$member->save();
		}else {
			echo $member->getError();
		}
		
	}
}