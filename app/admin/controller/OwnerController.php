<?php
namespace app\admin\controller;

use cmf\controller\AdminBaseController;
use think\Db;
use app\admin\model\AdminMenuModel;

class OwnerController extends AdminBaseController
{


     public function add()
    {
    	$listObj = db('houses');
		$whereprovince['level'] = xq;
		$listprovince = $listObj->where($whereprovince)->select();
		//var_dump($listprovince);
		$this->assign("province_list",$listprovince);
        return $this->fetch();
    }
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
		$where['level'] = dy;
		$list = $listObj->where($where)->select();
		$data=array('status'=>0,'district'=>$list);
		header("Content-type: application/json");
		exit(json_encode($data));
	}
		public function get_roomid(){
		$listObj = db('houses');
		$where['parentid'] = input('district_id');
		$where['level'] = f;
		$list = $listObj->where($where)->select();
		$data=array('status'=>0,'room'=>$list);
		header("Content-type: application/json");
		exit(json_encode($data));
	}
	public function registration()
	{
			return view('registration');
	}
	public function parkingspace()
	{
			return view('parkingspace');
	}



	 public function addPost()
    {
    	$ownerid = $this->request->param("ownerid");
		$ownernumber = $this->request->param("ownernumber");
		$Roomno = $this->request->param("Roomno");
		$Address = $this->request->param("address");
		$phonenumber = $this->request->param("phonenumber");
		$landline = $this->request->param("landline");
		$phonename = $this->request->param("phonename");
		$Bankaccount = $this->request->param("Bankaccount");
		$ruhuodate = $this->request->param("ruhuodate");
		$Checkindate = $this->request->param("Checkindate");
		$project = $this->request->param("project");
		$trashfee = $this->request->param("trashfee");
		$area = $this->request->param("area");
		$Othertrashfeedate = $this->request->param("Othertrashfeedate");
		$Propertyfeedate = $this->request->param("Propertyfeedate");
		$Garbageclearancefee = $this->request->param("Garbageclearancefee");
		$Remarks = $this->request->param("Remarks");


	if(empty($ownerid) || empty($ownernumber) || empty($Roomno) || empty($ownernumber) || empty($phonenumber) || empty($phonename) || empty($Bankaccount)  || empty($project) || empty($trashfee) || empty($area) || empty($Othertrashfeedate) || empty($Propertyfeedate) || empty($Garbageclearancefee) || empty($Address) || empty($landline))
	    {
	    	//echo '未检测到用户名或密码';
            //header("Location:../view/login.html");
	    	echo "<script> alert('信息不全请重新填写'); </script>";
	    	return view('add');
            exit;
	    }

	   Db::name('owner')->insert([
                        "ownerid"  => $ownerid,
                        "ownernumber"   => $ownernumber,
                        "roomno"  => $Roomno,
						"address" => $Address,
                        "phonenumber" => $phonenumber,
						"landline" => $landline,
                        'name' => $phonename,
                        "bankaccount"  => $Bankaccount,
                        "ruhuodate"   => $ruhuodate,
                        "checkindate"  => $Checkindate,
                        "project" => $project,
                        'trashfee' => $trashfee,
                        "area"  => $area,
                        "othertrashfeedate"   => $Othertrashfeedate,
                        "propertyfeedate"  => $Propertyfeedate,
                        "garbageclearancefee" => $Garbageclearancefee,
                        'remarks' => $Remarks,
                    ]);
  	}
}
?>