<?php
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;
use app\admin\model\AdminMenuModel;

class EquipmentController extends AdminBaseController
{

		public function get_citys(){
		$listObj = db('houses');
		$where['topparentid'] = input('province_id');
		$where['level'] = d;
		$list = $listObj->where($where)->select();
		$data=array('status'=>0,'city'=>$list);
		header("Content-type: application/json");
		exit(json_encode($data));
	}
	//获取地级县
	public function get_district(){
		$listObj = db('houses');
		$where['parentid'] = input('city_id');
		$where['level'] = y;
		$list = $listObj->where($where)->select();
		$data=array('status'=>0,'district'=>$list);
		header("Content-type: application/json");
		exit(json_encode($data));
	}
	public function building()
			{
				$listObj = db('houses');
		$whereprovince['level'] = x;
		$listprovince = $listObj->where($whereprovince)->select();
		//var_dump($listprovince);
		$this->assign("province_list",$listprovince);
        return $this->fetch();
			}
	public function parking()
			{
				return view('parking');
			}
	public function houseing()
			{
				return view('houseing');
			}
	public function warranty()
			{
				return view('warranty');
			}
	public function addbuilding()
			{	
				
				$district = $this->request->param("province_id");
				$dong = $this->request->param("city_id");
				$unit = $this->request->param("district_id");
				$roomno = $this->request->param("Roomno");
				$area = $this->request->param("Area");
				$remarks = $this->request->param("Remarks");
				$houseid = $unit.'f'.$roomno;
				

				if(empty($district) || empty($dong) || empty($unit) || empty($roomno) || empty($area))
		    {
		    	//echo '未检测到用户名或密码';
	            //header("Location:../view/login.html");
		    	echo "<script> alert('信息不全请重新填写'); </script>";
		    	return view('building');
	            exit;
		    }

		   Db::name('houses')->insert([
		   					"houseid" => $houseid,
		   					"level" => 'f',
		   					"parentid" => $unit,
		   					"topparentid" => $district,
		   					"Area" => $area,
		   					"Roomno" => $roomno,
	                        "District"  => "华益小区",
	                                         
	                    ]);
		   echo "<script> alert('添加成功！'); </script>";
		    	return view('building');
	  	
			}
	  
}
?>