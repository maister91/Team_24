<?php
/**
 * Created by PhpStorm.
 * User: Melih
 * Date: 4/04/2019
 * Time: 13:32
 */


class Klasadmin extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Klas_model');
    }

    /*
     * Listing of klassen
     */
    function index()
    {
        $data['klassen'] = $this->Klas_model->get_all_klassen();

        $data['_view'] = 'klasadmin/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new klas
     */
    function add()
    {
        if(isset($_POST) && count($_POST) > 0)
        {
            $params = array(
                'naam' => $this->input->post('naam'),
                'maxAantal' => $this->input->post('maxAantal'),
            );

            $klas_id = $this->Klas_model->add_klas($params);
            redirect('klasadmin/index');
        }
        else
        {
            $data['_view'] = 'klasadmin/add';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Editing a klas
     */
    function edit($id)
    {
        // check if the klas exists before trying to edit it
        $data['klas'] = $this->Klas_model->get_klas($id);

        if(isset($data['klas']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)
            {
                $params = array(
                    'naam' => $this->input->post('naam'),
                    'maxAantal' => $this->input->post('maxAantal'),
                );

                $this->Klas_model->update_klas($id,$params);
                redirect('klasadmin/index');
            }
            else
            {
                $data['_view'] = 'klasadmin/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The klas you are trying to edit does not exist.');
    }

    /*
     * Deleting klas
     */
    function remove($id)
    {
        $klas = $this->Klas_model->get_klas($id);

        // check if the klas exists before trying to delete it
        if(isset($klas['id']))
        {
            $this->Klas_model->delete_klas($id);
            redirect('klasadmin/index');
        }
        else
            show_error('The klas you are trying to delete does not exist.');
    }

}
