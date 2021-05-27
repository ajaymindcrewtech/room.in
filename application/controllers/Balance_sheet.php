<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Balance_sheet extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $emp = $this->Employee_model->get_all();
        $emp = $this->Employee_model->get_all();

        $data = array(
            'emp' => $emp
        );

          $data['content'] = 'balance_sheet/sheet';
        $this->load->view('common/master', $data);    
            
    }

    
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "building.xls";
        $judul = "building";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Customer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }


    

}

/* End of file Building.php */
/* Location: ./application/controllers/Building.php */
/* Please DO NOT modify this information : */
/* Generated on Codeigniter2020-02-06 05:27:19 */
