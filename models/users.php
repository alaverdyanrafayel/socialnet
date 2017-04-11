<?php

class Models_users extends System_model
{

    public function getAllUsers()
    {

        $result = $this->db->select("select * from users")->all();

        return $result;
    }

    /**
     * @param $email
     * @param $password
     * @return array
     */

    public function check($email, $password)
    {
        $result = $this->db->select("select id from users where email = '$email' && password = '$password'")->first();
        return $result;
    }

    public function get($email, $password)
    {
        $result = $this->db->select("select * from users where email = '$email' && password = '$password'")->first();
        return $result;
    }

    /**
     * @return array
     */

    public function selectUser()
    {
        $id = $_SESSION['user_id'];
        $result = $this->db->select("select * from users where id = '$id'")->first();
        return $result;
    }


    public function insertImage($name, $id)
    {
        return $this->db->update('users', array('image' => $name), "id =" . $id);
    }

    /**
     * @param $name
     */

    public function selUsers($name)
    {
        $user_id = $_SESSION['user_id'];
        $sel = $this->db->select("select * from users where concat_ws(' ',f_name,l_name) like '$name%' AND 
          id <> '$user_id';")->all();

        return $sel;

    }

    /* public function getAllFriends()
     {
         $user_id = $_SESSION['id'];
     }*/
    public function selSingleUser($id)
    {

        $select = $this->db->select("select * from users where id='$id'")->first();

        return $select;

    }
}

