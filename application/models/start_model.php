<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start_model extends CI_Model
{
//    public function get_chat()
//    {
//        $q = "SELECT * FROM songs ORDER BY id DESC";
//        $row = $this->db->query($q);
//        return $row->result_array();
//    }

    public function get_name_pass($name, $pass)
    {
        $name1 = strip_tags($name);
        $pass1 = strip_tags($pass);

        $q = "SELECT u_name, u_pass, u_key FROM users WHERE u_name='".$name1."' AND u_pass='".$pass1."'";
        $res = $this->db->query($q);
        return $res->result_array();
    }
    public function get_usr() {
        $q = "SELECT u_name, u_key FROM users";
        $res = $this->db->query($q);
        return $res->result_array();
    }

    public function restore_pwd($eml, $trigger, $new_passwd)
    {
        if ($trigger == 0) {
            $query = $this->db->get_where('users', array('email' => $eml));
            return $query->result_array();
        } elseif ($trigger == 1) {
            $data = array(
                'u_pass' => $new_passwd,
            );

            $this->db->where('email', $eml);
            $res = $this->db->update('users', $data);
            return $res;
        }

    }
}