<?php 
    $station_data=$this->station_data;
    $login_theme="admin_login";
   $this->widget("AdminLogin",
	                    array(
	                       'views'=>$login_theme,
	                    )
	   );
?>