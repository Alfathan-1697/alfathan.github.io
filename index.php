<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

?>

<!doctype html><html class="no-js" lang=""> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $tittle;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/plugins.css" />

        <link rel="stylesheet" href="assets/css/raleway-webfont.css" />
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
     
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Menu Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="index.php"><a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="" /></a></a></div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">

                        <?php
if($_SESSION["cstatus"]=="Administrator"){	
      echo"
	  <li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>
      <li ";if($mnu=="admin"){echo"class='active'";} echo"><a href='index.php?mnu=admin'>Admin</a></li>
	  <li ";if($mnu=="user"){echo"class='active'";} echo"><a href='index.php?mnu=user'>User</a></li>
	  <li ";if($mnu=="customer"){echo"class='active'";} echo"><a href='index.php?mnu=customer'>Customer</a></li>
	  <li ";if($mnu=="order"){echo"class='active'";} echo"><a href='index.php?mnu=order'>Order</a></li>
	  <li ";if($mnu=="pembayaran"){echo"class='active'";} echo"><a href='index.php?mnu=pembayaran'>Pembayaran</a></li>
      <li ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'>Logout</a></li>";
}

else if($_SESSION["cstatus"]=="User"){
      echo"
	  <li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>
	  <li ";if($mnu=="uprofil"){echo"class='active'";} echo"><a href='index.php?mnu=uprofil'>Profil</a></li>
	  <li ";if($mnu=="uorder"){echo"class='active'";} echo"><a href='index.php?mnu=uorder'>Order</a></li>
	  <li ";if($mnu=="utracking2"){echo"class='active'";} echo"><a href='index.php?mnu=utracking2'>Tracking</a></li>
      <li ";if($mnu=="logout"){echo"class='active'";} echo"><a href='index.php?mnu=logout'>Logout</a></li>";
}
else{
	 echo"<li ";if($mnu=="home"){echo"class='active'";} echo"><a href='index.php?mnu=home'>Home</a></li>";
	  echo"<li ";if($mnu=="lacak"){echo"class='active'";} echo"><a href='index.php?mnu=lacak'>Pelacakan</a></li>";
	 echo"<li ";if($mnu=="login"){echo"class='active'";} echo"><a href='index.php?mnu=login'>Login</a></li>";	 
	}
      ?>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <!--Home page style-->
        <header id="home" class="home">
        <?php if($mnu=="home" || $mnu==""){?>
            <div class="overlay-img">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="home-content">

                                <h5>PT.TRANS SUKMA MANDIRI</h5>
                                <h1>International & Domestic Freight Forwarders <span></span></h1>

                                <a target="_blank" href="#"><button class="btn btn-default btn-home">Download<span><i class="fa fa-download"></i></span></button></a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php }?>	
        </header>

        <!-- Sections -->
        <section id="about" class="sections">

            <div class="about-bg">
                <div class="container">
                <br>
                <br>
                <br>
<?php 
				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="user"){require_once"user/user.php";}
else if($mnu=="customer"){require_once"customer/customer.php";}
else if($mnu=="ucustomer"){require_once"customer/ucustomer.php";}
else if($mnu=="order"){require_once"order/order.php";}
else if($mnu=="order_detail"){require_once"order_detail/order_detail.php";}
else if($mnu=="tracking"){require_once"tracking/tracking.php";}
else if($mnu=="pembayaran"){require_once"pembayaran/pembayaran.php";}

//Profil User

else if($mnu=="uorder"){require_once"order/uorder.php";}
else if($mnu=="uorder_detail"){require_once"order_detail/uorder_detail.php";}
else if($mnu=="utracking"){require_once"tracking/utracking.php";}
else if($mnu=="utracking2"){require_once"tracking/utracking2.php";}


else if($mnu=="uprofil"){require_once"user/uprofil.php";}
else if($mnu=="uprofil2"){require_once"user/uprofil2.php";}

else if($mnu=="login"){require_once"login.php";}
else if($mnu=="logout"){require_once"logout.php";}
else if($mnu=="lacak"){require_once"lacak.php";}
else {require_once"home.php";}
				
 ?>                </div> <!-- /container -->   
            </div>

        </section>

    <!--Footer-->
    <?php if($mnu=="home" || $mnu==""){?>
    <footer id="footer" class="sections footer different-bg">

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-first-content">
                        <div class="logo"><img src="assets/images/footer-logo.png" alt="Company Logo" /></div>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore.</p>
                        <p>eugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta</p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-mid-content">
                        <h4>Recent Posts</h4>

                        <div class="post">
							<div class="post-item">
								<h6>March 30, 2014</h6>
								<a href="#">Duis autem vel eum iriure dolor</a>
							</div>
                        </div>

                        <div class="post">
							<div class="post-item">
								<h6>March 30, 2014</h6>
								<a href="#">Duis autem vel eum iriure dolor</a>
							</div>
                        </div>

                        <div class="post">
							<div class="post-item">
								<h6>March 30, 2014</h6>
								<a href="#">Duis autem vel eum iriure dolor</a>
							</div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-mid-content">
                        <h4>Twitter Feeds</h4>

                        <div class="post">
							<div class="post-item">
								<h6>March 30, 2014</h6>
								<a href="#">Good work buddy</a>
							</div>
                        </div>

                        <div class="post">
							<div class="post-item">
								<h6>March 30, 2014</h6>
								<a href="#">Good work buddy</a>
							</div>
                        </div>

                        <div class="post">
							<div class="post-item">
								<h6>March 30, 2014</h6>
								<a href="#">Good work buddy</a>
							</div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer-last-content">
                        <h4>Our Address</h4>
                        <p>Jl. Warakas 1 No.19 Tanjung Priok - Jakarta Utara </p>

                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>Jl. Warakas 1 No.19 Tanjung Priok - Jakarta Utara</p>
                            <p><i class="fa fa-phone"></i>(021) 4352008 / Fax (021) 43936484</p>
                            <p><i class="fa fa-envelope"></i>transsukmamandiri@yahoo.co.id</p>
                        </div>

                    </div>
                </div>

            </div>
			
		

        </div>

    </footer>
    <?php }?>
	
	<div class="scroll-top">
		
		<div class="scrollup">
			<i class="fa fa-angle-double-up"></i>
		</div>
			
	</div>
	
	<footer class="copyright-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="copyright text-center">
						<p>Made with <i class="fa fa-heart"></i> by <?php echo $footer;?> All rights reserved.</p>
					</div>
				</div>
			</div>
		</div>		
	</footer>

	<?php if($mnu=="home" || $mnu=="login" || $mnu==""|| $mnu=="ucustomer"){?>
    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <?php }?>
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    
    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/main.js"></script>
    
</body>
</html>

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"||$arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari"||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret"||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"||$arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"||$arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"||$arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}
function getUser($conn,$kode){
$field="nama_user";
$sql="SELECT `$field` FROM `tb_user` where `kode_user`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getCustomer($conn,$kode){
$field="nama_customer";
$sql="SELECT `$field` FROM `tb_customer` where `kode_customer`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getOrder($conn,$kode){
$field="kode_order";
$sql="SELECT `$field` FROM `tb_order` where `kode_order`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
?>