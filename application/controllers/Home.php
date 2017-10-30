<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    /**
     * index
     *
     * Presents welcome screen to new and returning applicants
     */

    public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('welcome');
	}

    public function get()
    {
        
        $id = $_SESSION['applicant_id'];
        $this->load->model('ApplicantModel');
        $data['applicant'] = $this->ApplicantModel->load($id);
        $this->load->model('RaceModel');
        $data['race']= $this->RaceModel->load($data['applicant']->race);
        $this->load->model('EmployerModel');
        $data['employers'] = $this->EmployerModel->get_list('applicant_id',$id);
        $this->load->model('LicenseModel');
        $data['licenses'] = $this->LicenseModel->get_list('applicant_id',$id);
        $this->load->model('TranscriptModel');
        $data['transcripts'] = $this->TranscriptModel->get_list('applicant_id',$id);
        $this->load->view('templates/header');
        $this->load->view('view_application',$data);

    }

	public function mail($type, $id)
    {
        $this->load->model('ApplicantModel');
        $applicant = $this->ApplicantModel->load($id);
        $this->load->model('MailModel');
        $this->MailModel->$type($applicant->preferred_email, $applicant->first_name, $applicant->last_name);
    }


    /**
     * display
     *
     * Displays the view that is sent as a parameter
     *
     * @param $page
     */
    public function display($page)
    {
        $this->load->model('StateModel');
        $data['states'] = $this->StateModel->get_states();
        $this->load->view('templates/header');
        $this->load->view($page, $data);
        $this->load->view('templates/exit_footer');
        }
    
    /**
     * checkLogin
     *
     * Validates if user is logged into the system
     */
    public function checkLogin()
    {
        
        $this->load->helper('url');
        $this->load->model('ApplicantModel');
        $applicant = new ApplicantModel();
        $email= $applicant->get_login('preferred_email', $_POST['email']);
        $password= $applicant->get_login('password', $_POST['password']);
        if(@$email && @$password) {
            $_SESSION['applicant_id'] = $email->applicant_id;
            redirect(base_url("home/get"));
        } else {
            $this->load->view('templates/header');
            $this->load->view('fail_login');
        }
    }

    public function save()
    {
//        
        $this->load->model('ApplicantModel');
        $applicant = new ApplicantModel();
        $this->load->view('templates/header');
        if($data = $this->ApplicantModel->entry_exists('preferred_email', $_POST['email'])) {
            $this->load->view('email_duplicate');
        } else {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];

            $this->load->view('student');
        }

    }

    public function login()
    {
        $this->load->view('templates/header');
        $this->load->view('login');
    }

}