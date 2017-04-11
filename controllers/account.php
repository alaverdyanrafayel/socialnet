<?php

class Account extends System_controller
{
    function __construct()
    {
        parent::__construct();
        if (empty($_SESSION['user_id'])) {
            header("Location: /");
        }
    }

    public function friends()
    {
        $model = new Models_users;
        $data = $model->getAllFriends();

        $this->view->userdata = $data;
        $this->view->render('friends');
    }


    public function index()
    {

        $model_obj = new Models_users();
        // upload image

        if (isset($_POST['submit'])) {
            //allowed types of image extension

            $allowedExt = array('jpg', 'png', 'jpeg');
            $errors = array();
            $filename = $_FILES['image']['name'];
            $filetext = strtolower(end(explode('.', $filename)));
            $filetmpname = $_FILES['image']['tmp_name'];

            //check if the extension is allowed in array
            if (in_array($filetext, $allowedExt) === false) {
                $errors[] = "Extension is not allowed";
            } else {
                $random = rand(0, 9999) . rand(0, 9999);
                $name = $random . $filename;
                $destination = $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/" . $random . $filename;
                if (move_uploaded_file($filetmpname, $destination)) {
                    $model_obj->insertImage($name, $_SESSION['user_id']);
                    echo "";
                } else {
                    echo "File has not been uploaded!";
                }
            }
        }


        //create object to call pendingRequest

        $friends = new models_friends();

        $pendingRequest = $friends->pendingRequest($_SESSION['user_id']);

        $this->view->pendingRequest = $pendingRequest;


        $this->view->user = $model_obj->selectUser($_SESSION['user_id']);
        $this->view->render('account');

    }

    /**
     * go to single_user page
     */

    public function users($id)
    {
        if ($id) {

            $friends = new models_friends();
            if ($friends->areFriends($_SESSION['user_id'], $id)) {
                $friendshipStatus = "areFriends";
            } elseif ($friends->friendRequestSend($_SESSION['user_id'], $id)) {
                $friendshipStatus = "requestSend";
            } else {
                $friendshipStatus = "notFriends";
            }
            $this->view->friendshipStatus = $friendshipStatus;

            $selectSingleUser = new Models_users();
            $this->view->selectSingleUser = $selectSingleUser->selSingleUser($id);
            $this->view->render('single_user');
        } else {
            $name = $_POST['search'];
            $searchUsers = new Models_users();
            $selMatch = $searchUsers->selUsers($name);
            $this->view->selUsers = $selMatch;
            $this->view->render('users');
        }
    }

    //get the id of friend request from js

    public function addFriend()
    {
        if (isset($_POST['id'])) {
            $id1 = $_SESSION['user_id'];
            $id2 = $_POST['id'];
            $friend = new models_friends();
            $friend->addFriend($id1, $id2);

        }
    }

    //confirm function

    public function confirm()
    {
        if (isset($_POST['conf_id'])) {
            $id1 = $_SESSION['user_id'];
            $conf_id = $_POST['conf_id'];
            $confirm = new models_friends();
            $confirm->confirm($id1, $conf_id);
        }
    }

    //message

    public function chat($to_id)
    {
        $model1 = new models_messages();
        $addressed_id = $model1->getChat($to_id);


        $this->view->getChat = $addressed_id;

        $this->view->render('chat');
    }

    //get messages from ajax

    public function getMessage()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $text = $_POST['text'];

            $insert = new models_messages();
           $data = $insert->insertChat($id, $text);

            $json = json_encode($data, JSON_FORCE_OBJECT );

            echo $json;
        }
    }
}





