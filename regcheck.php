<?php
    header("content-type:text/html;charset=utf-8");
		$user = $_POST["user"];
		$psw = $_POST["password"];
		$s_province = $_POST["s_province"];
		$s_city = $_POST["s_city"];
		$s_county = $_POST["s_county"];
		$Address = $_POST["DetailedAddress"];
		$BankCard = $_POST["BankCard"];
		$name = $_POST["OpenAnAccount"];
		$idcard = $_POST["inputID"];
		$phone = $_POST["passwordepeat"];
		 $time=date('Y-m-d H:i:s',time());
		if($user == "" || $psw == "" || $s_province == "" || $s_city == "" || $s_county == "" || $Address == "" || $BankCard == "" || $name == "" || $idcard == "" || $phone == "")
		{
			echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";
		}
		else
		{
			
				mysql_connect("43.254.53.186:3307","puxun","puxun2015");	//连接数据库
				mysql_select_db("xhangxian");	//选择数据库
				mysql_query("set names utf8");	//设定字符集
				$sql = "select user from user where user = '$_POST[user]'";	//SQL语句
				$result = mysql_query($sql);	//执行SQL语句
				$num = mysql_num_rows($result);	//统计执行结果影响的行数
				if($num)	//如果已经存在该用户
				{
					echo "<script>alert('用户名已存在'); history.go(-1);</script>";
				}
				else	//不存在当前注册用户名称
				{

					$mall_id='100001';
					$appkey='xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
					$url='http://121.41.42.121:8080/v3/card4-server?';

					$idcard=strtolower($idcard);
					$tm=time().'000';
					$md5_param=$mall_id.$name.$BankCard.$tm.$appkey;
					$sign=md5($md5_param);

					$param=http_build_query(array('mall_id'=>$mall_id,'realname'=>$name,'cardnum'=>$BankCard,'idcard'=>$idcard,'bankPreMobile'=>$phone,'tm'=>$tm,'sign'=>$sign));
					$url.=$param;
					$result=json_decode(file_get_contents($url));
					$status=intval($result->status);
					$code=intval($result->data->code);


						if($status==2001){
								//2001=正常服务
								
								if($code==1000){
									//一致
									$sql_insert = "insert into user (user,password,province,city,region,address,name,bank,idcard,phone,time) values('$user','$psw','$s_province','$s_city','$s_county','$Address','$name','$BankCard','$idcard','$phone','$time')";
									$res_insert = mysql_query($sql_insert);
									//$num_insert = mysql_num_rows($res_insert);
									if($res_insert)
									{
										echo "<script>alert('注册成功！');self.location='register3.html';</script>";
									}
									else
									{
										echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
									}
									
								}else if($code==1001){
									//不一致
									echo "<script>alert('银行卡认证失败，注册不成功！'); history.go(-1);</script>";	
								}else if($code==1002){
									//库中无此号
									echo "<script>alert('查不到银行卡，注册不成功！'); history.go(-1);</script>";	
								}
								
										
							}
						else{
							//2005=参数异常
							echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
						}
	

					
				}
		
		}

?>