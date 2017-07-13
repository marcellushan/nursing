<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class License extends CI_Controller {

    /**
     *Present welcome screen to new and returning applicants
     */

    public function index()
    {
//        $this->load->view('templates/header');
//        $this->load->view('create_login');
        echo "test";
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
                ($_SERVER['SERVER_NAME'] == 'webdev.highlands.edu' ? $target_dir = "/var/www/html/nursing/assets/uploads/" : $target_dir = "/var/www/forms/nursing/assets/uploads/" ));
            $target_file = $target_dir . $myRandom . basename($_FILES["fileToUpload"]["name"]);
            $myFile = basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            $image_url = base_url() . "assets/uploads/" . $myRandom . basename($_FILES["fileToUpload"]["name"]);
        }
        $this->load->model('ApplicantModel');
        $modelName = 'LicenseModel';
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
            redirect(base_url('license/get'));
        }


    }


    /**
     * Retrieves information for the model sent by $type
     *
     * @param string $type Model name
     */
    public function get($id=0)
    {

        $this->load->model('StateModel');
        $data['states'] = $this->StateModel->get_states();
        $this->load->model('licenseModel');
        $license = new licenseModel();
        $this->load->view('templates/header');
        if(! $id) {
            $data['licenses'] = $license->get_list('applicant_id', $_SESSION['applicant_id']);
            $this->load->view('list_licenses', $data);
            $this->load->view('templates/footer');
        } else {
            $data['license']= $license->load($id);
            $this->load->view('edit_license', $data);
        }

    }

    public function put($id)
    {
        if (!@$_FILES['fileToUpload']['error']) {
            $myRandom = rand(1, 10000);
            ($_SERVER['SERVER_NAME'] == 'localhost' ? $target_dir = "/Applications/XAMPP/xamppfiles/htdocs/nursing/assets/uploads/" :
                ($_SERVER['SERVER_NAME'] == 'webdev.highlands.edu' ? $target_dir = "/var/www/html/nursing/assets/uploads/" : $target_dir = "/var/www/forms/nursing/assets/uploads/" ));
            $target_file = $target_dir . $myRandom . basename($_FILES["fileToUpload"]["name"]);
            $myFile = basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            $image_url = base_url() . "assets/uploads/" . $myRandom . basename($_FILES["fileToUpload"]["name"]);

        }
        $modelName = 'LicenseModel';
        $this->load->model($modelName);
        (@$image_url ? $image_array['image'] = $image_url : $image_array['image'] = "No Image");
        echo $image_url;
        $image_array = $_POST;
        $image_array['image'] = $image_url;
        $image_array['submission_date'] = date('Y-m-d');
        $image=$this->$modelName->update($id, $image_array);
        redirect(base_url('license/get/'));

    }

    public function update($id)
    {

        $data['admin'] = $_SESSION['admin'];
        $this->load->model('LicenseModel');
        $license=$this->LicenseModel->update($id, $_POST);
        $license = new LicenseModel();
        $applicant = $license->load($id);
        echo $applicant->applicant_id;
        redirect(base_url('/admin/get/'. $applicant->applicant_id));
    }

    public function verify($id, $applicant_id)
    {

        $data['admin'] = $_SESSION['username'];
        $data['applicant_id'] = $applicant_id;
        $this->load->model('LicenseModel');
        $verify = new LicenseModel();
        $data['license']= $verify->load($id);
        $this->load->view('templates/header');
        $this->load->view('license_verify', $data);
    }

    public function viewImage($id)
    {

//        $data['applicant_id'] = $_SESSION['$applicant_id'];
        $this->load->model('LicenseModel');
        $verify = new LicenseModel();
        $data['license']= $verify->load($id);
        $this->load->view('templates/header');
        $this->load->view('license_image_view', $data);
    }






}