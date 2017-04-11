<?php
class System_routes{
    function __construct($path)
    {
        if(!empty($path[0])){

            $ctrl = $path[0];
            if(file_exists('controllers/'.$ctrl.'.php')){
                include 'controllers/'.$ctrl.'.php';
                $ctrl = ucfirst($ctrl);
                if(class_exists($ctrl, false)){
                    $ctrl_obj = new $ctrl;
                    if(!empty($path[1])){
                        $method = $path[1];
                        if(method_exists($ctrl_obj, $method)){
                            unset($path[0]); 
							unset($path[1]); 
							call_user_func_array(array($ctrl_obj,$method),$path);
							
                        }else{
                            echo "ERROR: method not found";
                        }
                    }else{
                        $ctrl_obj->index();
                    }
                }else{
                    echo "ERROR: class not found";
                }
            }else{
                echo "ERROR: file not found";
            }
        }else{

            include 'controllers/home.php';
            $df_obj = new Home;
            $df_obj->index();
        }
    }
}