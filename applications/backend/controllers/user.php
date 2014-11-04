<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

	public function index()
	{
		// CRUD table
		$this->load->helper('crud');
		$crud = generate_crud('users');
		$crud->unset_fields('activation_code', 'forgot_password_code', 'forgot_password_time', 'created_at');
		$crud->columns('role', 'username', 'email', 'first_name', 'last_name', 'active', 'created_at');
		$crud->callback_before_insert(array($this, 'callback_before_create_user'));

		$this->mTitle = "Users";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}
	
	/**
	 * Grocery Crud callback functions
	 */
	public function callback_before_create_user($post_array)
	{
		$post_array['password'] = hash_pw($post_array['password']);
		return $post_array;
	}
}