<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gebruiker_has_lesmoment extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Gebruiker_has_lesmoment_model');
    } 

    /*
     * Listing of gebruiker_has_lesmoment
     */
    function index()
    {
        $data['gebruiker_has_lesmoment'] = $this->Gebruiker_has_lesmoment_model->get_all_gebruiker_has_lesmoment();
        
        $data['_view'] = 'gebruiker_has_lesmoment/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new gebruiker_has_lesmoment
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
            );
            
            $gebruiker_has_lesmoment_id = $this->Gebruiker_has_lesmoment_model->add_gebruiker_has_lesmoment($params);
            redirect('gebruiker_has_lesmoment/index');
        }
        else
        {            
            $data['_view'] = 'gebruiker_has_lesmoment/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a gebruiker_has_lesmoment
     */
    function edit($Gebruiker_idGebruiker)
    {   
        // check if the gebruiker_has_lesmoment exists before trying to edit it
        $data['gebruiker_has_lesmoment'] = $this->Gebruiker_has_lesmoment_model->get_gebruiker_has_lesmoment($Gebruiker_idGebruiker);
        
        if(isset($data['gebruiker_has_lesmoment']['Gebruiker_idGebruiker']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                );

                $this->Gebruiker_has_lesmoment_model->update_gebruiker_has_lesmoment($Gebruiker_idGebruiker,$params);            
                redirect('gebruiker_has_lesmoment/index');
            }
            else
            {
                $data['_view'] = 'gebruiker_has_lesmoment/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The gebruiker_has_lesmoment you are trying to edit does not exist.');
    } 

    /*
     * Deleting gebruiker_has_lesmoment
     */
    function remove($Gebruiker_idGebruiker)
    {
        $gebruiker_has_lesmoment = $this->Gebruiker_has_lesmoment_model->get_gebruiker_has_lesmoment($Gebruiker_idGebruiker);

        // check if the gebruiker_has_lesmoment exists before trying to delete it
        if(isset($gebruiker_has_lesmoment['Gebruiker_idGebruiker']))
        {
            $this->Gebruiker_has_lesmoment_model->delete_gebruiker_has_lesmoment($Gebruiker_idGebruiker);
            redirect('gebruiker_has_lesmoment/index');
        }
        else
            show_error('The gebruiker_has_lesmoment you are trying to delete does not exist.');
    }
    
}
