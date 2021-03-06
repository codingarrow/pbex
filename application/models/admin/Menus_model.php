<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //var $table_name = $this->config->item('tbl_timesheet');
class Menus_model extends CI_Model {
  /*
    var $empid   = '';
    var $checkin = '';
    var $checkout = '';
    var $ipcheckin = '';
  */
    var $description = '';
    //var $deptparentid = '';
    var $menuorder = '';
    var $menu_parent_id = '';
    var $pagelink = '';
    //var $table_name = $this->config->item('tbl_timesheet');

        //default 'A' in call_center.form comment out in the mean time
    //var $estatus = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
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
    function get_menus(  ) {
        //$this->db->from('qmp_csvviewandrateuser');
        $this->db->from($this->config->item('pb_menus'));
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
       
        $query = $this->db->get($this->config->item('pb_menus'));
        return $query->result();
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

    function get_dropmenu()
    {

        //$result=$this->db->get('employee')->order_by('lastname','asc');
        $result=$this->db->order_by('description','asc')->from($this->config->item('pb_menus'))->get();

        $dropdown=array();
        if( $result->num_rows() > 0 )
        {
            foreach($result->result_array() as $row)
            {
                $dropdown[$row['id']]=$row['description'] .', '.'';
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
        $this->description = $data['description'];
        $this->menuorder = $data['menuorder'];
        $this->menu_parent_id = $data['menu_parent_id'];
        $this->pagelink = $data['pagelink'];
        $this->db->insert($this->config->item('pb_menus'), $this);
        //$this->load->model('timesheet_model');
        //$this->timesheet_model->create_defaultshift($this->db->insert_id());
    }
    //-------------------------------------------------------------------------------------------
    function update_entry($data)
    {
        $this->description = $data['description'];
        $this->menuorder = $data['menuorder'];
        $this->menu_parent_id = $data['menu_parent_id'];
        $this->pagelink = $data['pagelink'];
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
                       'description' => $this->description,
                       'menuorder' => $this->menuorder,
                       'menu_parent_id' => $this->menu_parent_id,
                       'pagelink' => $this->pagelink
                    );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->config->item('pb_menus'), $data);
        //echo $this->db->last_query(); exit;
        //$this->db->update('employee', $this, array('empid' => $this->input->post('id')));
    }
    //-------------------------------------------------------------------------------------------
    function delete_entry($id)
    {
        $this->db->delete($this->config->item('pb_menus'), array('id' => $id));
        //delete shift schedule
        //delete timesheet or retain for future use
        //$this->db->delete('timesheet', array('empid' => $id));
    }
    //-------------------------------------------------------------------------------------------
    function get_entry($id){
        $this->db->where('id', $id);
        $query = $this->db->get($this->config->item('pb_menus'), 1);
        return $query->result();
    }
    //-------------------------------------------------------------------------------------------
    function update_pwd($data)
    {
        $data = array(
            'password' => $this->input->post('password')
        );
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('pb_users', $data);
    }
    //-------------------------------------------------------------------------------------------
}
/* End of file menus_model.php */
/* Location: ./application/models/admin/menus_model.php */