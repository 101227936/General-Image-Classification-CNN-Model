<?php
    if(!empty($_POST['uid']))
    {
		if(!is_dir("./uploads")) 
		{
			mkdir("./uploads");
		}
		if(!is_dir("./model"))  
		{
			mkdir("./model");
		}
		
        $upload_folder = 'uploads/'.$_POST['uid'];
        $model_folder = 'model/'.$_POST['uid'];
        $dirs = array_filter(glob($upload_folder), 'is_dir');
        if(count($dirs)==0)
        {
            mkdir($upload_folder);
        }

        $dirs = array_filter(glob($model_folder), 'is_dir');
        if(count($dirs)==0)
        {
            mkdir($model_folder);
        }
    }
    else die(header("HTTP/1.0 403 Forbidden"));
?>