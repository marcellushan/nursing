<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transcript extends CI_Controller {

    /**
     *Present welcome screen to new and returning applicants
     */

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('create_login');

    }

    /**
     * Upload image of $imagetype
     *
     * Display $nextpage view
     * @param string $type
     * @param string $nextPage
     */
    public function post($nextPage="")
    {
        
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
        }
        $this->load->model('ApplicantModel');
        $modelName = 'TranscriptModel';
        $this->load->model($modelName);
        $image = new $modelName();
        $image->applicant_id = $_SESSION['applicant_id'];
        $image_array = $_POST;
        (@$_FILES["fileToUpload"]["name"] ? $image_array['image'] = $image_url : $image_array['image'] = "No Image");
        $image_array['applicant_id'] = $_SESSION['applicant_id'];
        $image_array['submission_date'] = date('Y-m-d');
        $image->insert_post($image_array);
        if($nextPage) {
            $this->load->view('templates/header');
            $this->load->view($nextPage, $data);
        } else {
            redirect(base_url('transcript/get'));
        }
    }


    public function get($id=0)
    {
        
        $this->load->model('StateModel');
        $data['states'] = $this->StateModel->get_states();
        $this->load->model('transcriptModel');
        $transcript = new transcriptModel();
        $this->load->view('templates/header');
        if(! $id) {
            $data['transcripts'] = $transcript->get_list('applicant_id', $_SESSION['applicant_id']);
            $this->load->view('list_transcripts', $data);
            $this->load->view('templates/footer');
        } else {
            $data['transcript']= $transcript->load($id);
            $this->load->view('edit_transcript', $data);
        }

    }

    public function put($id)
    {
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
        $modelName = 'TranscriptModel';
        $this->load->model($modelName);
        $image_array = $_POST;
        (@$image_url ? $image_array['image'] = $image_url : $image_array['image'] = "No Image");
        $image_array['submission_date'] = date('Y-m-d');
        $image=$this->$modelName->update($id, $image_array);
        redirect(base_url('transcript/get'));

    }

	
	
}