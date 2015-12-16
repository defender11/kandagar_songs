<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller
{
    private $md5Temp = "";

    public function index()
    {
        session_start();
        $_SESSION['auth'] = "no";
        $_SESSION['user_key'] = 0;
        $_SESSION['auth_status'] = "";

        $this->load->view('start_view');
    }

    public function login ()
    {

        $this->load->model('start_model');
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = strip_tags($_POST['boxCheckName']);
            $pass = strip_tags($_POST['boxCheckPass']);
            $md5Temp = md5($pass)."5z9#Ax";
//            test:test!@#A
//            test2:comp
//            array(1) { ["user"]=> array(1) { [0]=> array(3) { ["u_name"]=> string(4) "test" ["u_pass"]=> string(8) "test!@#A" ["u_key"]=> string(3) "123" } } }

            $data['user'] = $this->start_model->get_name_pass($name, $md5Temp);

            @$dbName = $data['user'][0]['u_name'];
            @$dbPass = $data['user'][0]['u_pass'];
            @$dbKey  = $data['user'][0]['u_key'];

            if (!empty($data) && is_array($data)) {
                if ($md5Temp == $dbPass && $name == $dbName) {
                    session_start();
                    $_SESSION['auth'] = "yes";
                    $_SESSION['auth_status'] = "User login.";
                    $_SESSION['user_name'] = @$dbName;
                    $_SESSION['user_key'] = @$dbKey;
                    redirect(base_url());
                } else {
                    session_destroy();
                    $_SESSION['auth'] = "no";
                    echo "You don`t have permission";
                    redirect('login');
                    exit();
                }
            } else {
                session_destroy();
                $_SESSION['auth'] = "no";
                echo "You don`t have permission";
                redirect('login');
                exit();
            }
        } else {
            session_destroy();
            $_SESSION['auth'] = "no";
            echo "You don`t have permission";
            redirect('login');
            exit();
        }
    }

    public function logout() {
        session_start();
        $_SESSION['auth'] = "no";
        $_SESSION['auth_status'] = "User logout.";
        redirect('login');
    }

    public function md5page() {
        $this->load->view('md5_view');
    }

    public function usr_tbl() {
        $this->load->model('start_model');
        $data['usrTable'] = $this->start_model->get_usr();
        $this->load->view('usr_table_view', $data);
    }

    public function restore_pwd()
    {

        $myUrl = "http://".$_SERVER['HTTP_HOST'];

        $eml = strip_tags($_POST['email']);
        $trigger = 0;

        $this->load->model('start_model');
        $res = $this->start_model->restore_pwd($eml, $trigger, '');

        if ($res[0]['email'] == $eml) {
            $trigger = 1;
            $new_passwd = mt_rand(5, 15)."SoNgs".mt_rand(2, 7)."Pass".mt_rand(2, 10);

            $new_passwdMD5 = md5($new_passwd)."5z9#Ax";

            $res = $this->start_model->restore_pwd($eml, $trigger, $new_passwdMD5);

            if ($res) {
                header('Content-Type: application/json');
                mail($eml, 'Restore password from: ' . $myUrl, 'You new password: ' . $new_passwd);
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }

        }
    }
}