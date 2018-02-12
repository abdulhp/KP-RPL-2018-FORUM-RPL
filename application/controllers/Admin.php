<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin class.
 * 
 * @extends CI_Controller
 */
class Admin extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('forum_model');
		$this->load->model('user_model');
		$this->load->model('admin_model');
		
		//$this->output->enable_profiler(TRUE);
		
	}
	
	public function index() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			redirect(base_url());
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		$this->load->view('header1');
		$this->load->view('admin/home/index', $data);
		$this->load->view('footer1');
		
	}
	
	public function users() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			redirect(base_url());
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		$data->users = $this->user_model->get_users();
		
		$this->load->view('header1');
		$this->load->view('admin/users/users', $data);
		$this->load->view('footer1');
		
	}
	
	/**
	 * edit_user function.
	 * 
	 * @access public
	 * @param mixed $username (default: false)
	 * @return void
	 */
	public function edit_user($username = false) {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			redirect(base_url());
			return;
		}
		
		if ($username === false) {
			
			redirect(base_url('admin/users'));
			return;
			
		}
		
		// create the data object
		$data = new stdClass();
		
		// create the user object
		$user_id = $this->user_model->get_user_id_from_username($username);
		$user    = $this->user_model->get_user($user_id);
		
		// set options
		if ($user->is_admin === '1') {
			$options  = '<option value="administrator" selected>Administrator</option>';
			$options .= '<option value="moderator">Moderator</option>';
			$options .= '<option value="user">User</option>';
		} elseif ($user->is_moderator === '1') {
			$options  = '<option value="administrator">Administrator</option>';
			$options .= '<option value="moderator" selected>Moderator</option>';
			$options .= '<option value="user">User</option>';
		} else {
			$options  = '<option value="administrator">Administrator</option>';
			$options .= '<option value="moderator">Moderator</option>';
			$options .= '<option value="user" selected>User</option>';
		}
		
		// assign values to the data object
		$data->user    = $user;
		$data->options = $options;
		if ($user->updated_by !== null) {
			$data->user->updated_by = $this->user_model->get_username_from_user_id($user->updated_by);
		}
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set form validations rules
		$this->form_validation->set_rules('user_rights', 'User Rights', 'required|in_list[administrator,moderator,user]', array('in_list' => 'Don\'t try to hack the form!'));
		
		if ($this->form_validation->run() == false) {
			
			$this->load->view('header1');
			$this->load->view('admin/users/edit_user', $data);
			$this->load->view('footer1');
			
		} else {
			
			// assign rights to variables
			if ($this->input->post('user_rights') === 'administrator') {
				$is_admin     = '1';
				$is_moderator = '0';
			} elseif ($this->input->post('user_rights') === 'moderator') {
				$is_admin     = '0';
				$is_moderator = '1';
			} else {
				$is_admin     = '0';
				$is_moderator = '0';
			}
			
			if ($this->admin_model->update_user_rights($user_id, $is_admin, $is_moderator)) {
				// update user success
				$data->success = $user->username . ' has successfully been updated.';
			} else {
				// error while updating user rights, this should never happen
				$data->error = 'There was an error while trying to update this user. Please try again';
			}
			
			$this->load->view('header1');
			$this->load->view('admin/users/edit_user', $data);
			$this->load->view('footer1');
			
		}
		
	}

	public function delete_user($username = false)
	{
		# code...
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			redirect(base_url());
			return;
		}
		
		if ($username === false) {
			
			redirect(base_url('admin/users'));
			return;
			
		}

		$user_id = $this->user_model->get_user_id_from_username($username);

		$res = $this->user_model->delete_user($user_id);

		if($res){
			echo "success";
			redirect(base_url('admin/users'),'refresh');
		}

		// var_dump($user_id);
	}
	
	public function forums_and_topics() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			redirect(base_url());
			return;
		}
		
		// create the data object
		$data = new stdClass();

		$data->forums = $this->forum_model->get_forums();
		// $data->topics = $this->forum_model->get_topics();
		// $data->topics = $this->forum_model->get_forum_topics('1');
		
		$this->load->view('header1');
		$this->load->view('admin/forums_and_topics/forums_and_topics', $data);
		$this->load->view('footer1');
		
	}
	
	public function options() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			redirect(base_url());
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		$this->load->view('header1');
		$this->load->view('admin/options/options', $data);
		$this->load->view('footer1');
		
	}
	
	public function emails() {
		
		// if the user is not admin, redirect to base url
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			redirect(base_url());
			return;
		}
		
		// create the data object
		$data = new stdClass();
		
		$this->load->view('header1');
		$this->load->view('admin/emails/emails', $data);
		$this->load->view('footer1');
		
	}
	public function delete_forum($forum_slug = false)
	{
		# code...
		if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
			redirect(base_url());
			return;
		}
		
		if ($forum_slug === false) {
			
			redirect(base_url('admin/forums_and_topics'));
			return;
			
		}

		$forum_id = $this->forum_model->get_forum_id_from_forum_slug($forum_slug);

		$rsl = $this->forum_model->delete_forum($forum_id);

		if(!$rsl){
			redirect('admin/forums_and_topics', 'refresh');
			
			// var_dump($forum_id);

		}else{
			echo "Noope";
		}

		// $res = $this->forum_model->delete_forum($forum_id);

		// if($res){
		// 	echo "success";
		// 	redirect(base_url('admin/forums_and_topics'),'refresh');
		// }

		// var_dump($forum_id);
	}
	
}


	