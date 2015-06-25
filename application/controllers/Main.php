<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	//-------------------------------------------------------------------------------------------------------------------------------
   public function __construct()
   {
	parent::__construct();
	if( !$this->session->userdata('isLoggedIn') ) 
	   {
		redirect('/admin/login');
	   }
		  /*
			if( !$this->session->userdata('isLoggedIn') ) {
				redirect('/login/show_login');
			}
		  
			$this->load->library('Datatables');
			$this->load->library('table');
		  */
		//not working try to include on databases_helper.php
		//$this->load->library('Pest');
        $this->load->model('exclusive/users_model');
    }
	//-------------------------------------------------------------------------------------------------------------------------------
	/**
	 * Index Page for this controller.
	 *
	 */
	//-------------------------------------------------------------------------------------------------------------------------------
	public function index()
	{
		//$this->load->view('admin/welcome_message');
        redirect('/admin/login');
	}
	//-------------------------------------------------------------------------------------------------------------------------------
    function load_registeredmembers(){  //WITHpaging
        //ORIGINAL CODE
        //$searchterm = $this->input->get_post('searchterm', TRUE);          
        $limit = ($this->uri->segment(3) > 0)?$this->uri->segment(3):0;

        //!!echo current_url();

        $config['base_url'] = site_url(). '/main/load_registeredmembers'; //WITHpaging
        //$config['base_url'] = current_url();

        //$config['total_rows'] = $this->search_model->search_record_count($searchterm);
        $config['total_rows'] = $this->users_model->users_count( );

        //echo $this->timesheet_model->employeeattendancedates_count( );
        
        $config['per_page'] = 15; //equal to what is set to employeeattendancedates_search LIMIT,OFFSET
        $per_page = $config['per_page'];
        $config['uri_segment'] = 3;
        $choice = $config['total_rows']/$config['per_page'];
        
        //$config['num_links'] = round($choice);
        $config['num_links'] = round($choice); //15; //round($choice);        

        //remember that these are defined in config
        $config['full_tag_open'] = $this->config->item('full_tag_open');
        $config['full_tag_close'] = $this->config->item('full_tag_close');
        $config['prev_link'] = $this->config->item('prev_link');
        $config['prev_tag_open'] = $this->config->item('prev_tag_open');
        $config['prev_tag_close'] = $this->config->item('prev_tag_close');
        $config['next_link'] = $this->config->item('next_link');
        $config['next_tag_open'] = $this->config->item('next_tag_open');
        $config['next_tag_close'] = $this->config->item('next_tag_close');
        $config['cur_tag_open'] = $this->config->item('cur_tag_open');
        $config['cur_tag_close'] = $this->config->item('cur_tag_close');
        $config['num_tag_open'] = $this->config->item('num_tag_open');
        $config['num_tag_close'] = $this->config->item('num_tag_close');
        
        $config['first_tag_open'] = $this->config->item('first_tag_open');
        $config['first_tag_close'] = $this->config->item('first_tag_close');
        $config['last_tag_open'] = $this->config->item('last_tag_open');
        $config['last_tag_close'] = $this->config->item('last_tag_close');
     
        $config['first_link'] = $this->config->item('first_link');
        $config['last_link'] = $this->config->item('last_link');   

        $this->pagination->initialize($config);
        //$data['results'] = $this->search_model->search($searchterm,$limit);
        $data['max_posts'] = $this->users_model->users_search($limit,$per_page);
        $data['links'] = $this->pagination->create_links();

        //ORIGINAL CODE
        //$data['searchterm'] = $searchterm;
        /* GUIDE...
        $this->load->view('templates/header');
         $this->load->view('show_call_list',$data);
        $this->load->view('templates/footer');      
        */
             $this->load->view('templates/header');
              $this->load->view('admin/registeredmembers',$data);
             $this->load->view('templates/footer');
    }
	//-------------------------------------------------------------------------------------------------------------------------------
    function new_users(){
      //~~$this->tks_redirect();
      $data = "";
      //~~$data['print_department'] = $this->employee_model->get_dropdepartment();

             $this->load->view('templates/header');
              $this->load->view('new_users',$data);
             $this->load->view('templates/footer');
             //$this->render('admin', $data);
    }
	//-------------------------------------------------------------------------------------------------------------------------------
    function pb_redirect(){  //redirect user to pages stricted for them
			switch ($this->session->userdata('userrole')) 
			{
                /*
				case -1:
				  redirect('/tks/show_employee');
				  break;
				case 3:
				  redirect('/tks/show_timesheet');
				  break;
				case 2:
				  redirect('/tks/show_timesheet');
                */
                case 1:
                  //redirect('/main/load_registeredmembers');
				  $this->load_registeredmembers();
                  break;
				default:
				  redirect('/admin/login');
			}
	}
	//-------------------------------------------------------------------------------------------------------------------------------
    function pb_redirect_guide(){  //redirect user to pages stricted for them
      //$url = $this->config->item('qmp_url')."/index.php/crmcontroller/show_surveyform";
	        //always check if user is logged-in
	        //redirect('admin/login');
			  $hlduserlevel = $this->session->userdata('username');
			  $hldDetailFilter = "";
			  echo $this->session->userdata('userrole');
					switch ($hlduserlevel) {
					  //case -1:
					  case 0:
						//echo "Admin query";
						$hldDetailFilter = "";

						echo '0';
						
						  //if ($url <> "") {
							//if (!EW_DEBUG_ENABLED && ob_get_length())
							//!!if (ob_get_length())
							//!!{
							  ob_end_clean();
							//header("Location: " . $url);
							  //~~redirect('/main/load_registeredmembers');
						  //}
							  exit();
							//!!}
					  default:
						echo 'default';exit;
						$this->index();
						//all Prof-Agents will only see their records
						//echo "Agent query";
						//!!$hldDetailFilter = "";
						//$hldDetailFilter = " ( user_id in (".$this->ew_QuotedValue($this->session->userdata('user_id'),"str").") " . " ) ";
					  //return true;
            }      
    }
	//-------------------------------------------------------------------------------------------------------------------------------
	
}
/* End of file main.php */
/* Location: ./application/controllers/Main.php */