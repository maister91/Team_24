<?php

/**
 * @property Template $template
 * @property Mail_model $mail_model
 */

class Mail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mail_model');
    }

    /*
     * Listing of mail
     */
    function index()
    {
        $data['mail'] = $this->mail_model->get_all_mail();

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

            $mail_id = $this->mail_model->add_mail($params);
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
        $data['mail'] = $this->mail_model->get_mail($id);

        if (isset($data['mail']['id'])) {
            if (isset($_POST) && count($_POST)>0) {
                $params = [
                    'onderwerp'    => $this->input->post('onderwerp'),
                    'beschrijving' => $this->input->post('beschrijving'),
                ];

                $this->mail_model->update_mail($id, $params);
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
        $mail = $this->mail_model->get_mail($id);

        // check if the mail exists before trying to delete it
        if (isset($mail['id'])) {
            $this->mail_model->delete_mail($id);
            redirect('mail/index');
        } else
            show_error('The mail you are trying to delete does not exist.');
    }

}
