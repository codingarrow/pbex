<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //var $table_name = $this->config->item('tbl_timesheet');
class Users_model extends CI_Model {
    var $details;
  /*
    var $empid   = '';
    var $checkin = '';
    var $checkout = '';
    var $ipcheckin = '';
  */
    var $address1 = '';
    var $dob = '';
    var $email = '';
    //var $deptparentid = '';
    var $firstname = '';
    var $lastname = '';
    var $gender = '';
    var $ipsignup = '';
    var $password = '';
    var $username = '';
    var $userphoto = '';
    var $userrole = '';
    //var $table_name = $this->config->item('tbl_timesheet');

        //default 'A' in call_center.form comment out in the mean time
    //var $estatus = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    //-------------------------------------------------------------------------------------------
    function validate_users( $email, $password ) {
        // Build a query to retrieve the user's details
        // based on the received username and password
        $this->db->from($this->config->item('pb_users'));
        $this->db->where('email',$email );
        $this->db->where( 'password', sha1($password) );
        $login = $this->db->get()->result();

        // The results of the query are stored in $login.
        // If a value exists, then the user account exists and is validated
        if ( is_array($login) && count($login) == 1 ) {
            // Set the users details into the $details property of this class
            $this->details = $login[0];
            // Call set_session to set the user's session vars via CodeIgniter
            $this->set_session();
            return true;
        }

        return false;
    }	
    //-------------------------------------------------------------------------------------------
    function set_session() {
        // session->set_userdata is a CodeIgniter function that
        // stores data in CodeIgniter's session storage.  Some of the values are built in
        // to CodeIgniter, others are added.  See CodeIgniter's documentation for details.
        $this->session->set_userdata( array(
                'userid'=>$this->details->id,
                'username'=>$this->details->username,
                'name'=> $this->details->firstname . ' ' . $this->details->lastname,
                'email'=>$this->details->email,
                'userphoto'=>$this->details->userphoto,
                'gender'=>$this->details->gender,
                'dob'=>$this->details->dob,
                'isLoggedIn'=>true
            )
        );
    }	
    //-------------------------------------------------------------------------------------------
    function get_users(  ) {
        //$this->db->from('qmp_csvviewandrateuser');
        $this->db->from($this->config->item('pb_users'));
        $this->db->order_by('id','desc');

        $rows = $this->db->get()->result_array();

        if( is_array($rows) && count($rows) > 0 ) {
            return $rows;
        }

        return false;
    }
    //-------------------------------------------------------------------------------------------
    function get_all_entries()
    {
       
        $query = $this->db->get($this->config->item('pb_users'));
        return $query->result();
    }
    //-------------------------------------------------------------------------------------------
    public function users_count( ) 
    {
		/*
		$sql = "SELECT date(checkin) as datefield
				,concat(dayname(checkin),', ',monthname(checkin),' ',dayofmonth(checkin),', ',year(checkin)) AS tks_date
				FROM timesheet Group By date(checkin)
								order by date(checkin) DESC";
			$query = $this->db->query($sql);
		*/
        $query = $this->db ->order_by('lastname', 'DESC')->get($this->config->item('pb_users'));
        //echo $query->num_rows();
        return $query->num_rows();
    }
    //-------------------------------------------------------------------------------------------
    function users_search($limit,$per_page)
    {
        $buildwhere = "";
        //change this to the real table once debugging's ok
        $pb_user = $this->config->item('pb_users');
        $buildwhere = " WHERE (1=0) ";
		
        //if strlen(this->qmp_searchbuildwhere())>2 { $buildwhere = this->qmp_searchbuildwhere();}
        $lenwhere = strlen($this->pb_searchbuildwhere());
        if ($lenwhere>2) { $buildwhere = " WHERE (1=1) " . $this->pb_searchbuildwhere();}
        $buildwhere = $buildwhere . " AND " . $this->pb_limitassigneduser() ;

        //once condition applies for _limitassigneduser and _searchbuildwhere() uncomment the $buildwhere below
        $buildwhere = "";
				  //$buildwhere = $buildwhere . " AND ( " . $this->limit_assigned_user() ." ) ";
				  
										//" AND
							// " . $this->limit_assigned_user() . "   

				   /*           
					$sql = "SELECT * FROM ".$qmp_viewandrateuser."  " . $buildwhere .  "
							  and calldate is not null
							  AND length(calldate::text) > 4
							  " .$this->config->item('qmp_viewandrateuserWHERE') . "
							  order by call_originate_time DESC              
							 LIMIT 20 OFFSET
							 ".$limit;
				   */           
        $sql = "SELECT * FROM    " . $pb_user . " ". $buildwhere .  " 
                      order by date_created DESC
                      LIMIT ".$limit.",".$per_page;

                 //" . $buildwhere . " LIMIT 20 OFFSET ".$limit;
                 //" . $buildwhere . " LIMIT " .$limit . ",20";
                //limit 10 offset 5 
        //echo $sql;
        //echo $this->session->userdata('isLoggedIn');
        $q = $this->db->query($sql);
        if($q->num_rows() > 0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else
        {
            return 0;
        }
    }
    //-------------------------------------------------------------------------------------------
    //for additional searches, time, employee, parameters etc. just modify this function
    function pb_searchbuildwhere()
    {
    $morewhere = "";
        //else
        //{
            $morewhere ="";
            return $morewhere;
        //}
    }
    //-------------------------------------------------------------------------------------------
    //for additional rules in the future like which user can view what, depending on their user roles in employee.admin, just modify this function
    function pb_limitassigneduser()
    {
    $limitwhere = "";
        //else
        //{
            $limitwhere ="";
            return $limitwhere;
        //}
    }
    //-------------------------------------------------------------------------------------------
    /*
    function get_dropdepartment()
    {
        $result=$this->db->get('department');
        $dropdown=array();
        if( $result->num_rows() > 0 )
        {
            foreach($result->result_array() as $row)
            {
                $dropdown[$row['deptid']]=$row['deptname'];
            }
        }
        return $dropdown;
    }
    */
    //-------------------------------------------------------------------------------------------
    function get_dropsystemusers()
    {

        //$result=$this->db->get('employee')->order_by('lastname','asc');
        $result=$this->db->order_by('username','asc')->from($this->config->item('pb_users'))->get();

        $dropdown=array();
        if( $result->num_rows() > 0 )
        {
            foreach($result->result_array() as $row)
            {
                $dropdown[$row['id']]=$row['username'] .', '.'';
                //$dropdown[$row['empid']]=$row['lastname'];
            }
        }
        return $dropdown;
    }
    //-------------------------------------------------------------------------------------------
    function get_dropcountry()
    {
        $result=$this->db->get('country');
        $dropdown=array();
        if( $result->num_rows() > 0 )
        {
            foreach($result->result_array() as $row)
            {
                $dropdown[$row['countryname']]=$row['countryname'];
            }
        }
        return $dropdown;
    }
    //-------------------------------------------------------------------------------------------

    function get_multipledropdown_form()
    {
		$result=$this->db->get($this->config->item('tbl_timesheet'));
		$dropdown=array();
		if( $result->num_rows() > 0 )
		{
			foreach($result->result_array() as $row)
			{
				$dropdown[$row['id']]=$row['nombre'];
			}
		}
		return $dropdown;        
    }

    //-------------------------------------------------------------------------------------------
    function insert_entry($data)    //
    {
        /*
        $this->isvisible   = $data['isvisible']; // please read the below note
        $this->setting_name = $data['setting_name'];
        $this->setting_value = $data['setting_value'];
        $this->user_id = $data['user_id'];
        //default 'A' in call_center.form comment out in the mean time
        //$this->estatus = $data['estatus'];
        //$this->date    = time();

        $data = array('firstname'=>  $this->input->post('firstname'),
                            'lastname'=>$this->input->post('lastname'),
                            'email'=>$this->input->post('email'));
        $this->db->insert('pb_users', $data);		
        */
        $this->address1 = $data['address1'];
        $this->dob = $data['dob'];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->gender= $data['gender'];
        $this->email = $data['email'];
        $this->ipsignup = $data['ipsignup'];
        $this->password = $data['password'];
        $this->username = $data['username'];
        $this->userphoto= $data['userphoto'];
        $this->userrole= $data['userrole'];
		
        $this->db->insert($this->config->item('pb_users'), $this);
        //$this->load->model('timesheet_model');
        //$this->timesheet_model->create_defaultshift($this->db->insert_id());
    }
    //-------------------------------------------------------------------------------------------
    function update_entry($data)
    {
        $this->address1 = $data['address1'];
        $this->dob = $data['dob'];
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->gender= $data['gender'];
        $this->email = $data['email'];
        $this->ipsignup = $data['ipsignup'];
        $this->password = $data['password'];
        $this->username = $data['username'];
        $this->userphoto= $data['userphoto'];
        $this->userrole= $data['userrole'];
        //$this->password = hash('sha256', 'G0m1Pa$$'); //$data['password'];
        //$this->date    = time();
        //var_dump($data);exit;
        //$data['id'] on where clause doesn't seem to work
        //               'dateupdated' => $this->config->item('date_HMSfull')

		/*
        $location = $this->input->post('location');
        if (strlen($location)<1) $location = "--";
        //if (strlen($login)<1)

        $mandaworkdesc = $this->input->post('mandaworkdesc');
        if (strlen($mandaworkdesc)<1) $mandaworkdesc = "y";

        $messaging = $this->input->post('messaging');
        if (strlen($messaging)<1) $messaging = "y";
		*/
        $data = array(
                       'address1' => $this->address1,
                       'dob' => $this->dob,
                       'firstname' => $this->firstname,
                       'lastname' => $this->lastname,
                       'gender' => $this->gender,
                       'email' => $this->email,
                       'ipsignup' => $this->ipsignup,
                       'password' => $this->password,
                       'username' => $this->username,
                       'userphoto' => $this->userphoto,
                       'userrole' => $this->userrole
                    );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->config->item('pb_users'), $data);
        //echo $this->db->last_query(); exit;
        //$this->db->update('employee', $this, array('empid' => $this->input->post('id')));
    }
    //-------------------------------------------------------------------------------------------
    function delete_entry($id)
    {
        $this->db->delete($this->config->item('pb_users'), array('id' => $id));
        //delete shift schedule
        //delete timesheet or retain for future use
        //$this->db->delete('timesheet', array('empid' => $id));
    }
    //-------------------------------------------------------------------------------------------
    function get_entry($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->config->item('pb_users'), 1);
        return $query->result();
    }
    //-------------------------------------------------------------------------------------------
    function update_pwd($data)
    {
        $data = array(
            'password' => $this->input->post('password')
        );
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update($this->config->item('pb_users'), $data);
    }
    //-------------------------------------------------------------------------------------------
    function show_departmentlist(  ) {
        //!!$this->db->from('department');  //tbl_timesheet   //v_employeetimesheet
        //$this->db->where('checkin',CURDATE());
        //!!$this->db->order_by('deptname','asc');

        /*
        $rows = $this->db->get()->result_array();

        if( is_array($rows) && count($rows) > 0 ) {
            return $rows;
        }

        return false;
        */
        $sql = "SELECT D.deptid,deptname,managerid 
                ,CONCAT(lastname,', ', firstname) as fullname
                 FROM department D 
                   LEFT JOIN employee E
                     on D.managerid= E.empid
                     ORDER by deptname ASC";
        $query = $this->db->query($sql); //, array($datecheckedin)
        return $query->result();
    }
    //-------------------------------------------------------------------------------------------
}
/* End of file users_model.php */
/* Location: ./application/models/exclusive/users_model.php */