<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function index()
	{
		$this->mViewData['result_type'] = $this->session->flashdata('result_type');
		$this->mViewData['result_msg'] = $this->session->flashdata('result_msg');

		$this->mTitle = "Profile";
		$this->mViewFile = 'profile';
	}

	/**
	 * Submission of Account Update form
	 */
	public function update_account()
	{
		$post_data = $this->input->post();

		// custom logic here (e.g. validation, save to database)

		// return with message
		$this->session->set_flashdata('result_type', 'success');
		$this->session->set_flashdata('result_msg', 'Successfully updated.');
		redirect('profile');
	}

	public function change_password()
	{
		$post_data = $this->input->post();

		// custom logic here (e.g. validation, save to database)

		// return with message
		$this->session->set_flashdata('result_type', 'success');
		$this->session->set_flashdata('result_msg', 'Your password is changed.');
		redirect('profile');
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */