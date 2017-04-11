<?php

class System_db
{
    private $con;
    private $q;

    function __construct()
    {
        $this->con = new Mysqli('localhost', 'root', '', 'txerq');
        if ($this->con->connect_errno) {
            echo $this->con->connect_error;
            exit;
        }
    }

    public function escape($data)
    {
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $data[$k] = $this->con->real_escape_string($v);
            }
        } else {
            $data = $this->con->real_escape_string($data);
        }
    }


    public function select($query)
    {
        $this->q = $this->con->query($query);
        return $this;
    }

    public function all()
    {
        if (!$this->q) {
            return [];
        }
        $full = [];
        while ($row = $this->q->fetch_assoc()) {
            //array_push($full, $row);
            $full[] = $row;
        }
        return $full;
    }

    public function first()
    {
        if (!$this->q) {
            return [];
        }
        return $this->q->fetch_assoc();
    }

    public function insert($tbl, $data)
    {
        $key = [];
        $val = [];
        foreach ($data as $k => $v) {

            $key[] = $k;
            $val[] = $v;
        }

        $key = join(',', $key);
        $val = join("','", $val);

        $sql = "insert into $tbl ($key) values ('$val')";
        return $this->con->query($sql);
    }

    public function update($tbl, $data, $where = false)
    {
        $set = [];

        foreach ($data as $k => $v) {

            $set[] = $k . "='" . $v . "'";

        }
        $set = join(',', $set);


        if ($where) {
            $where = 'where ' . $where;
        }


        $sql = "update $tbl set $set $where";

        return $this->con->query($sql);
    }

    public function num(){
        if(!$this->q){
            return 0;
        }
        return $this->q->num_rows;
    }
}


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	