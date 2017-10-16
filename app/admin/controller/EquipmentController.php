<?php
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;
use app\admin\model\AdminMenuModel;

class EquipmentController extends AdminBaseController
{

	public function building()
			{
				return view('building');
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
				$district = $this->request->param("District");
				$dong = $this->request->param("Dong");
				$unit = $this->request->param("Unit");
				$roomno = $this->request->param("Roomno");
				$area = $this->request->param("Area");
				$remarks = $this->request->param("Remarks");
				$houseid = '0'.$dong.$unit.$roomno;
			

				if(empty($district) || empty($dong) || empty($unit) || empty($roomno) || empty($area))
		    {
		    	//echo '未检测到用户名或密码';
	            //header("Location:../view/login.html");
		    	echo "<script> alert('信息不全请重新填写'); </script>";
		    	return view('building');
	            exit;
		    }

		   Db::name('houses')->insert([
	                        "District"  => $district,
	                        "Dong"   => $dong,
	                        "Unit"  => $unit,
							"Roomno" => $roomno,
	                        "Area" => $area,
							"Remarks" => $remarks,
							"houseid" => $houseid                   
	                    ]);
		   echo "<script> alert('添加成功！'); </script>";
		    	return view('building');
	  	
			}
	  
}
?>