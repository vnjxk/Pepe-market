<?php
include 'image.compare.class.php';
$class = new compareImages;
	  $uploadpath2 = '\Pepes';  
 
      $dataDir  = dirname(__FILE__). $uploadpath2;
	  
      try
            {
      $dir  = new DirectoryIterator($dataDir);
      
      foreach ($dir as $file)
      {
		  
            if (!$file->isDot()) {
        $fileName = $file->getPathname();
		
		echo $class->compare($fileName,$fileName);
    }
		
      }
             }
              catch (Exception $ex)
             {
                
             } 	
?>