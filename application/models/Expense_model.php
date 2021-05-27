 <?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed'); 



class Expense_model extends CI_Model

{



    public $table = 'expense';

    public $id = 'id';

    public $order = 'DESC';



    function __construct()

    {

        parent::__construct();

    }



    // get all

    function get_all()

    {
        $login_type= $this->session->userdata('type');
           $log_id=$this->session->userdata('reg_id'); 

            if($login_type==3){
            $this->db->where('customer_id',$log_id);
            // $this->db->where('status',1);
             $this->db->order_by($this->id, $this->order);
           return $this->db->get($this->table)->result();
         }
          elseif($login_type==2){
            $this->db->where('paying_employee',$log_id);
            // $this->db->where('status',1);
           $this->db->order_by($this->id, $this->order);
          return $this->db->get($this->table)->result();
         }else{
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
      }

        // $this->db->order_by($this->id, $this->order);

        // return $this->db->get($this->table)->result();

    }



    // get data by id

    function get_by_id($id)

    {

        $this->db->where($this->id, $id);

        return $this->db->get($this->table)->row();

    }

    

    // get total rows

    function total_rows($q = NULL) {

        $this->db->like('id', $q);

	$this->db->or_like('date', $q);

	$this->db->or_like('transaction_id', $q);

	$this->db->or_like('category', $q);

	$this->db->or_like('subcategory', $q);

	$this->db->or_like('Item_detail', $q);

	$this->db->or_like('paying_employee', $q);

	$this->db->or_like('amount_paid', $q);

	$this->db->or_like('payment_mode', $q);

	$this->db->or_like('building_id', $q);

	$this->db->or_like('room_id', $q);

	$this->db->or_like('room_type', $q);

	$this->db->or_like('sic_bill', $q);

	$this->db->or_like('comment', $q);

	$this->db->or_like('vendor_bill', $q);

	$this->db->or_like('shop_name', $q);

	$this->db->or_like('vendor_type', $q);

	$this->db->or_like('location', $q);

	$this->db->or_like('mobile', $q);

	$this->db->or_like('asset_id', $q);

	$this->db->or_like('model', $q);

	$this->db->or_like('manufacturing_company', $q);

	$this->db->or_like('warranty', $q);

	$this->db->or_like('stayinclass_asset_id', $q);

	$this->db->from($this->table);

        return $this->db->count_all_results();

    }



    // get data with limit and search

    function get_limit_data($limit, $start = 0, $q = NULL) {

        $this->db->order_by($this->id, $this->order);

        $this->db->like('id', $q);

	$this->db->or_like('date', $q);

	$this->db->or_like('transaction_id', $q);

	$this->db->or_like('category', $q);

	$this->db->or_like('subcategory', $q);

	$this->db->or_like('Item_detail', $q);

	$this->db->or_like('paying_employee', $q);

	$this->db->or_like('amount_paid', $q);

	$this->db->or_like('payment_mode', $q);

	$this->db->or_like('building_id', $q);

	$this->db->or_like('room_id', $q);

	$this->db->or_like('room_type', $q);

	$this->db->or_like('sic_bill', $q);

	$this->db->or_like('comment', $q);

	$this->db->or_like('vendor_bill', $q);

	$this->db->or_like('shop_name', $q);

	$this->db->or_like('vendor_type', $q);

	$this->db->or_like('location', $q);

	$this->db->or_like('mobile', $q);

	$this->db->or_like('asset_id', $q);

	$this->db->or_like('model', $q);

	$this->db->or_like('manufacturing_company', $q);

	$this->db->or_like('warranty', $q);

	$this->db->or_like('stayinclass_asset_id', $q);

	$this->db->limit($limit, $start);

        return $this->db->get($this->table)->result();

    }



    // insert data

    function insert($data)

    {

        $this->db->insert($this->table, $data);

       return $this->db->insert_id();

    }



    // update data

    function update($id, $data)

    {

        $this->db->where($this->id, $id);

        $this->db->update($this->table, $data);

    }



    // delete data

    function delete($id)

    {

        $this->db->where($this->id, $id);

        $this->db->delete($this->table);

    }

    public function filter($value){
       $this->db->select('exp.*,emp.name as emp,cat.name as cat, sub.name as sub,bul.name as bul,bd.name as bd,rt.name as rt,pm.name as pm'); 
       $this->db->from('expense as exp');
       $this->db->join('employee as emp','emp.id = exp.paying_employee');   
       $this->db->join('expense_category as cat ','cat.id = exp.category');   
       $this->db->join('expense_subcategory as sub ','sub.id = exp.subcategory');  
       $this->db->join('building as bul','bul.id = exp.building_id');  
       $this->db->join('buil_details as bd','bd.id = exp.room_id');   
       $this->db->join('room_type as rt','rt.id = exp.room_type');   
       $this->db->join('payment_mode as pm','pm.id = exp.payment_mode');  
       $this->db->where('exp.date>=',date('Y-m-d',strtotime($value['from'])));
       $this->db->where('exp.date<=',date('Y-m-d',strtotime($value['to']))); 
       // $this->db->where('delete_status',1);      
       return $this->db->get()->result(); 

    }



}



/* End of file Expense_model.php */

/* Location: ./application/models/Expense_model.php */

/* Please DO NOT modify this information : */

/* Generated On Codeigniter2020-02-16 12:00:48 */

