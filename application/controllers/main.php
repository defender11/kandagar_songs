<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
//	public function index ()
//	{
//
//		$this->load->model('main_model');
//		$config['base_url'] = base_url().'index.php/main/index/';
//		$config['total_rows'] = $this->main_model->get_all_for_pagination();
//		$config['per_page'] = '5';
//		$config['full_tag_open'] = "<div class='paggion'>";
//		$config['full_tag_close'] = "</div>";
//
//		$this->pagination->initialize($config);
//
//		$temp['chat'] = $this->main_model->get_chat($config['per_page'], $this->uri->segment(3));
////		$temp['cook'] = $this->main_model->check_name($_COOKIE['name']);
//		$temp['maxGroup'] = $this->main_model->max_group();
//		$temp['getGroup'] = $this->main_model->get_group();
//		$temp['lastGroup'] = $this->main_model->get_last_gr();
//		$temp['rat'] = $this->main_model->refresh_rating();
////		$temp['sTop'] = $this->main_model->get_top();
//
//		$this->load->view('main_view', $temp);
//	}
	public function index ()
	{

		$this->load->model('main_model');

		$temp['chat'] = $this->main_model->get_chat();
//		$temp['cook'] = $this->main_model->check_name($_COOKIE['name']);
		$temp['maxGroup'] = $this->main_model->max_group();
		$temp['getGroup'] = $this->main_model->get_group();
		$temp['lastGroup'] = $this->main_model->get_last_gr();
		$temp['rat'] = $this->main_model->refresh_rating();
		$temp['usersInfo'] = $this->main_model->select_user_info();
//		$temp['sTop'] = $this->main_model->get_top();
		$temp['statusAgent'] = $_SERVER['HTTP_USER_AGENT'];
		$this->load->view('main_view', $temp);
	}
	public function archive ()
	{
		$this->load->model('main_model');
		$temp['chat'] = $this->main_model->get_chat_for_archive();
//		$temp['cook'] = $this->main_model->check_name($_COOKIE['name']);
		$temp['maxGroup'] = $this->main_model->max_group();
		$temp['getGroup'] = $this->main_model->get_group();
		$temp['lastGroup'] = $this->main_model->get_last_gr();
		$temp['rat'] = $this->main_model->refresh_rating();
		$temp['usersInfo'] = $this->main_model->select_user_info();
		$temp['statusAgent'] = $_SERVER['HTTP_USER_AGENT'];
		$this->load->view('archive_view', $temp);
	}
	public function profile ()
	{
		$this->load->model('main_model');
		$temp['usersInfo'] = $this->main_model->select_user_info();
		$temp['userSongs'] = $this->main_model->get_chat();
		$temp['statusAgent'] = $_SERVER['HTTP_USER_AGENT'];
		$this->load->view('main_profile_view', $temp);

	}

//	public function start ()
//	{
//			$this->load->model('main_model');
//			$temp['admin'] = $this->main_model->check_name();
//			$this->load->view('start_view', $temp);
//	}

	public function add_cookie ()
	{
		$this->load->model('main_model');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$nameForCookie = $_POST['boxCheckName'];
			$passForCookie = $_POST['boxCheckPass'];

			$randForUsers = 0;
			if (isset($_COOKIE['name'])) {
				header( "Refresh:1;url=".base_url()."main/index");
				exit("Загрузка...2");
			} else {
//				if ($randForUsers === $randForUsers) {
				$randForUsers = rand(1,9999);
				setcookie("name", $nameForCookie, 0x6FFFFFFF);
				setcookie("pass", $passForCookie, 0x6FFFFFFF);
				setcookie("key", $randForUsers, 0x6FFFFFFF);
				header( "Refresh:4;url=".base_url()."main/index");
				$this->main_model->insert_cookie();
				exit("Загрузка...");
//				}
			}
		}
	}

	public function max_songs_group ()
	{
		$this->load->model('main_model');
		$temp = $this->main_model->max_songs_group();
		return json_encode($temp);
	}

	public function del_item ($id)
	{
		$this->load->model('main_model');
		$this->main_model->del_item($id);
	}
	public function sub_del_item ($id)
	{
		$this->load->model('main_model');
		$this->main_model->sub_del_item($id);
	}

	public function insert_item () {
		if ($_SERVER['HTTP_HOST'] === 'cepaso.ru/kandagar_songs/') {
			$url = "http://".$_SERVER['HTTP_HOST']."/kandagar_songs";
		} else if($_SERVER['HTTP_HOST'] === "songs.crimea-kurort.com") {
			$url = "http://".$_SERVER['HTTP_HOST'];
		} else {
			$url = "http://".$_SERVER['HTTP_HOST'];
		}

		$mailData = 'User: ' . $_POST['name']."\n\r";
		$mailData .= 'Add new song: ' . $_POST['music']."\n\r";
		$mailData .= $url;

		$this->load->model('main_model');
		if (isset($_POST['name'])) {
			$this->main_model->insert_item();
			$res = $this->main_model->attention_new_song_select();
			if (!empty($res) && is_array($res)) {
				foreach ($res as $item) {
					mail($item['email'], 'Add new song.' , $mailData);
				}
			}
		}
	}
