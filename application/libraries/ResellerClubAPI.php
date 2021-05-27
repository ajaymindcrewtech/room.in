<?php
class ResellerClubAPI {
	
	// Configuration Of Reseller Club API
	public $api_user_id = "436678";
	public $api_key = "uaCQ0qHnL68YtQqk3u6NVTinbL3ia0BQ";
	
	// List of TDL's - TLDs for which the domain name availability needs to be checked
	//public $tlds_list = array("com", "net", "in", "biz", "org", "asia");
                public $tlds_list = array("in");
	
	//Variable Declaration
	public $domainname;

	//Constructor
	public function __construct()
    {
            
            // $this->CI = & get_instance();
            
            
//		if(isset($_POST['domain'])){
//		$this->domainname = preg_replace('/[\s-]+/', '-', substr(trim($_POST['domain']), 0, 253) );
//		}
	}
	public function add_customer_fund($customer_id)
	{
		$amount="200";
		$description='bank-payment';
		$transaction_type='credit';
		$trans_key=uniqid();
		$url='https://test.httpapi.com/api/billing/add-customer-fund.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&customer-id='.$customer_id.'&amount='.$amount.'&description='.$description.'&transaction-type='.$transaction_type.'&transaction-key='.$trans_key.'&update-total-receipt=true';
		$transaction_id=$this->execute_curl($url);
		return $transaction_id;
	}
	public function signup_customer($data=  array())
	{
		$username=$data['email'];
		$password=$data['password'];
		$name=str_replace(' ', '%20', $data['name']);
		$company=str_replace(' ', '%20', $data['company']);
		$address=str_replace(' ', '%20',$data['address']);
		$city=$data['city'];
		$state=str_replace(' ', '%20', $data['state']);
		$country=$data['country'];
		$zipcode=$data['zipcode'];
		$phone_cc=$data['phone_cc'];
		$phone=$data['mobile'];		
		$url='https://test.httpapi.com/api/customers/signup.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&username='.$username.'&passwd='.$password.'&name='.$name.'&company='.$company.'&address-line-1='.$address.'&city='.$city.'&state='.$state.'&country='.$country.'&zipcode='.$zipcode.'&phone-cc='.$phone_cc.'&phone='.$phone.'&lang-pref=en';		
		$customer_id=$this->execute_curl($url);	
		//$transaction_id=$this->add_customer_fund($customer_id);
                // print_r($customer_id);
                 //echo 'check';
		return $customer_id;
	}
        
                public function signup_customer_check($data=  array('email'=>''))
	{
		$username=$data['email'];
//		$password=$data['password'];
//		$name=str_replace(' ', '%20', $data['name']);
//		$company=str_replace(' ', '%20', $data['company']);
//		$address=str_replace(' ', '%20',$data['address']);
//		$city=$data['city'];
//		$state=str_replace(' ', '%20', $data['state']);
//		$country=$data['country'];
//		$zipcode=$data['zipcode'];
//		$phone_cc=$data['phone_cc'];
//		$phone=$data['mobile'];		
		//$url='https://test.httpapi.com/api/customers/signup.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&username='.$username.'&passwd='.$password.'&name='.$name.'&company='.$company.'&address-line-1='.$address.'&city='.$city.'&state='.$state.'&country='.$country.'&zipcode='.$zipcode.'&phone-cc='.$phone_cc.'&phone='.$phone.'&lang-pref=en';		
		$url='https://test.httpapi.com/api/customers/details.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&username='.$username.'';		
		$customer_id=$this->execute_curl($url);
               // print_r($customer_id);
		//$transaction_id=$this->add_customer_fund($customer_id);
                                if($customer_id!='' && isset($customer_id['customerid']))
				return $customer_id;
                                else
                                return FALSE;    
	}
        
          public function signup_customer_check_test($data=  array('email'=>''))
	{
		$username=$data['email'];
//		$password=$data['password'];
//		$name=str_replace(' ', '%20', $data['name']);
//		$company=str_replace(' ', '%20', $data['company']);
//		$address=str_replace(' ', '%20',$data['address']);
//		$city=$data['city'];
//		$state=str_replace(' ', '%20', $data['state']);
//		$country=$data['country'];
//		$zipcode=$data['zipcode'];
//		$phone_cc=$data['phone_cc'];
//		$phone=$data['mobile'];		
		//$url='https://test.httpapi.com/api/customers/signup.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&username='.$username.'&passwd='.$password.'&name='.$name.'&company='.$company.'&address-line-1='.$address.'&city='.$city.'&state='.$state.'&country='.$country.'&zipcode='.$zipcode.'&phone-cc='.$phone_cc.'&phone='.$phone.'&lang-pref=en';		
		$url='https://test.httpapi.com/api/customers/details.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&username='.$username.'';		
		$customer_id=$this->execute_curl($url);
                print_r($customer_id);
		//$transaction_id=$this->add_customer_fund($customer_id);
                                if($customer_id!='' && isset($customer_id['customerid']))
				return $customer_id;
                                else
                                return FALSE;    
	}
        
