<?php
function combotgl($awal, $akhir, $var, $terpilih){
  echo "<select name=$var>";
  for ($i=$awal; $i<=$akhir; $i++){
    $lebar=strlen($i);
    switch($lebar){
      case 1:
      {
        $g="0".$i;
        break;     
      }
      case 2:
      {
        $g=$i;
        break;     
      }      
    }  
    if ($i==$terpilih)
      echo "<option value=$g selected>$i</option>";
    else
      echo "<option value=$g>$i</option>";
  }
  echo "</select> ";
}

function combobln($awal, $akhir, $var, $terpilih){
  echo "<select name=$var>";
  for ($bln=$awal; $bln<=$akhir; $bln++){
    $lebar=strlen($bln);
    switch($lebar){
      case 1:
      {
        $b="0".$bln;
        break;     
      }
      case 2:
      {
        $b=$bln;
        break;     
      }      
    }  
      if ($bln==$terpilih)
         echo "<option value=$b selected>$b</option>";
      else
        echo "<option value=$b>$b</option>";
  }
  echo "</select> ";
}

function combothn($awal, $akhir, $var){
  echo "<select name=$var>";
  for ($i=$awal; $i<=$akhir; $i++){
      echo "<option value=$i>$i</option>";
  }
      echo "</select> ";
}

function combonamabln($awal, $akhir, $var, $terpilih){
  $nama_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei", 
                      "Juni", "Juli", "Agustus", "September", 
                      "Oktober", "November", "Desember");
  echo "<select name=$var>";
  for ($bln=$awal; $bln<=$akhir; $bln++){
      if ($bln==$terpilih)
         echo "<option value=$bln selected>$nama_bln[$bln]</option>";
      else
        echo "<option value=$bln>$nama_bln[$bln]</option>";
  }
  echo "</select> ";
}

?>
<script src="assets/files/js/files.upload.min.js"></script>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>?app=guru&act=aksi">
	<div id="app_header">
		<div class="warp_app_header">
			<div class="app_title">Tambah guru / pengajar baru</div>
			<div class="app_link">
				<button type="submit" class="btn btn-success" title="Simpan" value="Next" name="sbaru"><i class="icon-ok"></i> Simpan</button>				
				<button type="submit" class="btn btn-metis-2" title="Simpan dan keluar" value="Next" name="skeluar"><i class="icon-ok-sign"></i> Simpan dan keluar</button>	
				<a class="danger btn btn-default" href="?app=guru" title="Batal"><i class="icon-remove-sign"></i> Batal</a>
			</div>
		</div>			 
	</div>
    <script> 
    $(document).ready(function(){	
	$(".cb-enable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-disable',parent).removeClass('selected');
		$(this).addClass('selected');
	});
	$(".cb-disable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-enable',parent).removeClass('selected');
		$(this).addClass('selected');
	});	
		
	// username checker
	
});
</script>
<script type="text/javascript">
	function cek_uname(uname){
        $('#pesan').html("sedang mengecek...");	
        var username  = uname; 
            if(username=='') {
                $("#pesan").html("<span style='color: red'><i class='icon-remove-sign'></i> Jangan kosong...</span>");	
            } else {
                    $.ajax({
                     type:"POST",
                     url:"apps/app_guru/controller/cekable.php",    
                     data: "username=" + username,
                     success: function(response){                 
                            if(response==1){
                                    $('#uname').val("").focus();
                                    $("#pesan").html("<span style='color: red'><i class='icon-remove-sign'></i> Username <b>"+username+"</b> sudah ada. Coba yang lain !</span>");	
                            } 
                            else {
                                    $("#pesan").html("<span class='icon-ok'></span> "+username+" OK");   
                       }
                    }
                    }); 				
            }
        }
	function cek_email(email){
        $('#pesanemail').html("sedang mengecek...");	
        var demail  = email; 
		$.ajax({
		 type:"POST",
		 url:"apps/app_guru/controller/cekable.php",    
		 data: "email=" + demail,
		 success: function(response){                 
			if(response==1){
				$('#email').val("").focus();
				$("#pesanemail").html("<span style='color: red'><i class='icon-remove-sign'></i> <b>"+demail+"</b> sudah terdaftar. Coba yang lain !</span>");	
			} 
			else {
				$("#pesanemail").html("<span class='icon-ok'></span> "+demail+" OK");   
		   }
		}
		}); 				
	}
