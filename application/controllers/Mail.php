<?php

/**
 * @class Mail
 * @brief Controller-klasse voor Mail
 *
 * Controller-klasse met alle methodes voor de mails
 */

class Mail extends CI_Controller
{

    /* @var Mail_model */
    public $Mail_model;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mail_model');
    }

    /*
     * Listing of mail
     */
    function index()
    {
        $data['mail'] = $this->Mail_model->get_all_mail();

        $data['_view'] = 'mail/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new mail
     */
    function add()
    {
        if (isset($_POST) && count($_POST)>0) {
            $params = [
                'onderwerp'    => $this->input->post('onderwerp'),
                'beschrijving' => $this->input->post('beschrijving'),
            ];

            $mail_id = $this->Mail_model->add_mail($params);
            redirect('mail/index');
        } else {
            $data['_view'] = 'mail/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a mail
     */
    function edit($id)
    {
        // check if the mail exists before trying to edit it
        $data['mail'] = $this->Mail_model->get_mail($id);

        if (isset($data['mail']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'onderwerp'    => $this->input->post('onderwerp'),
                    'beschrijving' => $this->input->post('beschrijving'),
                ];

                $this->Mail_model->update_mail($id, $params);
                redirect('mail/index');
            } else {
                $data['_view'] = 'mail/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The mail you are trying to edit does not exist.');
    }

    /*
     * Deleting mail
     */
    function remove($id)
    {
        $mail = $this->Mail_model->get_mail($id);

        // check if the mail exists before trying to delete it
        if (isset($mail['id'])) {
            $this->Mail_model->delete_mail($id);
            redirect('mail/index');
        } else
            show_error('The mail you are trying to delete does not exist.');
    }

}