        public function doamin_getStatus($domain_name)
	{
		$url='https://test.httpapi.com/api/domains/details-by-name.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&domain-name='.$domain_name.'&options=All';
                     // https://test.httpapi.com/api/domains/details-by-name.json?auth-userid=0&api-key=key&domain-name=yourdomain.com&options=OrderDetails
		$api_data=$this->execute_curl($url);
		return $api_data; 
	}
	public function create_contact($data=  array())
	{               
                                $customer_id=$data['customer_id'];
		$email=$data['email'];
		$name=str_replace(' ', '%20', $data['name']);
		$company=str_replace(' ', '%20', $data['company']);
		$address=str_replace(' ', '%20',$data['address']);
		$city=$data['city'];
		$state=str_replace(' ', '%20', $data['state']);
		$country=$data['country'];
		$zipcode=$data['zipcode'];
		$phone_cc=$data['phone_cc'];
		$phone=$data['mobile'];
		$url='https://test.httpapi.com/api/contacts/add.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&name='.$name.'&company='.$company.'&email='.$email.'&address-line-1='.$address.'&city='.$city.'&country='.$country.'&zipcode='.$zipcode.'&phone-cc='.$phone_cc.'&phone='.$phone.'&customer-id='.$customer_id.'&type=Contact';
		$contact_id=$this->execute_curl($url);
		return $contact_id;
	}
        
        public function set_details($data=  array()) {
                $contact_id=$data['contact_id'];
              echo  $url='https://test.httpapi.com/api/contacts/set-details.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&contact-id='.$contact_id.'&attr-name1=locality&attr-value1=IN&attr-name2=legalentitytype&attr-value2=naturalPerson&attr-name3=identform&attr-value3=passport&attr-name4=identnumber&attr-value4=K6117804&product-key=dotasia';
                $result=$this->execute_curl($url);
		return $result;   
        }
        
	//Get Domain Availability ResellerClub API
	public function getSuggestion($domain_name)
	{		
		$url='https://test.httpapi.com/api/domains/v5/suggest-names.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&keyword='.$domain_name;
		$api_data=$this->execute_curl($url);
		return $api_data;
	}
	public function DomainAvailability($dmain=NULL,$type=NULL)
	{
                $this->domainname=$dmain;
	$tld = "";
	//$sugesstion=$this->getSuggestion($this->domainname);
	/*echo'<pre>';
	print_r($sugesstion);die;
	
	$domain='jaiswal7eyetech.com';
	$customer_id=$this->signup_customer();
	$contact_id=$this->create_contact($customer_id);	
	$trans=$this->book_domain($domain,$customer_id,$contact_id);
	print_r($trans);
	echo $trans;
	die;*/
	//foreach($this->tlds_list as $arrayitem)	{ $tld.= '&tlds=' . $arrayitem;	}
                $tld.= '&tlds=' . $type;
	 $url = 'https://test.httpapi.com/api/domains/available.json?auth-userid=' . $this->api_user_id . '&api-key=' . $this->api_key . '&domain-name=' . $this->domainname . $tld . '&suggest-alternative=true';		
	//if ($data) $url = sprintf("%s?%s", $url, http_build_query($data));
	
	$api_data=$this->execute_curl($url);
	return $api_data;
	}
	public function book_domain($domain,$customer_id,$contact_id)
	{
		$year=1;
		$ns1='ns1.7eyetechnologies.com';
		$ns2='ns2.7eyetechnologies.com';
		$url='https://test.httpapi.com/api/domains/register.json?auth-userid='.$this->api_user_id.'&api-key='.$this->api_key.'&domain-name='.$domain.'&years='.$year.'&ns='.$ns1.'&ns='.$ns2.'&customer-id='.$customer_id.'&reg-contact-id='.$contact_id.'&admin-contact-id='.$contact_id.'&tech-contact-id='.$contact_id.'&billing-contact-id='.$contact_id.'&ced-contact-id='.$contact_id.'&invoice-option=KeepInvoice&purchase-privacy=true';
		$api_data=$this->execute_curl($url);
                return $api_data;
	}
	public function execute_curl($url)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$apidata = curl_exec($curl);		
		$apidata_json = json_decode($apidata, TRUE);
		return $apidata_json;
	}
	
	public function FormValidation()
	{
		if (isset($_POST['check']) && preg_match('/^[a-z0-9\-]+$/i', $this->domainname)&& isset($_POST['domain']) != "" && $this->tlds_list) { return true; }
	    else { return false; }
	
	}
	}
	//$api = new ResellerClubAPI;