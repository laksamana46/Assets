<?php

/* 
 * Dedicated to PERTAMINA                                        
 * Web Application
 * Creator by Agis Laksamana
 * Copyright © 2015 IBeEs; Licensed
 * IBeES (Information Based Electronic System)
 */
  
$id            = validasi($_GET['id'], 'xss');
$delete        = $ARSql->delOne('ndt_personil','id_personil',$id);
if($delete) {
    header('location: admin.php?mod_apps=ndt&media_app=personil_ndt');
}
                                   
