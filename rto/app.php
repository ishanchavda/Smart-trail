<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" enctype="multipart/form-data">
		<label for="exampleInputFile">Select Images</label>
        <input type="file"  name="files[]" multiple />
		
		<input type="submit" class="btn btn-info" value="Add Penalty" name="addpenalty">
		<input type="reset" class="btn btn-default" value="Reset">
</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$veno ="GJ23AB1111"; //$_GET['vehiclenumber'];
	$date=date("Y-m-d");
	$errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name )
	{
		$file_name = $key;
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
        $desired_dir="penalty/$date/$veno";
        if(empty($errors)==true)
		{
            if(is_dir($desired_dir)==false)
			{
                mkdir("$desired_dir", 0700, true);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false)
			{
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else
			{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
		// mysql_query($query);			
        }
		else
		{
				echo $error;
        }
    }
}
	?>