<?php

class models_messages extends System_model
{

    //select messages

    public function getChat($to_id)
    {
        //get the url

        $id = $_SESSION['user_id'];
        $url = $_SERVER['PHP_SELF'];
        $to_id = end(explode("/", $url));

        $select = $this->db->select("select messages.*,users.f_name, 
                  users.l_name, users.image from messages LEFT JOIN users ON messages.from_id = users.id 
                  where from_id = '$id' AND to_id = '$to_id' OR from_id = '$to_id' AND to_id = '$id'")->all();

        return $select;
    }

    //insert messages

    public function insertChat($id, $text)
    {

        $date = date("Y-m-d h:i:s");
        $from_id = $_SESSION['user_id'];
        $array = array(
            'to_id' => $id,
            'from_id' => $from_id,
            'date' => $date,
            'text' => $text
        );
        $insert = $this->db->insert('messages', $array);
        return $array;



    }


}