<?php

class models_friends extends System_model
{
    public function areFriends($id1, $id2)
    {
        return $this->db->select("select id from friends where ((u1_id=$id1 and u2_id=$id2) OR (u1_id=$id2 and u2_id=$id1)) 
        and accepted='1'")->num();
    }

//insert friend requests

    public function addFriend($id1, $id2)
    {

        if (!$this->friendRequestSend($id1, $id2)) {
            if (!$this->areFriends($id1, $id2)) {
                $insert = $this->db->insert('friends', array('u1_id' => $id1, 'u2_id' => $id2));

                if ($insert) {

                    echo true;
                    die;
                }
            }

        }

    }

    public function friendRequestSend($id1, $id2)
    {
        $select = $this->db->select("select * from friends where u1_id = '$id1' && u2_id = '$id2' && accepted ='0'")->num();
        if ($select) {
            return true;
        } else {
            return false;
        }

    }

    //see if there are people send friend request

    public function pendingRequest($id)
    {
        $select = $this->db->select("select * from friends JOIN users ON friends.u1_id = users.id 
                  where u2_id = '$id' && accepted ='0'")->all();
        return $select;
    }

    //confirm friend request

    public function confirm($id1, $conf_id)
    {

        $update = $this->db->update('friends', array('accepted' => '1'), "u1_id =" . $conf_id . "&& u2_id = " . $id1);
        if ($update) {
            echo true;
            exit;
        }
    }

  /*  public function getMessage(){
        $id = $_SESSION['user_id'];
        return $this->db->select("select ");
    }*/
}