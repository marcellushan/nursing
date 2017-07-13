<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applicant extends CI_Controller {

    /*
     * post
     *
     * Creates a new applicant
     *
     * */


    public function post()
    {
        

        $this->load->model('ApplicantModel');
        $applicant = new ApplicantModel();
//        $this->load->model('StateModel');
//        $data['states'] = $this->StateModel->get_states();
        $this->load->view('templates/header');
        if($data = $this->ApplicantModel->entry_exists('GHC_ID', @$_POST['GHC_ID'])) {
            $this->load->view('ghc_duplicate');
        } else {
            (@$_POST['GHC_ID'] ? $applicant->GHC_ID = $_POST['GHC_ID'] : $applicant->GHC_ID = "Not Student");
            $this->load->model('StateModel');
            $data['states'] = $this->StateModel->get_states();
            $applicant->application_date = date('Y-m-d');
            $applicant->preferred_email = $_SESSION['email'];
            $applicant->password = $_SESSION['password'];
            $applicant->save();
            $_SESSION['applicant_id'] = $applicant->applicant_id;
            $data['applicant'] = $applicant->load($_SESSION['applicant_id']);
//            var_dump($data['states']);
            $this->load->view('personal', $data);
            $this->load->view('templates/exit_footer');
        }
    }

    /**
     * get
     *
     * Retrieves existing personal information for applicant ID stored in the session
     *
     * @param string $text The view to be displayed
     *
     * @param int $student Identfies whether applicant is current GHC student
     */
    public function get($text, $edit=0)
    {
        
        $this->load->model('ApplicantModel');
        $applicant = new ApplicantModel();
        $this->load->model('StateModel');
        $data['states'] = $this->StateModel->get_states();
        $this->load->view('templates/header');
        $data['applicant'] = $applicant->load($_SESSION['applicant_id']);
        if($edit) {
            $data['edit'] = 1;
            $this->load->view($text, $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view($text, $data);
            $this->load->view('templates/exit_footer');
        }

    }

    /**
     * put
     *
     * Creates an new instance of the item sent as the parameter
     *
     * @param string $destination View to be displayed following the action
     */
    public function put($destination)
    {
        
        $this->load->model('ApplicantModel');
        $this->load->model('StateModel');
        $data['states'] = $this->StateModel->get_states();
        (@$_POST? $applicant=$this->ApplicantModel->update($_SESSION['applicant_id'], $_POST):"");
        if(@$_POST['submitted']) {
            $applicant = $this->ApplicantModel->load($_SESSION['applicant_id']);
            $this->load->model('MailModel');
            $this->MailModel->submit($applicant->preferred_email, $applicant->first_name, $applicant->last_name);
            $this->MailModel->received($applicant->preferred_email, $applicant->first_name, $applicant->last_name);
        }
        $this->load->view('templates/header');
        if($destination=="edit") {
            redirect(base_url('/home/get'));
        } elseif ($destination=="complete") {
            redirect(base_url('/home/get'));
        } else {
            $this->load->view($destination, $data);
            if($destination<>'thank_you') {
                $this->load->view('templates/exit_footer');
            }
        }
    }

    public function put_image($type, $destination)
    {
        
        $this->load->model('ApplicantModel');
        $this->load->model('StateModel');
        $data['states'] = $this->StateModel->get_states();
        if (!@$_FILES['fileToUpload']['error']) {
            $myRandom = rand(1, 10000);
            ($_SERVER['SERVER_NAME'] == 'localhost' ? $target_dir = "/Applications/XAMPP/xamppfiles/htdocs/nursing/assets/uploads/" :
                ($_SERVER['SERVER_NAME'] == 'webdev.highlands.edu' ? $target_dir = "/var/www/html/nursing/assets/uploads/" :
                    $target_dir = "/var/www/forms/nursing/assets/uploads/" ));
            $target_file = $target_dir . $myRandom . basename($_FILES["fileToUpload"]["name"]);
            $myFile = basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            $image_url = base_url() . "assets/uploads/" . $myRandom . basename($_FILES["fileToUpload"]["name"]);
        } else {
            var_dump($_FILES['fileToUpload']['error']);
        }
            $_POST[$type] = $image_url;
            $applicant=$this->ApplicantModel->update($_SESSION['applicant_id'], $_POST);
        $this->load->view('templates/header');
        if($destination=="edit") {
            redirect(base_url('/home/get'));
        } elseif ($destination=="complete") {
            redirect(base_url('/home/get'));
        } else {
            $this->load->view($destination, $data);
            $this->load->view('templates/exit_footer');
        }

//
    }


    public function save()
    {
        
        $this->load->model('ApplicantModel');
        $applicant = new ApplicantModel();
        $this->load->view('templates/header');
        if($data = $this->ApplicantModel->entry_exists('preferred_email', $_POST['email'])) {
            $this->load->view('exists');
        } else {
           $_SESSION['email'] = $_POST['email'];
           $_SESSION['password'] = $_POST['password'];

            $this->load->view('student');
        }

    }

    public function viewImage($type)
    {
        $this->load->model('ApplicantModel');
        $verify = new ApplicantModel();
        $data['applicant']= $verify->load($_SESSION['applicant_id']);
        $this->load->view('templates/header');
        $this->load->view($type . '_image_view', $data);
    }




}