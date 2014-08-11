<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {

	/**
	 * Backend users
	 */
	public function backend_user()
	{
		// CRUD table
		$crud = $this->enable_crud('backend_users');
		$crud->columns('role', 'username', 'full_name', 'active', 'created_at');
		$crud->unset_edit_fields('password');
		$crud->callback_before_insert(array($this, 'callback_before_create_user'));

		$this->mTitle = "Backend Users";
		$this->mViewFile = '_partial/crud';
		$this->mViewData['crud_data'] = $crud->render();
	}

	/**
	 * Grocery Crud callback functions
	 */
	public function callback_before_create_user($post_array)
	{
		$this->load->helper('auth');
		$post_array['password'] = hash_pw($post_array['password']);
		return $post_array;
	}
}