<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//defined('BASEPATH') OR exit('No direct script access allowed');
class Dsoiapi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('api/Dsoiapi_model');
        $this->load->model('Dsoi_product_model');
        $this->load->model('Dsoi_category_model');
        $this->load->model('Member_model');
        $this->load->model('Dsoi_order_details_model');
        $this->load->model('Dsoi_order_delivered_model');
        $this->load->model('Dsoi_order_model');
        $this->load->model('Dsoi_transaction_model');
         $this->load->model('Dsoi_event_product_model');
         $this->load->model('Dsoi_menu_model');
         
        $this->load->library('form_validation');
        $this->load->library('ciqrcode');
    }

    public function get_attendence() {
        $outputarr = array();
        $id = $this->input->post('member_rfid');
        $date = date('Y-m-d');
        $attendance = $this->Dsoiapi_model->get_attendance_by_date($id, $date);
//        $attendence = $this->Dsoiapi_model->get_attendence($id, $date);
        if ($attendance) {
            $outputarr['Status'] = 1;
            $outputarr['Msg'] = "login Successfully";
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = "Attendence Not Available";
        }
        echo json_encode($outputarr);
    }

 public function mem_login() {
        $outputarr = array();
		$login_type = $this->input->post('login_type');
		if($login_type==1){
                $user = $this->input->post('user');
                $pass = $this->input->post('pass');
               // $row = $this->Dsoiapi_model->login($user, $pass);
			    $check_status = $this->Dsoiapi_model->get_mem_details_mob($user);
        if ($check_status->member_pass_status == 0) {
            $row = $this->Dsoiapi_model->login_2($user, $pass);
        } else {
            $row = $this->Dsoiapi_model->login($user, $pass);
        }
		}else{
		$member_mpin=$this->input->post('member_mpin');
		$member_id=$this->input->post('member_id');
		$row = $this->Dsoiapi_model->login_pin($member_mpin, $member_id);
		
		}
        $event_id = $this->check_event();
        if ($row > '0') {
            $m_id=$row['member_id'];
            $details1 = $this->check_bal($m_id);
            $bal = $details1['card_balance'];
            $outputarr['Status'] = 1;
            $outputarr['Msg'] = "login Successfully";
            $outputarr['main_bal'] = $bal;
            $outputarr['event_id'] = $event_id;
            $outputarr['Record'] = $row;
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = "Invalid User";
        }
        echo json_encode($outputarr);
    }


    public function staff_login() {
        $data = array(
                'posu_usernmae' => $this->input->post('user'),
                'posu_pass' => $this->input->post('pass')
            );
          $row = $this->Dsoiapi_model->posLogin($data);
          $event_id = $this->check_event();
          if ($row > '0') {
            $outputarr['Status'] = 1;
            $outputarr['Msg'] = "login Successfully";
            $outputarr['event_id'] = $event_id;
            $outputarr['Record'] = $row;
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = "Invalid User";
        }
        echo json_encode($outputarr);
    }
    
    
    public function product_cat() {
        $outputarr = array();
        $cid = $this->input->post('cid');
        $curr_date = date('Y-m-d');
        $get = $this->Dsoi_event_product_model->get_curr_date($curr_date);
        if ($get) 
            {
            $event_id = $get->ep_eventid;
            } 
        else
            {
            $event_id = 1;
            }

        if ($cid == '2') {
            $row = $this->Dsoiapi_model->get_prd_event_1($event_id, $cid);
            if ($row) {
                foreach ($row as $value) {
                    $data[] = array(
                        'prd_id' => $value['ep_prdid'],
                        'prd_name' => $value['ep_prd_name'],
                        'prd_price' => $this->Dsoi_product_model->get_by_id($value['ep_prdid'])->prd_pagprice,
                        'prd_stock' => $this->Dsoi_product_model->get_by_id($value['ep_prdid'])->prd_stock_pag,
                        'prd_desc' => $this->Dsoi_product_model->get_by_id($value['ep_prdid'])->prd_desc,
                        'prd_type' => $this->Dsoi_category_model->get_by_id($value['ep_subcatid'])->cat_title,
                        
                    );
                }
                $outputarr['Status'] = 1;
                $outputarr['Record'] = $data;
            } else {
                $prd = $this->Dsoiapi_model->get_liqour_product($cid);
                if ($prd) {
                    foreach ($prd as $value) {
                        $data[] = array(
                            'prd_id' => $value['prd_id'],
                            'prd_name' => $value['prd_title'],
                            'prd_price' => $value['prd_pagprice'],
                            'prd_stock' => $value['prd_stock_pag'],
                            'prd_desc' => $this->Dsoi_product_model->get_by_id($value['prd_id'])->prd_desc,
                            'prd_type' => $this->Dsoi_category_model->get_by_id($value['prd_subcat'])->cat_title,
                            
                        );
//                    echo json_encode($data);
                    }
                    $outputarr['Status'] = 1;
                    $outputarr['Record'] = $data;
                } else {
                    $outputarr['Status'] = 0;
                    $outputarr['Msg'] = "Product Not Found";
                }
            }
        } 
        
        else if ($cid == '1') {
            $row = $this->Dsoiapi_model->get_prd_event_1($event_id, $cid);
            if ($row) {
                foreach ($row as $value) {
                    $data[] = array(
                        'prd_id' => $value['ep_prdid'],
                        'prd_name' => $value['ep_prd_name'],
                        'prd_price' => $value['sales_price'],
                        'prd_stock' => $value['ep_stock'],
                        'prd_desc' => 'NA',
                        'prd_type' => $this->Dsoi_category_model->get_by_id($value['ep_subcatid'])->cat_title,
                    );
                }
                $outputarr['Status'] = 1;
                $outputarr['Record'] = $data;
            } else {
                $prd = $this->Dsoi_menu_model->get_all();
                if ($prd) {
                    foreach ($prd as $value) {
                        $data[] = array(
                        'prd_id' => $value->menu_id,
                        'prd_name' => $value->menu_title,
                        'prd_price' => $value->menu_sales_price,
                        'prd_pagprice' => $value->menu_sales_price,
                        'prd_stock' => 'NA',
                        'prd_type' => $this->Dsoi_category_model->get_by_id($value->menu_subcat)->cat_title,
                        'prd_desc' => $value->menu_desc,
                        
                        );
                        
//                    echo json_encode($data);
                    }
                    $outputarr['Status'] = 1;
                    $outputarr['Record'] = $data;
                } else {
                    $outputarr['Status'] = 0;
                    $outputarr['Msg'] = "Product Not Found";
                }
            }
        } 
        else {

            $row = $this->Dsoiapi_model->get_prd_event_1($event_id, $cid);
            if ($row) {
                foreach ($row as $value) {
                    $data[] = array(
                        'prd_id' => $value['ep_prdid'],
                        'prd_name' => $value['ep_prd_name'],
                        'prd_price' => $value['sales_price'],
                        'prd_stock' => $value['ep_stock'],
                        'prd_type' => $this->Dsoi_category_model->get_by_id($value['ep_subcatid'])->cat_title,
                        'prd_desc' => $this->Dsoi_product_model->get_by_id($value['ep_prdid'])->prd_desc,
                    );
                }
                $outputarr['Status'] = 1;
                $outputarr['Record'] = $data;
            } else {
                $prd = $this->Dsoiapi_model->get_all_product($cid);
                if ($prd) {
                    foreach ($prd as $value) {
                        $data[] = array(
                            'prd_id' => $value['prd_id'],
                            'prd_name' => $value['prd_title'],
                            'prd_price' => $value['prd_salesprice'],
                            'prd_stock' => $value['prd_stck_qty'],
                            'prd_type' => $this->Dsoi_category_model->get_by_id($value['prd_subcat'])->cat_title,
                            'prd_desc' => $this->Dsoi_product_model->get_by_id($value['prd_id'])->prd_desc,
                        );
                    }
                    $outputarr['Status'] = 1;
                    $outputarr['Record'] = $data;
                } else {
                    $outputarr['Status'] = 0;
                    $outputarr['Msg'] = "Product Not Found";
                }
            }
        }
        echo json_encode($outputarr);
    }

    public function sub_member() {
        $outputarr = array();
        $code = $this->input->post('member_code');
        $sub_mem = $this->Dsoiapi_model->get_mem_code($code);

        if ($sub_mem) {
            $outputarr['Status'] = 1;
            $outputarr['Msg'] = "Successful get sub members";
            $outputarr['Record'] = $sub_mem;
        } else {

            $outputarr['Status'] = 0;
            $outputarr['Msg'] = "Sub members not available";
        }
        echo json_encode($outputarr);
    }

    public function order() {
        $outputarr = array();
        $cid = $this->input->post('cid');
        $date = $this->input->post('date');
        $pid = $this->input->post('prd_id');
        $p_qty = $this->input->post('prd_qty');

//       ************For liqour**************
        if ($cid == 2) {
            $prd_stock = $this->Dsoiapi_model->get_prd_by_id($pid);
            $avaible_stock = $prd_stock->prd_stock_pag;
            if ($avaible_stock > $p_qty) {

                $outputarr['Status'] = 1;
                $outputarr['Msg'] = "liqour Avaialbe";
            } else {
                $outputarr['Status'] = 0;
                $outputarr['Msg'] = "Liqour Out of Stock";
            }
        }
//       ************For liqour**************    
        else {
            $row = $this->Dsoiapi_model->get_prd_event($date, $cid);
            if ($row) {
                $prd_stock = $this->Dsoiapi_model->get_prd_event_id($pid);
                $avaible_stock = $prd_stock->ep_stock;
                if ($prd_stock) {
                    $outputarr['Status'] = 1;
                    $outputarr['Msg'] = "Product available in event";
                }
            } else {
                $outputarr['Status'] = 2;
                $outputarr['Msg'] = "Make Order(not available in event)";
            }
        }
        echo json_encode($outputarr);
    }

    public function order_1() {
        $mid = $this->input->post('member_id');
        $date = $this->input->post('date');
        $date = $this->input->post('cat_id');
        $json = '{"liqour": [{"cat_id": "1","prd_id": "3","prd_qty": "2"},{"cat_id": "1","prd_id": "2","prd_qty": "2"}]}';
        $data = json_decode($json);

        foreach ($data->Orders as $item) {
            
        }
    }

    public function make_order() {

        $member_id = $this->input->post('member_id');
        $event_id = $this->input->post('event_id');
        $order_array = $this->input->post('order');
        $avail_stock = $this->check_stock($event_id,$order_array);
//        print_r($avail_stock['not avail']);
        if ($avail_stock['Status'] == 0) {

            $outputarr['Status'] = 0;
//        $outputarr['Product'] = $avail_stock;
            $outputarr['Msg'] = "Order Not Placed";

            $outputarr['order'] = $avail_stock;
//        echo json_encode($outputarr);
        } else {
            $order_amt = $this->cal_total($event_id, $order_array);
            $member_details = $this->Dsoiapi_model->get_mem_details($member_id);
            $details = $this->check_bal($member_id);
            $m_id = $details['main_member'];
            $bal = $details['card_balance'];
            if ($order_amt > $bal) {
                $outputarr['Status'] = 0;
                $outputarr['Balance'] = $bal;
                $outputarr['Msg'] = "Insufficient Balance";
            } else {
//        $update_bal = $bal-$order_amt;
                $data = array(
                    'member_id' => $m_id,
                    'member_balance' => $order_amt,
                );
                $this->Dsoiapi_model->deduct_bal($data);

                $this->deduct_stock($event_id, $order_array);
//               *******************insert into order******************************
                $orderrand=rand(00000000, 99999999);
                $data = array(
                    'order_memberid' => $member_id,
                    'order_membercode' => $member_details->member_code,
                    'order_eventid' => $event_id,
                    'order_price' => $order_amt,
                    'order_code' => $orderrand,
                    'order_datetime' => date('Y-m-d H:m:i'),
                    'order_staus' => 1
                );
                
                //------------- Qr setup=====
		
		   $params['level'] = 'H';
		   $params['size'] = 10;
		   $qr_image=$orderrand.'.png';
		   $params['data'] = $orderrand;
		   $params['savename'] =FCPATH."qr_image/".$qr_image;
		   $this->ciqrcode->generate($params);
		   
		//----------------------------------------------------
                $this->Dsoi_order_model->insert($data);
                $insert_id = $this->db->insert_id();
//                *******************insert into order and return last id******************************   
                
                $order = $this->Dsoi_order_model->get_by_id($insert_id);
                $qr= $order->order_code;
//                $qr = $this->Dsoi_order_model->get_by_id($order_code)->order_code;
//                base_url('qr_image/'.$qr.'.png')
                
//                *******************insert into transaction******************************
                $data = array(
		'tran_membercode' => $member_details->member_code,
		'tran_rfid' => $member_details->member_rfid,
		'tran_eventid' => $event_id,
		'tran_orderid' => $insert_id,
		'tran_type' => 1,
		'tran_amount' => $order_amt,
		'tran_desc' => 'POS Order with Dsoi App',
		'tran_datetime' => date('Y-m-d H:m:i'),
                'tran_date' => date('Y-m-d'),
		'tran_status' => 1,
                );

                $this->Dsoi_transaction_model->insert($data);
                
//                *********************insert into transaction****************************
                $i = 0;
                $records = json_decode($order_array);
                $category = array('food', 'liqour', 'snacks', 'sweet_dish');
                foreach ($category as $cat) {
                    foreach ($records->$cat as $value) {
                        $data = array(
                            'dorder_code' => $insert_id,
                            'dorder_cat_id' => $value->cat_id,
                            'dorder_prdid' => $value->prd_id,
                            'dorder_name' => $value->prd_name,
                            'dorder_qty' => $value->prd_qty,
                            'dorder_rest' => $value->prd_qty,
                            'dorder_prd_price' => $value->prd_price,
                            'dorder_lastupdate' => date('Y-m-d H:m:i'),
                            'dorder_status' => 0
                        );
                        $this->Dsoi_order_details_model->insert($data);
                    }
                }
                $details1 = $this->check_bal($member_id);
                $bal = $details1['card_balance'];
                $outputarr['QR_Code_path'] = base_url('qr_image/'.$qr.'.png');
                $outputarr['QR_Code'] = $qr;
                $outputarr['Order_id'] =$insert_id;
                $outputarr['Balance'] =$bal;
                $outputarr['Status'] = 1;
                $outputarr['Msg'] = "Order Placed";
            }
        }
        echo json_encode($outputarr);
    }

    public function test() {
        $order_array1 = '{"Orders": [{"cat_id": "1","prd_id": "3","prd_qty": "2"},{"cat_id": "1","prd_id": "4","prd_qty": "2"}]}';
        
        $order_array = $this->input->post('order');
        echo $total = $this->cal_total($order_array);
    }

    public function test1() {
        $order_array = '{"Orders": [{"cat_id": "1","prd_id": "3","prd_qty": "5000"},{"cat_id": "1","prd_id": "9","prd_qty": "2"}],
    "food": [{"cat_id": "1","prd_id": "3","prd_qty": "200"},{"cat_id": "1","prd_id": "9","prd_qty": "2"}],
    "liqour": [{"cat_id": "1","prd_id": "3","prd_qty": "5000"},{"cat_id": "1","prd_id": "9","prd_qty": "2"}],
    "snack": [{"cat_id": "1","prd_id": "3","prd_qty": "5000"},{"cat_id": "1","prd_id": "9","prd_qty": "2"}]
    }';
        $records = json_decode($order_array, TRUE);
        $records1 = json_decode($order_array, TRUE);
        $category = array('food', 'liqour', 'snack');

        foreach ($category as $value) {

            if ($records[$value] == 'liqour') {

                foreach ($records[$value] as $value1) {
                    $liqour[] = $value1;
                }
            } elseif ($records[$value] == 'food') {

                foreach ($records[$value] as $value1) {
                    $food[] = $value1;
                }
            }
        }

        $foo = $this->check_stock(json_encode($food));
        echo json_encode($foo);
    }

    public function check_category() {

        $order_array = '{"Orders": [{"cat_id": "1","prd_id": "3","prd_qty": "5000"},{"cat_id": "1","prd_id": "9","prd_qty": "2"}],
    "food": [{"cat_id": "1","prd_id": "3","prd_qty": "5000"},{"cat_id": "1","prd_id": "9","prd_qty": "2"}],
    "liqour": [{"cat_id": "1","prd_id": "3","prd_qty": "5000"},{"cat_id": "1","prd_id": "9","prd_qty": "2"}],
    "snack": [{"cat_id": "1","prd_id": "3","prd_qty": "5000"},{"cat_id": "1","prd_id": "9","prd_qty": "2"}],
    "sweet_dish": []
    }';
        $records = json_decode($order_array);
        $category = array('food', 'liqour');
        foreach ($category as $value) {
            if ($records->$value) {

                $avail_stock = $this->check_stock($value);
                echo $avail_stock;
            }
        }
    }

    public function cal_total($event_id, $order_array) {
        $total_gross = 0;
        $gross = 0;
        $records = json_decode($order_array);
        if ($event_id == 1 || $event_id == 2) {
            $category = array('liqour');
            foreach ($category as $cat) {

                foreach ($records->$cat as $value) {
                    $price = $this->Dsoi_product_model->get_by_id($value->prd_id);
                    $unit_price = ($price->prd_pagprice);
                    $total = $unit_price * $value->prd_qty;
                    $gross = $gross + $total;
                }
            }
            $category1 = array('snacks', 'sweet_dish');
            foreach ($category1 as $cat) {

                foreach ($records->$cat as $value) {
                    $price = $this->Dsoi_product_model->get_by_id($value->prd_id);
                    $unit_price = $price->prd_salesprice;
                    $total = $unit_price * $value->prd_qty;
                    $gross = $gross + $total;
                }
            }
            $category2 = array('food');
            foreach ($category2 as $cat) {

                foreach ($records->$cat as $value) {
                    $price = $this->Dsoi_menu_model->get_by_id($value->prd_id);
                    $unit_price = $price->menu_sales_price;	
                    $total = $unit_price * $value->prd_qty;
                    $gross = $gross + $total;
                }
            }
            
        } else {
            $category = array('liqour');
            foreach ($category as $cat) {

                foreach ($records->$cat as $value) {
                    $price = $this->Dsoi_product_model->get_by_id($value->prd_id);
                    $unit_price = ($price->prd_pagprice);
                    $total = $unit_price * $value->prd_qty;
                    $gross = $gross + $total;
                }
            }
            $category1 = array('food', 'snacks', 'sweet_dish');
            foreach ($category1 as $cat) {

                foreach ($records->$cat as $value) {

                    $price = $this->Dsoiapi_model->get_prd_by($event_id, $value->prd_id);
                    $unit_price = ($price->sales_price);
                    $total = $unit_price * $value->prd_qty;
                    $gross = $gross + $total;
                }
            }
        }
        return $gross;
//          echo $gross;
    }

    public function check_stock_old($array) {
        $outputarr = array();
        $food = array();
        $records = json_decode($array, TRUE);
        $records1 = json_decode($array, TRUE);
        $i = 0;
        $category = array('food', 'liqour', 'snacks', 'sweet_dish');
        foreach ($category as $value) {

            if ($records[$value]) {
                foreach ($records[$value] as $value1) {
                    $food[] = $value1;
                }
            }
        }

        $records1 = json_decode(json_encode($food));

        foreach ($records1 as $value) {
            $stock = $this->Dsoi_product_model->get_by_id($value->prd_id);
            $avail_stock = ($stock->prd_stock_pag);
            if ($value->prd_qty > $avail_stock) {
                $outputarr1['Status'] = 0;
                $prd[] = $stock->prd_id;
                $outputarr1['not avail'] = $prd;
                $i++;
            } else {
                $outputarr['Status'] = 1;
                $outputarr['Msg'] = "All product availble";
            }
        }

        if ($i > 0) {
            return $outputarr1;
//         echo json_encode($outputarr1);
        } else {
            return $outputarr;
//        echo json_encode($outputarr);
        }
    }

    public function check_event() {
        $curr_date = date('Y-m-d');
        $get = $this->Dsoi_event_product_model->get_curr_date($curr_date);
        if ($get) {
            $event_id = $get->ep_eventid;
        } else {
            if (date('N') == 6 || date('N') == 7) {
                $event_id = 2;
            } else {
                $event_id = 1;
            }
        }
//        echo $event_id;
        return $event_id;
    }

    public function check_attendance($m_id) {
        $curr_date = date('Y-m-d');
        $attendance = $this->Dsoiapi_model->get_attendance_by_date($m_id, $curr_date);
        if ($attendance) {
            return 1;
        } else {
            return 0;
        }
    }

    public function check_avail() {
        $prd_id = $this->input->post('prd_id');
        $stock = $this->Dsoi_product_model->get_by_id($prd_id);
        $avail_stock = ($stock->prd_stock_pag);
        $price = ($stock->prd_pagprice);
        $outputarr['Stock'] = $avail_stock;
        $outputarr['price'] = $price;
        echo json_encode($outputarr);
    }

    public function check_bal($m_id) {
//        $m_id = $this->input->post('m_id');
        $member = $this->Member_model->get($m_id);
        $member_type = $this->Member_model->get_type($member['member_type']);
        if ($member_type['member_type'] == 0) {
            $main_member = $this->Member_model->get($member['member_id']);
        } else {
            $main_member = $this->Member_model->get($member_type['member_type']);
        }

        $outputarr['card_balance'] = $main_member['member_balance'];
        $outputarr['main_member'] = $main_member['member_id'];
//        echo json_encode($outputarr);
        return $outputarr;
    }
    
    public function check_main($m_id) {
//        $m_id = $this->input->post('m_id');
        $member = $this->Member_model->get($m_id);
        $member_type = $this->Member_model->get_type($member['member_type']);
        if ($member_type['member_type'] == 0) {
            $main_member = $this->Member_model->get($member['member_id']);
        } else {
            $main_member = $this->Member_model->get($member_type['member_type']);
        }

        $outputarr['card_balance'] = $main_member['member_balance'];
        $outputarr['main_member'] = $main_member['member_id'];
//        echo json_encode($outputarr);
        return $outputarr;
    }

    public function check_stock($event_id, $order_array) {
        $i = 0;
        $records = json_decode($order_array, TRUE);
        if ($event_id == 1 || $event_id == 2) {

            $category = array('food');
            foreach ($category as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $data = array(
                            'cat_id' => $value1['cat_id'],
                            'prd_id' => $value1['prd_id'],
                            'prd_qty' => $value1['prd_qty'],
                            'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                            'stock' => 'A',
                        );
                        $data1[] = $data;
                    }
                    $output['food'] = $data1;
                } else {
                    $output['food'] = array();
                }
            }

            $liqour = array('liqour');
            foreach ($liqour as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoi_product_model->get_by_id($value1['prd_id']);
                        $avail_stock = ($stock->prd_stock_pag);
                        if ($value1['prd_qty'] < $avail_stock) {
                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'A',
                            );
                            $data2[] = $data;
                        } else {
                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'NA',
                            );
                            $i++;
                            $data2[] = $data;
                        }
                    }
                    $output['liqour'] = $data2;
                } else {
                    $output['liqour'] = array();
                }
            }
            $snacks = array('snacks');
            foreach ($snacks as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $data = array(
                            'cat_id' => $value1['cat_id'],
                            'prd_id' => $value1['prd_id'],
                            'prd_qty' => $value1['prd_qty'],
                            'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                            'stock' => 'A',
                        );
                        $data3[] = $data;
                    }
                    $output['snacks'] = $data3;
                } else {
                    $output['snacks'] = array();
                }
            }

            $sweet_dish = array('sweet_dish');
            foreach ($sweet_dish as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $data = array(
                            'cat_id' => $value1['cat_id'],
                            'prd_id' => $value1['prd_id'],
                            'prd_qty' => $value1['prd_qty'],
                            'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                            'stock' => 'A',
                        );
                        $data4[] = $data;
                    }
                    $output['sweet_dish'] = $data4;
                } else {
                    $output['sweet_dish'] = array();
                }
            }
        } else {

            $category = array('food');
            foreach ($category as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoiapi_model->get_prd_by($event_id, $value1['prd_id']);
                        $avail_stock = ($stock->ep_stock);
                        if ($value1['prd_qty'] < $avail_stock) {
                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'A',
                            );
                            $data1[] = $data;
                        } else {
                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'NA',
                            );
                            $i++;
                            $data1[] = $data;
                        }
                    }
                    $output['food'] = $data1;
                } else {
                    $output['food'] = array();
                }
            }

            $liqour = array('liqour');
            foreach ($liqour as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoi_product_model->get_by_id($value1['prd_id']);
                        $avail_stock = ($stock->prd_stock_pag);
                        if ($value1['prd_qty'] < $avail_stock) {
                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'A',
                            );
                            $data2[] = $data;
                        } else {
                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'NA',
                            );
                            $i++;
                            $data2[] = $data;
                        }
                    }
                    $output['liqour'] = $data2;
                } else {
                    $output['liqour'] = array();
                }
            }
            $snacks = array('snacks');
            foreach ($snacks as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoiapi_model->get_prd_by($event_id, $value1['prd_id']);
                        $avail_stock = ($stock->ep_stock);
                        if ($value1['prd_qty'] < $avail_stock) {
                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'A',
                            );
                            $data3[] = $data;
                        } else {

                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'NA',
                            );
                            $i++;
                            $data3[] = $data;
                        }
                    }
                    $output['snacks'] = $data3;
                } else {
                    $output['snacks'] = array();
                }
            }

            $sweet_dish = array('sweet_dish');
            foreach ($sweet_dish as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoiapi_model->get_prd_by($event_id, $value1['prd_id']);
                        $avail_stock = ($stock->ep_stock);
                        if ($value1['prd_qty'] < $avail_stock) {

                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'A',
                            );
                            $data4[] = $data;
                        } else {
                            $data = array(
                                'cat_id' => $value1['cat_id'],
                                'prd_id' => $value1['prd_id'],
                                'prd_qty' => $value1['prd_qty'],
                                'prd_name' => $value1['prd_name'],
                            'prd_price' => $value1['prd_price'],
                            'prd_desc' => $value1['prd_desc'],
                                'stock' => 'NA',
                            );
                            $i++;
                            $data4[] = $data;
                        }
                    }
                    $output['sweet_dish'] = $data4;
                } else {
                    $output['sweet_dish'] = array();
                }
            }
        }
        if ($i > 0) {
            $output['Status'] = 0;
            return $output;
        } else {
            $output['Status'] = 1;
            return $output;
        }
    }

    public function deduct_stock($event_id, $order_array) {

        $records = json_decode($order_array, TRUE);

        if ($event_id == 1 || $event_id == 2) {

            $liqour = array('liqour');
            foreach ($liqour as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoi_product_model->get_by_id($value1['prd_id']);
                        $avail_stock = ($stock->prd_stock_pag);
                        $data = array(
                            'cat_id' => $value1['cat_id'],
                            'prd_id' => $value1['prd_id'],
                            'prd_qty' => $value1['prd_qty'],
                        );
                        $this->Dsoiapi_model->deduct_stock1($data);
                    }
                }
            }

        } else {

            $liqour = array('liqour');
            foreach ($liqour as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoi_product_model->get_by_id($value1['prd_id']);
                        $avail_stock = ($stock->prd_stock_pag);
                        $data = array(
                            'cat_id' => $value1['cat_id'],
                            'prd_id' => $value1['prd_id'],
                            'prd_qty' => $value1['prd_qty'],
                        );
                        $this->Dsoiapi_model->deduct_stock1($data);
                    }
                }
            }


            $food = array('food');
            foreach ($food as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoiapi_model->get_prd_by($event_id, $value1['prd_id']);
                        $ep_id = ($stock->ep_id);
                        $data = array(
                            'ep_id' => $ep_id,
                            'prd_id' => $value1['prd_id'],
                            'prd_qty' => $value1['prd_qty'],
                        );
                        $this->Dsoiapi_model->deduct_stock($data);
                    }
                }
            }
            $snacks = array('snacks');
            foreach ($snacks as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoiapi_model->get_prd_by($event_id, $value1['prd_id']);
                        $ep_id = ($stock->ep_id);
                        $data = array(
                            'ep_id' => $ep_id,
                            'prd_id' => $value1['prd_id'],
                            'prd_qty' => $value1['prd_qty'],
                        );
                        $this->Dsoiapi_model->deduct_stock($data);
                    }
                }
            }
            $sweet_dish = array('sweet_dish');
            foreach ($sweet_dish as $value) {
                if ($records[$value]) {
                    foreach ($records[$value] as $value1) {
                        $stock = $this->Dsoiapi_model->get_prd_by($event_id, $value1['prd_id']);
                        $ep_id = ($stock->ep_id);
                        $data = array(
                            'ep_id' => $ep_id,
                            'prd_id' => $value1['prd_id'],
                            'prd_qty' => $value1['prd_qty'],
                        );
                        $this->Dsoiapi_model->deduct_stock($data);
                    }
                }
            }
        }
    }
    
    public function myorder() {
        $outputarr = array();
        $member_id = $this->input->post('member_id');
        $dsoi_order = $this->Dsoi_order_model->order_info_by_id($member_id);
        if ($dsoi_order) {
            $outputarr['Status'] = 1;
            $outputarr['Records'] = $dsoi_order;
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = 'No Order';
        }
        echo json_encode($outputarr);
    }

    public function myorder_by_date() {
        $outputarr = array();
        $member_id = $this->input->post('member_id');
        $date = $this->input->post('date');
        $dsoi_order = $this->Dsoi_order_model->order_info_by_date($member_id, $date);
        if ($dsoi_order) {
            $outputarr['Status'] = 1;
            $outputarr['Records'] = $dsoi_order;
           
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = 'No Order details found';
        }

        echo json_encode($outputarr);
    }
    
    public function order_details_by_code() {
      $outputarr=array();
      $code = $this->input->post('order_code'); 
      $order_id= $this->Dsoi_order_model->get_by_code($code)->order_id;
      $dsoi_order = $this->Dsoi_order_details_model->get_by_code($order_id);
      
      if ($dsoi_order) {
            $outputarr['Status'] = 1;
            $outputarr['QR_Code_path'] = base_url('qr_image/'.$code.'.png');
            $outputarr['Records'] = $dsoi_order;
            
            
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = 'No Order details found';
        }
        echo json_encode($outputarr);
    }
    
    public function order_details_by_cat() {
      $outputarr=array();
      $code = $this->input->post('order_code'); 
      $cat_id = $this->input->post('cat_id');
      $order_id = $this->Dsoi_order_model->get_by_code($code)->order_id;
      $dsoi_order = $this->Dsoi_order_details_model->get_by_cat_id($order_id,$cat_id);
      $i=0;
      foreach ($dsoi_order as $value) {
          if($value->dorder_rest != 0){
             $i++; 
          }
          else{
              $i;
          }
      }
      
      if ($dsoi_order) {
          
          if($i==0){
              $outputarr['Status'] = 0;
              $outputarr['Msg'] = 'Order Already Delivered';
              
          }else{
            $outputarr['Status'] = 1;
            $outputarr['QR_Code_path'] = base_url('qr_image/'.$code.'.png');
            $outputarr['Records'] = $dsoi_order;
          }
            
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = 'No Order details found';
        }
        echo json_encode($outputarr);
    }
    
    

    
   
    public function order_confirm() {
      $code = $this->input->post('order_code');
      //***********************************
      $cat_id = $this->input->post('cat_id');
      $order_id = $this->Dsoi_order_model->get_by_code($code)->order_id;
      $dsoi_order = $this->Dsoi_order_details_model->get_by_cat_id($order_id,$cat_id);
     
      
     // ***********************************
      if($dsoi_order){
          foreach ($dsoi_order as $value) {
          $dorder_id=$value->dorder_id;
          $data = array(
		'dorder_delivered' => $value->dorder_qty,
                'dorder_rest' => 0,
                'dorder_lastupdate' => date('Y-m-d h:m:i'),
                'dorder_status' => 1
                       );
            $this->Dsoi_order_details_model->update($dorder_id,$data);
            
            $data2 = array(
		'od_dorder_id' => $value->dorder_id,
		'od_ordercode' => $value->dorder_code,
		'od_deliveredqty' => $value->dorder_qty,
		'od_datetime' => date('Y-m-d h:m:i'),
		'od_code' => strtotime(date('Ymdhsi')),
		'od_status' => 1,
                          );
            $this->Dsoi_order_delivered_model->insert($data2);
      }
      
        $outputarr['Status'] = 1;
        $outputarr['Msg'] = 'Order Delivered successful';
      
          
      }else{
        $outputarr['Status'] = 0;
        $outputarr['Msg'] = 'Order not found';
      }
        echo json_encode($outputarr);
    }
    
    public function mytrans() {
        $outputarr=array();
        $member_rfid = $this->input->post('member_rfid');
        $dsoi_transaction = $this->Dsoi_transaction_model->get_by_rfid($member_rfid);
        if ($dsoi_transaction) {
            $outputarr['Status'] = 1;
            $outputarr['Records'] = $dsoi_transaction;
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = 'No transaction details found';
        }

        echo json_encode($outputarr);
    }

    public function get_all_members() {
        $outputarr = array();
        $code = $this->input->post('member_code');
        $member = $this->Dsoiapi_model->get_mem_code_all($code);
        if ($member) {
            $outputarr['Status'] = 1;
            $outputarr['Records'] = $member;
        } else {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = 'No details found';
        }

        echo json_encode($outputarr);
    }

    public function edit_profile() {
       $outputarr=array();
       $member_id = $this->input->post('member_id');
       $member_modifydate = date("Y-m-d H:i:s");
       
            $data2 = array(
                'member_id' => $member_id,
                'member_fname' => $this->input->post('member_fname'),
                'member_lname' => $this->input->post('member_lname'),
                'member_fathername' => $this->input->post('member_fathername'),
                'member_email' => $this->input->post('member_email'),
                'member_mobile' => $this->input->post('member_mobile'),
                'member_dob' => $this->input->post('member_dob'),
                'member_anniversary' => $this->input->post('member_anniversary'),
                'member_paddress' => $this->input->post('member_paddress'),
                'member_pzipcode' => $this->input->post('member_pzipcode'),
                'member_pcountry' => $this->input->post('member_pcountry'),
                'member_pstate' => $this->input->post('member_pstate'),
                'member_pcity' => $this->input->post('member_pcity'),
                'member_billaddress' => $this->input->post('member_billaddress'),
                'member_billzipcode' => $this->input->post('member_billzipcode'),
                'member_billcountry' => ($this->input->post('member_billcountry') != '') ? $this->input->post('member_billcountry') : 0,
                'member_billstate' => ($this->input->post('member_billstate') != '') ? $this->input->post('member_billstate') : 0,
                'member_billcity' => ($this->input->post('member_billcity') != '') ? $this->input->post('member_billcity') : 0,
                'member_relation' => $this->input->post('member_relation'),
                'member_modifydate' => $member_modifydate
            );
            
            $result = $this->Member_model->add($data2);
            $outputarr['Status']=1;
            $outputarr['Msg']='profile Updated Successfully!';
            echo json_encode($outputarr);

    } 
    
    public function change_password() {
        $outputarr = array();
        $member_id = $this->input->post('member_id');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        if ($member_id != '' && $old_password != ''&& $new_password != '') {
            $member_details = $this->Dsoiapi_model->get_by_member_id($member_id);
            if ($old_password != $member_details->member_pass) {
                $outputarr['Status'] = 0;
                $outputarr['Msg'] = 'Old Password Not Matched';
            } else {
                $data = array(
                    'member_id' => $member_id,
                    'member_pass' => $new_password,
                );
                $this->Member_model->add($data);
                $outputarr['Status'] = 1;
                $outputarr['Msg'] = 'Password changed successfully';
            }
            } 
        else 
            {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = 'Fields are empty';
            }
        echo json_encode($outputarr);
    }
    
     public function change_password_firstLogin() {
        $outputarr = array();
        $member_id = $this->input->post('member_id');
        $new_password = $this->input->post('new_password');
        
        if ($member_id != '' && $new_password != '') {
            $member_details = $this->Dsoiapi_model->get_by_member_id($member_id);
            
                $data = array(
                    'member_id' => $member_id,
                    'member_pass' => $new_password,
                    'member_pass_status' => 1
                );
                $this->Member_model->add($data);
                $outputarr['Status'] = 1;
                $outputarr['Msg'] = 'Password changed successfully';
           
            } 
        else 
            {
            $outputarr['Status'] = 0;
            $outputarr['Msg'] = 'Fields are empty';
            }
        echo json_encode($outputarr);
    }

}

//end class
?>
