 <?php
	 class System_view{
			public function render($file,$layout=true){
				
				if(file_exists('views/'.$file.'.php')){
					if ($layout) {
						include 'views/layout/header.php';
						include 'views/'.$file.'.php';
						include 'views/layout/footer.php'; 
					}else {
						include 'views/'.$file.'.php';
					}
					
					
				}else {
					 echo "ERROR: view not found";
				}
		}
	 }