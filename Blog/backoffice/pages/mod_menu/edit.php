<?php
$id = $_GET['id'];
$row = $query->get_mainmenu($id);

$module = 'sensor';
$role = $query->get_role($module);
if ($_SESSION[level_user] == 'user' AND $role[edit] == 'Y') {
    ?>

    <div class="container-fluid padded">
        <div class="box">
            <div class="box-header">
                <div class="title">Main Menu</div>
                <ul class="box-toolbar">
                    <li class="toolbar-link">
                        <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-plus-sign"></i> Add</a></li>
                            <li><a href="#"><i class="icon-remove-sign"></i> Remove</a></li>
                            <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="box-content padded">
                <div class="row-fluid">
                    <div class="span8 separate-sections">
                        <form class="form-horizontal fill-up validatable" action="" method="POST">
                            <div class="form-group">
                                <label class="control-label span2">Nama Main Menu :</label>
                                <div class="span10">
                                    <input type="hidden" name="id" value="<?php echo $row[id_main] ?>">
                                    <input type="text" name="nama" value="<?php echo $row[nama_main]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                    <span class="help-block note"><i class="icon-required"></i></span><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label span2">Link / URL :</label>
                                <div class="span10">
                                    <input type="text" name="link" value="<?php echo $row[link]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                    <span class="help-block note"><i class="icon-required"></i></span><br>
                                </div>
                            </div>

                               <div class="form-group">
                                    <label class="control-label span2">Aktif :</label>
                                    <div class="span10">
                                        <div class="span6">
                                            <div class="dashboard-stats small">
                                                <ul class="inline">
                                                    <li class="glyph"><input type="radio" name="aktif" value="Y" <?php if ($row[aktif] == 'Y') {
                                                echo "checked";
                                            } ?> ></li>
                                                    <li>Ya</li>
                                                    <li class="glyph"><input type="radio" name="aktif" value="N" <?php if ($row[aktif] == 'N') {
                                                echo "checked";
                                            } ?> ></li>
                                                    <li>Tidak</li>
                                                </ul>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="span10 separate-sections pull-right" style="margin-top: 100px;">
                                        <div class="form-group">
                                            <button type="submit" name="save" class="btn btn-blue">Simpan</button>
                                            <button type="button" class="btn btn-default">Batal</button>
                                        </div>
                                    </div>

                                    </form>
                                </div>
                            </div>
                    </div>
                </div>


    <?php
} elseif ($_SESSION[level_user] == 'admin') {
    ?>
         <div class="container-fluid padded">
        <div class="box">
            <div class="box-header">
                <div class="title">Main Menu</div>
                <ul class="box-toolbar">
                    <li class="toolbar-link">
                        <a href="#" data-toggle="dropdown"><i class="icon-cog"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-plus-sign"></i> Add</a></li>
                            <li><a href="#"><i class="icon-remove-sign"></i> Remove</a></li>
                            <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="box-content padded">
                <div class="row-fluid">
                    <div class="span8 separate-sections">
                        <form class="form-horizontal fill-up validatable" action="" method="POST">
                            <div class="form-group">
                                <label class="control-label span2">Nama Main Menu :</label>
                                <div class="span10">
                                    <input type="hidden" name="id" value="<?php echo $row[id_main] ?>">
                                    <input type="text" name="nama" value="<?php echo $row[nama_main]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                    <span class="help-block note"><i class="icon-required"></i></span><br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label span2">Link / URL :</label>
                                <div class="span10">
                                    <input type="text" name="link" value="<?php echo $row[link]; ?>" class="validate[required]" data-prompt-position="topLeft">
                                    <span class="help-block note"><i class="icon-required"></i></span><br>
                                </div>
                            </div>

                            <div class="form-group">
                                    <label class="control-label span2">Aktif :</label>
                                    <div class="span10">
                                        <div class="span6">
                                            <div class="dashboard-stats small">
                                                <ul class="inline">
                                                    <li class="glyph"><input type="radio" name="aktif" value="Y" <?php if ($row[aktif] == 'Y') {
                                                echo "checked";
                                            } ?> ></li>
                                                    <li>Ya</li>
                                                    <li class="glyph"><input type="radio" name="aktif" value="N" <?php if ($row[aktif] == 'N') {
                                                echo "checked";
                                            } ?> ></li>
                                                    <li>Tidak</li>
                                                </ul>
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                    <div class="span10 separate-sections pull-right" style="margin-top: 100px;">
                                        <div class="form-group">
                                            <button type="submit" name="save" class="btn btn-blue">Simpan</button>
                                            <button type="button" class="btn btn-default">Batal</button>
                                        </div>
                                    </div>

                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
                            <?php
                        } else {
                            echo "error";
                        }
                        ?>
                        <?php
                        $id   = $_POST['id'];
                        $nama = $_POST['nama'];
                        $link = $_POST['link'];
                        $aktif= $_POST['aktif'];
                       

                        if (isset($_POST['save'])) {
                          
                                    $query->edit_mainmenu($id,$nama,$link,$aktif);
                                     // Log Aktifitas
                                     $query->log($_SESSION[id_user],'Memperbaharui main menu',$tgl_sekarang,$jam_sekarang);
                                    echo "<script>window.location='admin.php?page=mainmenu';</script>";
                            
                        }

                               