</script>
<div class=" box-left">
	<div class="box">								
		<header class="dark">
			<h5>Data Informasi Guru</h5>
		</header>								
		<div>
			<table>
				<tr>
                                    <td class="row-title"><span class="tips" title="NIP" width="40%">NIP</td>
                                    <td>
                                    <input type="text" id="nip" name="nip" style="width: 100%" required class='form-control'/>
                                    </td>
				</tr>
				<tr>
                                    <td class="row-title"><span class="tips" title="Nama guru">Nama Lengkap</td>
                                    <td>
                                        <input type="text" name="nama" style="width: 100%" required></td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" title="Nama guru">Alamat Lengkap</td>
                                    <td>
                                        <textarea name="alamat" style="width: 100%" required ></textarea></td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" title="Tempat lahir">Tempat Lahir</td>
                                    <td>
                                        <input type="text" name="tlahir" style="width: 100%" required></td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" title="Pilih tanggal - bulan - masukan tahun">Tanggal Lahir</td>
                                    <td>
                                        <?php
                                        $tgl_Skrg = date("d");
                                        $bln_skrg = date("m");
                                        $thn_skrg = date("Y");
                                        combotgl(1,31,'tgl',$tgl_skrg);
                                        combonamabln(1,12,'bln',$bln_skrg);
                                        ?>
                                        <input type="text" name="thn" min="4" maxlength="4" size="9" placeholder="Contoh 1990">
                                        <p style="margin-top: 10px">Pilih tanggal kemudian bulan dan masukan tahun</p>
                                    </td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" title="Jenis kelamin">Jenis kelamin</td>
                                    <td>
                                        <label style="cursor: pointer ">
                                            <input type="radio" name="jk" checked class="form-control" value="L"> Laki-laki
                                        </label>
                                        &nbsp;&nbsp;&nbsp;
                                        <label style="cursor: pointer ">
                                            <input type="radio" name="jk" class="form-control" value="P"> Perempuan
                                        </label>
                                    
                                    </td>
                                    <tr>
                                        <td class="row-title"><span class="tips" title="Nomor Telepon">No. Telepon</td>
                                        <td>
                                            <input type="text" name="no_telp" style="width: 100%"></td>
                                    </tr>
                                    <tr>
                                        <td class="row-title"><span class="tips" title="Agama">Agama</td>
                                        <td>
                                            <select name="agama" style="width: 100%">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Konghucu">Konghucu</option>
                                                <option value="Lainnya">Lainnya</option>
                                                
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="row-title"><span class="tips" title="Jabatan">Jabatan</td>
                                        <td>
                                            <input type="text" name="jabatan" style="width: 100%"></td>
                                    </tr>
				</tr>
			</table>			
		</div>  
	</div>
</div>
<div class="col-lg-6 box-right">
	<div class="box">								
		<header class="dark">
			<h5>Data Akun Guru</h5>
		</header>								
		<div>
			<table>
                                <tr>
                                    <td class="row-title"><span class="tips" required title="Unggah foto profil">Foto Profil</td>
                                    <td>
                                        <div class='control-group'>
                <div class='controls'><br>
        
        <div class='fileinput fileinput-new' data-provides='fileinput'>
                    <div class='fileinput-new thumbnail' style='max-width: 250px; max-height: 250px;'>
            <img src='assets/Images/contoh.png' alt='...'>
                 </div><div class='fileinput-preview fileinput-exists thumbnail' style='max-width: 250px; max-height: 250px;'></div>
                <div>
                <span class='btn btn-default btn-file'><span class='fileinput-new'>Pilih foto</span> <span class='fileinput-exists'>Pilih foto</span> 
                    <input type='file' name='fupload' style="cursor: pointer" class="form-control">
                </span> 
                <a href='#' class='btn btn-default fileinput-exists' data-dismiss='fileinput'>Hapus</a> 
                </div>
                </div>
                </div>
        </div>
                                    </td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" required title="Username">Username</td>
                                    <td>
                                        <input type="text" id="uname" onchange="cek_uname(this.value);" name="uname" style="width: 100%" required>
                                        	<p style="margin-top: 10px"><small><span id="pesan"></span></small></p>
                                        </td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" title="Password guru">Password</td>
                                    <td>
                                        <input type="password" name="fpass" required style="width: 100%" id="pass"></td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" title="Password guru">Ulangi Password</td>
                                    <td>
                                        <input type="password" name="cpass" required style="width: 100%" id="pass"></td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" required title="Email">Email</td>
                                    <td>
                                        <input type="email" onchange="cek_email(this.value);" name="email" style="width: 100%" required id="email">
                                        	<p style="margin-top: 10px"><small><span id="pesanemail"></span></small></p>
                                        </td>
				</tr>
                                <tr>
                                    <td class="row-title"><span class="tips" title="Website, blog atau link media sosial">Website</td>
                                    <td>
                                        <input type="text" placeholder="Contoh www.sample.com" name="website" style="width: 100%"></td>
				</tr>
				<tr>
					<td class="row-title"><span class="tips" title="Status">Pilih Status</td>
					<td style="padding: 5px 10px;">
						<p class="switch">
                                                    <input id="radio1" value="N" name="blokir" type="radio" checked class="invisible">
                                                    <input id="radio2" value="Y" name="blokir" type="radio" class="invisible">
                                                    <label for="radio1" class="cb-enable selected"><span>Aktif</span></label>
                                                    <label for="radio2" class="cb-disable"><span>Tidak </span></label>
                                                </p>
					</td>
				</tr>
			</table>	
		</div>  
	</div> 
</div>  
</form>