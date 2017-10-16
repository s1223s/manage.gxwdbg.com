<?php
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;
use app\admin\model\AdminMenuModel;

class StatisticsController extends AdminBaseController
{


		public function propertystatistics()
		{
			return view('propertystatistics');
		}
		public function tariffstatistics()
		{
			return view('tariffstatistics');
		}
		public function threestatistics()
		{
			return view('threestatistics');
		}
		public function waterstatistics()
		{
			return view('waterstatistics');
		}
		public function warehouse()
		{
			return view('warehouse');
		}
		public function publicmeter()
		{
			return view('publicmeter');
		}
		public function index()
		{
			return view('index');
		}
		public function instrument()
		{
			return view('instrument');
		}
			public function roominstrument()
		{
			return view('roominstrument');
		}
		public function roommeter()
		{
			return view('roommeter');
		}
		public function batchinput()
		{
			return view('batchinput');
		}
		public function readinginput()
		{
			return view('readinginput');
		}
		public function readingmeter()
		{
			return view('readingmeter');
		}
		 public function toll()
		{
        $where = ["user_type" => 0];
        /**搜索条件**/
        $user_type = $this->request->param('user_type');

        if ($user_type) {
            $where['user_type'] = ['like', "%$user_type%"];
        }

       
        $users = Db::name('owner')
            ->where($where)
            ->order("id DESC")
            ->paginate(10);
        // 获取分页显示
        $page = $users->render();

        /*$rolesSrc = Db::name('role')->select();
        $roles    = [];
        foreach ($rolesSrc as $r) 
			{
				$roleId           = $r['id'];
				$roles["$roleId"] = $r;
			}*/
			//echo "<pre>";print_r($users);echo "<pre>";
			$this->assign("page", $page);
			//$this->assign("roles", $roles);
			$this->assign("users", $users);
			return $this->fetch();
		}
		
      
}
?>














