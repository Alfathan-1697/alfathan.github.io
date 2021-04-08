<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>
    
    <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('tracking/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>
<?php
$kode_order="";
if(isset($_POST["Lacak"])){
	$kode_order=$_POST["kode_order"];
}
?>

<div id="accordion">
  <h3>Pelcakan Pengiriman Barang</h3>
  <div>
<form action="" method="post" enctype="multipart/form-data">
<table width="46%" class="table table-striped table-bordered table-hover">

<tr>
<td height="24"><label for="waktu_order">Tulis Kode Order</label>
<td valign="top">:<td><input name="kode_order" type="text" id="kode_order" value="<?php echo $kode_order;?>" size="15" />
</td>
</tr>

<tr>
<td>
<td valign="top">
<td colspan="2"><input name="Lacak" type="submit" id="Lacak" value="Lacak" />
        <a href="?mnu=lacak"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

<?php

if(isset($_POST["Lacak"])){
	$kode_order=$_POST["kode_order"];
	$sqlb="select * from `$tborder` where `kode_order`='$kode_order'";
	$ada=getJum($conn,$sqlb);
	
	if($ada<1){
			echo"<h1>Maaf $kode_order Belum terdaftar</h1>";
	}
	else{
		$db=getField($conn,$sqlb);
				$kode_order=$db["kode_order"];
				$kode_customer=getCustomer($conn,$db["kode_customer"]);
				$tanggal_order=WKT($db["tanggal_order"]);
				$waktu_order=$db["waktu_order"];
				$alamat_pengiriman=$db["alamat_pengiriman"];
				$uraian=$db["uraian"];
				$status=$db["status"];
				$keterangan=$db["keterangan"];
				$harga=RP($db["harga"]);
				$surat_legal=$db["surat_legal"];
				$surat_legal0=$db["surat_legal"];
				if($uraian==""){$uraian="Registered";}
?>

<table width="46%" class="table table-striped table-bordered table-hover">
<tr>
<th width="136"><label for="kode_order">Kode Order</label>
<th width="10" valign="top">:
<th colspan="2"><b><?php echo $kode_order;?></b></tr>
<tr>
<td><label for="kode_customer">Customer</label>
<td valign="top">:<td width="242"><label for="kode_customer"></label>
  <b><?php echo $kode_customer;?></b></td>
<td width="102" rowspan="4">
<center>
<?php 
echo"<a href='#' onclick='buka(\"order/zoom.php?id=$kode_order\")'>
<img src='$YPATH/$surat_legal0' width='150' height='150' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="24"><label for="tanggal_order">Tanggal Order</label>
<td valign="top">:<td><b><?php echo $tanggal_order;?> <?php echo $waktu_order;?> WIB</b></td>
</tr>

<tr>
<td height="24"><label for="waktu_order">Harga</label>
<td valign="top">:<td><b><?php echo $harga;?></b></td>
</tr>

<tr>
<td height="24"><label for="alamat_pengiriman">Alamat Pengiriman</label>
<td valign="top">:<td><b><?php echo $alamat_pengiriman;?></b></td>
</tr>


<tr>
<td><label for="status">Status</label>
<td valign="top">:<td colspan="2"><b><?php echo $status;?></b></td></tr>

<tr>
<td><label for="uraian">Catatan Proses Pengiriman</label>
<td valign="top">:<td colspan="2"><b><?php echo $uraian;?></b></td></tr>

</table>
<hr>

  <?php  
  $sqlq="select distinct(kode_user) from `$tbtracking` where kode_order='$kode_order' order by `kode_order` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data Tracking belum tersedia...</h1>";
			}		
	else{			
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kode_user=$dq["kode_user"];

?>     
<h3>Data Tracking Status <?php echo getUser($conn,$kode_user);?></h3>
<div>
<br />
Data Tracking Status <?php echo getUser($conn,$kode_user);?>: 

<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="3%"><center>No</center></th>
    <th width="30%"><center>Nama Barang</center></th>
    <th width="40%"><center>Catatan Status Barang</center></th>
    <th width="10%"><center>Status</center></th>
  </tr>
<?php  
  $sql="select * from `$tbtracking` where kode_user='$kode_user' and kode_order='$kode_order' order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
			$no=1;
		$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id=$d["id"];
				$nama_barang=$d["nama_barang"];
				$spesifikasi=$d["spesifikasi"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$nama_barang</td>
				<td>$spesifikasi</td>
				<td>$status</td>
							</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data tracking belum tersedia...</blink></td></tr>";}
?>
</table>

</div>
<?php 
		}//for
}//ada
	}//ada
}//isset
?>
</div>

</body>