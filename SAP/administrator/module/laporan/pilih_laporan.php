<section class="page container">
 <div class="span20 pull-left">
  <div class="row">
 
  <form class="form-horizontal" action="?module=laporan" method="POST">  
      
 <div id="acct-password-row" class="span7">
  <fieldset>
        <legend><h3 style="font-family: Footlight MT Light;">Pilih Kategori Laporan</h3></legend><br>
                <div class="control-group ">
                <select class="chosen span6" name="sk" data-placeholder="Pilih Standar Kompetensi">
                                         <option value="0"></option>
                                         <?php
                                         if($_SESSION['id_profesi']=='4'){
                                        $data = $syntax->sk_guru($_SESSION['id_user']);
                                         foreach ($data as $row){
                                             echo" <option value='$row[sk_kode]'>$row[sk_nama]</option>";
                                         }
                                         }else{
                                            // Menampilkan pilihan standar kompetensi
                                         $data = $syntax->show_sk();
                                         foreach ($data as $row){
                                             echo" <option value='$row[sk_kode]'>$row[sk_nama]</option>";
                                         }  
                                         }
                                         ?>
                      </select>
                      </div>
                      
        
        <div class="control-group ">
        <select class="chosen span6" name="ujian" data-placeholder="Pilih Ujian">
     <option value="0"></option>
             <?php
              // Menampilkan pilihan ujian
               $data = $syntax->show_ujian();
               foreach ($data as $row){
               echo" <option value='$row[id_ujian]'>$row[nama_ujian]</option>";
               }
              ?>
    </select>
     </div>
                                
                                    
     <div class="control-group ">
                                        <select class="chosen span6" name="kelas" data-placeholder="Pilih Kelas">
                                         <option value="0"></option>
                                         <?php
                                         // Menampilkan pilihan kelas
                                         $data = $syntax->show_kelas();
                                         foreach ($data as $row){
                                             echo" <option value='$row[id_kelas]'>$row[nama_kelas]</option>";
                                         }
                                         ?>
                                   </select>
                                    </div>
        
                  
                                </fieldset><br/><br/><br/>
                                     
      <footer id="submit-actions" class="form-actions">
           <button type="submit" class="btn btn-primary"><i class="icon-zoom-in"></i> Lihat</button>
           <a href="javascript:;" onclick="self.history.back()" type="submit" class="btn" name="action">Kembali</a>
     </footer>   
                                                
                                     
</form>
</div>   
</div>
</div>
</section>
    
