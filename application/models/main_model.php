<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model {

//    public function get_chat ($num, $offset)
//    {
////        $q = "SELECT * FROM songs ORDER BY id DESC";
////        $row = $this->db->query($q);
//        $this->db->order_by("id", "desc");
//        $row = $this->db->get('songs', $num, $offset);
//        return $row->result_array();
//    }
    public function get_chat ()
    {
//        $q = "SELECT * FROM songs ORDER BY id DESC";
//        $row = $this->db->query($q);
        $this->db->order_by("id", "desc");
        $row = $this->db->get('songs');
        return $row->result_array();
    }
    public function get_chat_for_archive ()
    {
        $q = "SELECT * FROM songs  WHERE archive='1' ORDER BY id DESC";
        $row = $this->db->query($q);
        return $row->result_array();
    }
    public function get_chat_for_js ()
    {
        $q = "SELECT * FROM songs, links";
        $row = $this->db->query($q);
        return $row->result_array();
    }
    public function get_group ()
    {
//        $q = "SELECT link_url, s_group, link_name, link_group FROM songs AS s INNER JOIN links AS l ON s.s_group=l.link_group";
        $q = "SELECT * FROM songs AS s INNER JOIN links AS l ON s.s_group=l.link_group";
        $row = $this->db->query($q);
        return $row->result_array();
    }
    public function get_last_gr() {
        $q = "SELECT * FROM songs ORDER BY s_group DESC LIMIT 1";
        $row = $this->db->query($q);
        return $row->result_array();
    }
    public function max_group()
    {
        $q = "SELECT MAX(link_group) FROM links ";
        $row = $this->db->query($q);
        return $row->result_array();
    }
    public function max_songs_group () {
        $q = "SELECT MAX(s_group) FROM songs";
        $row = $this->db->query($q);
        return $row->result_array();
    }
//    public function get_top () {
//        $q = "SELECT * FROM songs WHERE select_songs=1 LIMIT 1";
//        $row = $this->db->query($q);
//        return $row->result_array();
//    }

//    ------------------------------
    public function del_item ($id)
    {
        $q = "DELETE FROM songs WHERE s_group=".$id;
        $q2 = "DELETE FROM links WHERE link_group=".$id;
        $res = $this->db->query($q);
        $res2 = $this->db->query($q2);
        if ($res === true && $res2 === true){
            return true;
        } else {
            return false;
        }
    }
    public function sub_del_item ($id)
    {
        $q = "DELETE FROM links WHERE link_id=".$id;
        $res = $this->db->query($q);
        return $res;
    }
    public function insert_item ()
    {
        $data = array(
            "name" => $this->input->post('name'),
            "music" => $this->input->post('music'),
            "dt_add" => date('d-m-Y'),
            "s_group" => $_POST['s_group'],
            "s_key" => $_POST['s_key']
        );
        $this->db->insert("songs", $data);
    }
    public function add_new_link($group)
    {
        $data = array(
            "link_url" => mysql_real_escape_string($_POST['link_url']),
            "link_name" => $_POST['link_name'],
            "link_group" => $_POST['link_group']
        );
        $this->db->insert('links', $data);
    }
    public function insert_cookie ()
    {
        $data = array(
            "u_name" => $_COOKIE['name'],
            "u_pass" => $_COOKIE['pass'],
            "u_key" => $_COOKIE['key']
        );
        $this->db->insert("users", $data);
    }
//    public function update_item ($id)
//    {
//
//    }

    public function select_user_info ()
    {
        session_start();
        $userKey = @$_SESSION['user_key'];
        $q = "SELECT * FROM users WHERE u_key = '{$userKey}'";
        $res = $this->db->query($q);
        return $res->result_array();
    }

    public function check_name () {
        if (isset($_COOKIE['name'])) {
            $cookName = $_COOKIE['name'];
            $q = "SELECT * FROM users WHERE u_name = '{$cookName}'";
            $res = $this->db->query($q);
            return $res->result_array();
        } else {
            return false;
        }
    }
    public function updateEditLink()
    {
        $link_url = htmlspecialchars($_POST['link_url']);
        // $link_url = ;
        $q = "UPDATE `links` SET link_url='{$link_url}',link_name='{$_POST['link_name']}',link_group='{$_POST['link_group']}' WHERE link_id='{$_POST['link_id']}'";
        $this->db->query($q);
    }
    public function update_edit_name()
    {
        $music = mysql_real_escape_string($_POST['music']);
        $q = "UPDATE songs SET music='{$music}' WHERE id='{$_POST['id']}'";
        $this->db->query($q);
    }
    public function get_select_rating($id)
    {
        $q2 = "SELECT rating FROM `songs` WHERE id ='{$id}'";
        $res = $this->db->query($q2);
        return $res->result_array();
    }
    public function update_rating()
    {
        $q = "UPDATE songs SET rating='{$_POST['rating']}' WHERE id='{$_POST['id']}'";
        $this->db->query($q);
//-------------------------return value
        return $this->get_select_rating($_POST['id']);
    }
    public function refresh_rating()
    {
        $q2 = "SELECT rating FROM `songs` ";
        $res = $this->db->query($q2);
        return $res->result_array();
    }

    public function put_to_archive()
    {
        $q = "UPDATE `songs` SET archive=1, select_songs=0 WHERE id={$_POST['id']}";
        $res = $this->db->query($q);
        if ($res == true) {
            return "1";
        } else {
            return false;
        }
    }

    public function return_to_main()
    {
        $data = array (
            'archive' => 0
        );

        $this->db->where('s_group', $_POST['s_g']);
        $res = $this->db->update('songs', $data);

        if ($res == true) {
            return "1";
        } else {
            return false;
        }
    }

    public function set_song()
    {
        $data = array (
            "select_songs" => $_POST['select_songs']
        );
        $this->db->where('id', $_POST['id']);
        $res = $this->db->update('songs', $data);

        if ($res == true) {
            return "1";
        } else {
            return false;
        }
    }

    public function get_all_for_pagination () {
        return $this->db->get('songs')->num_rows();
    }

    public function get_count_for_profile ()
    {
        $q = "SELECT COUNT(1) FROM songs WHERE name='{$_POST['name']}' AND archive=1";
        $row = $this->db->query($q);
        return $row->result_array();
    }

    public function save_email()
    {
        $data = array(
            "email" => $_POST['email'],
            "u_key" => $_POST['u_key']
        );
        $this->db->where('u_key', $data['u_key']);
        $res = $this->db->update('users', $data);
        if ($res) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function change_passwd()
    {
        $data = array(
            "u_pass" => md5($_POST['u_pass'])."5z9#Ax",
            "u_key" => $_POST['u_key']
        );
        $this->db->where('u_key', $data['u_key']);
        $res = $this->db->update('users', $data);
        if ($res) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function attention_new_song_update()
    {
        $u_key = $_POST['u_key'];
        $data = array(
            "u_attentionNewSong" => $_POST['u_attentionNewSong'],
        );
        $this->db->where('u_key', $u_key);
        $this->db->update('users', $data);
    }

    public function attention_new_song_select()
    {
        $query = $this->db->get_where('users', array('u_attentionNewSong' => 1));
        return $query->result_array();
    }
}