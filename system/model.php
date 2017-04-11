 <?php
	 class System_model{
			
			public $db;
			
			function __construct(){
				$this->db=new System_db;
			}
			
		
		}