<?php

class Home extends System_controller
{
    function index()
    {
        $this->view->render('home');
    }

    function news($id, $cat)
    {
        echo "news id:" . $id;
        echo "news id:" . $cat;
    }


    // users login

    public function login()
    {

        $user = new Models_users();

        $this->view->error = false;

        $this->view->email = false;

        if (isset($_POST['submit'])) {

            //check if login fields are empty or not

            if (empty($_POST['email']) || empty($_POST['password'])) {
                $this->view->email = $_POST['email'];
                $this->view->error = "Fill all the files in!";
            } else {
                $password = md5($_POST['password']);
                $email = $_POST['email'];
                $model_obj = new Models_users;
                $result = $model_obj->check($email, $password);

                if (!is_null($result)) {
                    $_SESSION['user_id'] = $result['id'];

                    header ("Location: /account");
                } else {
                    $this->view->error = "Wrong email or password";
                }
            }
        }
        $this->view->render('login');
    }
    // users registration

        public function register(){
            $this->view->error = false;

            //check if there is no missed field

            if(isset($_POST['register'])){
                if(empty($_POST['f_name']) || empty($_POST['l_name']) || empty($_POST['email']) ||
                    empty($_POST['password']) || empty($_POST['conf_password'])){
                   $this ->view->error = "Fill all the files in!";
                }else{
                    $f_name = $_POST['f_name'];
                    $l_name = $_POST['l_name'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);
                    $conf_password = $_POST['conf_password'];

                    $data = array("f_name"=>$f_name, "l_name"=>$l_name, "email"=>$email, "password" => $password);
                    $model_obj = new Models_users;
                    $result = $model_obj->db->insert('users', $data);
                }
            }
            $this->view->render('register');
        }

        //logout

        public function logout(){
            unset($_SESSION['user_id']);
            header("Location: /");
            exit;
        }


}


