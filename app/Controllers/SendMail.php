<?php
namespace App\Controllers;
use App\Controllers\BaseController;

// use App\Models\FormModel;

class SendMail extends BaseController
{
    public function index() 
	{
        return view('form_view');
    }
    function sendMail()
    {
        $to = $this->request->getVar('mailTo');
        $subject = $this->request->getVar('subject');
        $message = $this->request->getVar('message');

        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('noreply@cashbridge.africa');

        $email->setSubject($subject);
        $email->setMessage($message);
        if ($email->send()) 
        {
            echo 'Email successfully sent';
        } 
        else 
        {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
}
