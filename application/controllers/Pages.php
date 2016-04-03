<?php
class Pages extends CI_Controller {

        public function __construct()
        {
                parent::__construct();

                $this->load->model('profile_model');
                $this->load->model('home_model');
                $this->load->helper('url_helper');
        }

	public function view($page = 'home')
	{
	        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter
	        
	        $data['movie'] = $this->profile_model->rand_profile();

	        //Random front page movie get
			$data['movie'] = $this->home_model->rand_movie();

	       	$this->load->view('templates/header', $data);
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);
	}


}