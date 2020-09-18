<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function insert($tb,$values)
    {
        return $this->db->insert($tb,$values);
    }

    public function insert_batch($tb,$values)
    {
        return $this->db->insert_batch($tb,$values);
    }

    public function update($tb,$values,$filter)
    {
        return $this->db->update($tb,$values,$filter);
    }

    public function delete($tb,$filter)
    {
        return $this->db->delete($tb,$filter);
    }

    public function getData($select,$tb,$join,$filter,$order,$group_by="")
    {
        $sql = $this->db->select($select);

        if($join!="") {
            for($i=0;$i<count($join);$i++){
                if($i%2!=0){
                    $sql = $this->db->join($join[$i-1],$join[$i]);
                }
            }
        }

        if($group_by!=""){
            $this->db->group_by($group_by);
        }
        if($order!=""){
            if(is_array($order)){
                $sql = $this->db->order_by($order[0],$order[1]);
            }
            else{
                $sql = $this->db->order_by($order);
            }
        }
        if($filter!=""){
            $sql = $this->db->where($filter);
        }

        if(is_array($tb)){
            $sql = $this->db->get($tb[0],$tb[1],$tb[2]);
        }
        else{
            $sql = $this->db->get($tb);
        }



        return $sql->result_array();
    }
}