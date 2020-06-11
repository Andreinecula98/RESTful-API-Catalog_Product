<?php

session_start();
$con=mysqli_connect('localhost','root','catalog_product',"");
$msg='';

if(isset($_POST['submit'])){
   
   $time=time()-30;
	$ip_address=getIpAddr();
	$check_login_row=mysqli_fetch_assoc(mysqli_query($con,"select count(*) as total_count from login_log where try_time>$time and ip_address='$ip_address'"));
	$total_count=$check_login_row['total_count'];
   
   if($total_count==3){
      
      $msg="To many failed login attempts. Please login after 30 sec";
   
   }else{
      
      $username=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$sql="select * from user where username='$username' and  password='$password'";
		$res=mysqli_query($con,$sql);
      
      if(mysqli_num_rows($res)){
         
         $_SESSION['IS_LOGIN']='yes';
			mysqli_query($con,"delete from login_log where ip_address='$ip_address'");
         
?>

<?php
		}else{
			$total_count++;
			$rem_attm=3-$total_count;
			if($rem_attm==0){
				$msg="To many failed login attempts. Please login after 30 sec";
			}else{
				$msg="Please enter valid login details.<br/>$rem_attm attempts remaining";
			}
			$try_time=time();
			mysqli_query($con,"insert into login_log(ip_address,try_time) values('$ip_address','$try_time')");
			
		}
	}
}

function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
       $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
       $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
       $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
   return $ipAddr;
}
?>