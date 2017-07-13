<?php

class MailModel extends CI_Model {

    public function submit($email, $first, $last)
    {
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from('webmaster@highlands.edu', 'Georgia Highlands College');
        $this->email->to($email);
//        $this->email->to('mhannah@highlands.edu');
        $body = "<h1>Hello " . $first ." " . $last . "</h1>";
        $body = $body . "<h2>Thank you for your interest in the Nursing Program at Georgia Highlands College.</h2>";
        $body = $body . "<h2>Georgia Highlands College has received your Nursing application and will be in contact with you once it has been reviewed</h2>";
        $body = $body . "<h2>Feel free to use this <a href='" . base_url('/home/display/login') . "'>link</a> to check the status of your application</h2>";
        $this->email->subject('Your Application to the Georgia Highlands Nursing program has been received');
        $this->email->message($body);

        $this->email->send();
    }

    public function received($email, $first, $last)
    {
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from('webmaster@highlands.edu', 'Georgia Highlands College');
        $this->email->to('mhannah@highlands.edu');
//        $this->email->to('bba@highlands.edu');
//        $this->email->cc('mhannah@highlands.edu');
        $body = "<h1>" . $first ." " . $last . "</h1>";
        $body = $body . "<h2>Has submitted an application to the Nursing Program at Georgia Highlands College.</h2>";
//        $body = $body . "<h2>Your application has been received and you will be notified as soon as a decision is made.</h2>";
        $body = $body . "<h2>Click <a href='" . base_url('admin/index/submitted') . "'>here</a>  to view the application</h2>";
        $this->email->subject('An Application to the Georgia Highlands Nursing program has been submitted');
        $this->email->message($body);

        $this->email->send();
    }

    public function complete($email, $first, $last)
    {
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from('webmaster@highlands.edu', 'Georgia Highlands College');
        $this->email->to($email);
//        $this->email->to('mhannah@highlands.edu');
        $body = "<h1>Hello " . $first ." " . $last . "</h1>";
        $body = $body . "<h2>Thank you for your interest in the Nursing Program at Georgia Highlands College.</h2>";
        $body = $body . "<h2>Your application has been reviewed and all documents have been verified.</h2>";
        $body = $body . "<h2>Feel free to use this <a href='" . base_url('/home/display/login') . "'>link</a> to check the status of your application</h2>";
        $this->email->subject('All documentation for your Georgia Highlands Nursing Program application has been received');
        $this->email->message($body);

        $this->email->send();
    }

    public function funds($email, $first, $last)
    {
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from('webmaster@highlands.edu', 'Georgia Highlands College');
        $this->email->to($email);
//        $this->email->to('mhannah@highlands.edu');
        $body = "<h1>Hello " . $first ." " . $last . "</h1>";
        $body = $body . "<h2>Thank you for your interest in the Nursing Program at Georgia Highlands College.</h2>";
        $body = $body . "<h2>Your Nursing application fee of $30 has been received by the Georgia Highlands College.</h2>";
        $body = $body . "<h2>Feel free to use this <a href='" . base_url('/home/display/login') . "'>link</a> to check the status of your application</h2>";
        $this->email->subject('Your Application fee to the Georgia Highlands Nursing Program has been received');
        $this->email->message($body);

        $this->email->send();
    }

    public function comment($email, $first, $last, $comment)
    {
        $this->load->library('email');
        $config['mailtype'] = 'html';
        $this->email->initialize($config);

        $this->email->from('webmaster@highlands.edu', 'Georgia Highlands College');
        $this->email->to($email);
//        $this->email->to('mhannah@highlands.edu');
        $body = "<h1>Hello " . $first ." " . $last . "</h1>";
        $body = $body . "<h2>Thank you for your interest in the Nursing Program at Georgia Highlands College.</h2>";
        $body = $body . "<h2>Your Nursing application is under review and the following info needs your attention:</h2>";
        $body = $body . "<h2>" . $comment . "</h2>";
        $body = $body . "<h2>Please login to the <a href='" . base_url('/home/display/login') . "'>Online application</a> to take appropriate action</h2>";
        $this->email->subject('Information needed regarding your GHC Nursing Program Application');
        $this->email->message($body);

        $this->email->send();
    }

}