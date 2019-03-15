<?php


class Lokaal extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Lokaal_model');
    }

    /*
     * Listing of lokaal
     */
    function index()
    {
        $data['lokaal'] = $this->Lokaal_model->get_all_lokaal();

        $data['_view'] = 'lokaal/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new lokaal
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
				'naam' => $this->input->post('naam'),
            );

            $lokaal_id = $this->Lokaal_model->add_lokaal($params);
            redirect('lokaal/index');
        }
        else
        {
            $data['_view'] = 'lokaal/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a lokaal
     */
    function edit($id)
    {
        // check if the lokaal exists before trying to edit it
        $data['lokaal'] = $this->Lokaal_model->get_lokaal($id);

        if(isset($data['lokaal']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
					'naam' => $this->input->post('naam'),
                );

                $this->Lokaal_model->update_lokaal($id,$params);
                redirect('lokaal/index');
            }
            else
            {
                $data['_view'] = 'lokaal/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The lokaal you are trying to edit does not exist.');
    }

    /*
     * Deleting lokaal
     */
    function remove($id)
    {
        $lokaal = $this->Lokaal_model->get_lokaal($id);

        // check if the lokaal exists before trying to delete it
        if(isset($lokaal['id']))
        {
            $this->Lokaal_model->delete_lokaal($id);
            redirect('lokaal/index');
        }
        else
            show_error('The lokaal you are trying to delete does not exist.');
    }

}
