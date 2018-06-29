<?php
namespace app\index\controller;

class Index
{	
	public function index($name = 'zhangzhao')
	{
		return 'hello ' . $name;
	}
}