//	------
	public function get_chat()
	{
		header('Content-Type: application/json');
		$this->load->model('main_model');
		$ch = $this->main_model->get_chat_for_js();
		echo json_encode($ch, JSON_FORCE_OBJECT);
	}

	public function get_sgroup_like_linkgroup()
	{
		header('Content-Type: application/json');
		$this->load->model('main_model');
		$grps = $this->main_model->get_group();
		echo json_encode($grps, JSON_FORCE_OBJECT);
	}

	public function add_new_link($group)
	{
		$this->load->model('main_model');
		$this->main_model->add_new_link($group);
	}

	public function updateEditLink()
	{
		$this->load->model('main_model');
		$this->main_model->updateEditLink();
	}

	public function update_edit_name()
	{
		$this->load->model('main_model');
		$this->main_model->update_edit_name();
	}

	public function update_rating()
	{
		header('Content-Type: application/json');
		$this->load->model('main_model');
		$rat = $this->main_model->update_rating();
		echo json_encode($rat, JSON_FORCE_OBJECT);
	}
	public function get_count_for_profile()
	{
		header('Content-Type: application/json');
		$this->load->model('main_model');
		$rat = $this->main_model->get_count_for_profile();
		echo json_encode($rat, JSON_FORCE_OBJECT);
	}

	public function put_to_archive()
	{
		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('main_model');
		$res = $this->main_model->put_to_archive();
		if ($res == "1" ) {
			return $res;
		} else {
			return false;
		}
	}

	public function return_to_main()
	{
		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('main_model');
		$res = $this->main_model->return_to_main();
		if ($res === "1" ) {
			return true;
		} else {
			return false;
		}
	}

	public function set_song()
	{
		header('Content-Type: text/html; charset=utf-8');
		$this->load->model('main_model');
		$res = $this->main_model->set_song();
		if ($res === "1") {
			return true;
		} else {
			return false;
		}
	}

	public function save_email()
	{
		header('Content-Type: text/plain; charset=utf-8');
		$this->load->model('main_model');
		$res = $this->main_model->save_email();
		if ($res === "1") {
			echo true;
		} else {
			echo false;
		}
	}

	public function change_passwd()
	{
		// header('Content-Type: text/plain; charset=utf-8');

		$url = "http://".$_SERVER['HTTP_HOST'];

		$eml = strip_tags($_POST['email']);
		$u_name = strip_tags($_POST['u_name']);
		$pswd = strip_tags($_POST['u_pass']);

		mail($eml, 'Restore password from: '. $url, 'You new password: '. $pswd);

		$this->load->model('main_model');
		$res = $this->main_model->change_passwd();
		if ($res == "1") {
			echo true;
		} else {
			echo false;
			exit();
		}
	}

	public function attention_new_song_update()
	{
		$this->load->model('main_model');
		$res = $this->main_model->attention_new_song_update();

	}

//	public function check_cookie () {
//		$this->load->model('main_model');
//		$temp['cook'] = $this->main_model->check_name();
//		$temp['chat'] = $this->main_model->get_chat();
//		$this->load->view('main_view', $temp);
//
//	}
//	public function update_item() {
//		$this->load->model('main_model');
//		$this->main_model->($id);
//	}
}