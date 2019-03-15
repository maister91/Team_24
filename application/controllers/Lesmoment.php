<?php


class Lesmoment extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lesmoment_model');
    }

    /*
     * Listing of lesmoment
     */
    function index()
    {
        $data['lesmoment'] = $this->Lesmoment_model->get_all_lesmoment();

        $data['_view'] = 'lesmoment/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new lesmoment
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
				'klasId' => $this->input->post('klasId'),
				'vakId' => $this->input->post('vakId'),
				'richtingId' => $this->input->post('richtingId'),
				'weekdag' => $this->input->post('weekdag'),
				'lesblok' => $this->input->post('lesblok'),
				'maxAantal' => $this->input->post('maxAantal'),
            );

            $lesmoment_id = $this->Lesmoment_model->add_lesmoment($params);
            redirect('lesmoment/index');
        }
        else
        {
            $data['_view'] = 'lesmoment/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a lesmoment
     */
    function edit($id)
    {
        // check if the lesmoment exists before trying to edit it
        $data['lesmoment'] = $this->Lesmoment_model->get_lesmoment($id);

        if(isset($data['lesmoment']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'klasId' => $this->input->post('klasId'),
					'vakId' => $this->input->post('vakId'),
					'richtingId' => $this->input->post('richtingId'),
					'weekdag' => $this->input->post('weekdag'),
					'lesblok' => $this->input->post('lesblok'),
					'maxAantal' => $this->input->post('maxAantal'),
                );

                $this->Lesmoment_model->update_lesmoment($id,$params);
                redirect('lesmoment/index');
            }
            else
            {
                $data['_view'] = 'lesmoment/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The lesmoment you are trying to edit does not exist.');
    }

    /*
     * Deleting lesmoment
     */
    function remove($id)
    {
        $lesmoment = $this->Lesmoment_model->get_lesmoment($id);

        // check if the lesmoment exists before trying to delete it
        if(isset($lesmoment['id']))
        {
            $this->Lesmoment_model->delete_lesmoment($id);
            redirect('lesmoment/index');
        }
        else
            show_error('The lesmoment you are trying to delete does not exist.');
    }

}
