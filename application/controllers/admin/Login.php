<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
     This controller /application/controllers/admin/login takes care of the
	 CMS, maintenance - admin facility for exclusive and main(public) site
*/

class Login extends CI_Controller {

	public function test_index()
	{
		//$this->load->view('welcome_message');
		$this->load->view('try_view');
		
	}    
	//-------------------------------------------------------------------------------------------------------------------------------
    function index() {
		//echo 'ok';
		//exit;
        if( $this->session->userdata('isLoggedIn') ) {
			//echo 'stuck';
            //redirect('/main/show_main');
            //~~redirect('/create/show_agent');
			
			//echo $this->details->userlevel;
			//echo $this->session->userdata('user_level');
			//exit();
			
            //!!redirect('/crmcontroller/show_agent');
			//~~~$this->redirect_basedon_userlevel();
        } else {
            $this->show_login(false);
        }
    }
	//-------------------------------------------------------------------------------------------------------------------------------
    function show_login( $show_error = false ) {
        $data['error'] = $show_error;

        //$this->load->helper('form');
        $this->load->view('admin/login',$data);
    }
	//------------------------------------------------------------------------------------------------------------------------------- called by application/views/admin/login
    function login_admin() {
        // Create an instance of the user model
        $this->load->model('admin/systemusers_model');

        // Grab the email and password from the form POST
        $username = $this->input->post('username');
        $pass  = $this->input->post('password');

        //Ensure values exist for username and pass, and validate the user's credentials
        if( $username && $pass && $this->systemusers_model->validate_users($username,$pass)) {
			
            // If the user is valid, redirect to the main view
            //redirect('/main/show_main');
            //~~redirect('/create/show_agent');

            //echo $this->details->userlevel;
            //echo $this->session->userdata('userlevel');
            //exit();
            
            //!!redirect('/crmcontroller/show_agent');
            $this->redirect_basedon_userlevel();
            
        } else {
            // Otherwise show the login screen with an error message.
            $this->show_login(true);
        }
    }        
	//-------------------------------------------------------------------------------------------------------------------------------
    function logout_user() {
      $this->session->sess_destroy();
      $this->index();
	  redirect('/main');
    }
	//-------------------------------------------------------------------------------------------------------------------------------
	
	function redirect_basedon_userlevel()
		{
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
                  redirect('/main/load_registeredmembers');
                  break;
				default:
				  redirect('/tks/show_timesheet');
			}
		}
    //------------------------------------------------------------------ 2014 11 19       
    function SendmailforgotPassword($email,$show_error = false)
    {
        $data = "";
        $data['error'] = $show_error;
        $data['useremail'] = $email;

       /*
        if ($this->Registration_Model->count_all())
        {            
            $this->load->helper(array('excel', 'inflector', 'file'));
            
            $filename = date('Y-m-d');
            
            to_excel($this->Registration_Model->get_all_export(), $filename, TRUE);
            
            $this->load->library('email');

            $this->email->from('info@mongolia12g.com', 'mongolia12g.com');

            $this->email->to('jbpaginado@gmail.com');
            $this->email->to('Charlotte_Rogacion@dell.com');
            //$this->email->to('michaellouieloria@gmail.com', 'ivy@webdc.com.ph');
            
            $this->email->subject('Registrations for the Day');
            $this->email->message('Sent Registations for the Day - ' . date('l, F j, Y'));
            $this->email->attach("./xls/$filename.xls");
            $this->email->send();
        }
       */
        $this->load->model('user_m');
        $holdpassword = $this->user_m->send_PasswordToUser( $email );
        if (strlen($holdpassword)<2)
        {
            //echo 'has no val-> '.$holdpassword; exit;
            $this->session->flashdata("Email not found");
            $data['useremail'] = $email;
            $this->load->view('send4gottenpassword',$data);            
        }
        else
        {
            //$this->load->library('email');
            //!!echo 'has val-> '.$holdpassword. ' '.$email; exit;
            $message = nl2br("Forgot your password? We have generated a new password for you.\n\n
                          You can login as ". $_SESSION['tks_UserLogIN'] . " using the password  
                          ". $holdpassword . "\n\n
                          You can change the password, after logging in TKS.  If you did not request this password, you can safely ignore this email.\n\n 
                          It is possible that another user entered your email address by mistake when trying to reset their own password.\n\n
                          Thanks,\n
                          TKS");
            //$this->email->set_newline("\r\n");
            $this->email->from('tks@gumi.ph');
            $this->email->to($email);
            $this->email->subject('[TKS] Forgotten Password');
            $this->email->message($message);
            //$this->email->send();
            $_SESSION['tks_UserLogIN'] = "";

            if($this->email->send())
            {
                //echo 'Your email was sent.';
                $this->load->view('EmailPasswordSent',$data);             
            }

            else
            {
                show_error($this->email->print_debugger());
            }

            //$this->load->view('EmailPasswordSent',$data);             
        }
    }
	//-------------------------------------------------------------------------------------------------------------------------------
    function send_password(){
        $data = "";
        $email = $this->input->post('email');
        //$pass  = $this->input->post('password');

        //if ( strlen($email<2) || (!isset($email) )) {
        if( isset($email) && $email != "" ) {
            //show the form
            //$this->load->helper('form');
            $this->SendmailforgotPassword($email);

        }
    }
	//-------------------------------------------------------------------------------------------------------------------------------
    function forgotPassword() {
        $data = "";
        $email = $this->input->post('email');
        //$pass  = $this->input->post('password');

        //if ( strlen($email<2) || (!isset($email) )) {
        if( isset($email) && $email != "" ) {
            //show the form
            //$this->load->helper('form');
            $this->SendmailforgotPassword($email);

        }
        else
        {
            $this->load->view('send4gottenpassword',$data);            
        }
    }
	//-------------------------------------------------------------------------------------------------------------------------------
    function login_user() {
        // Create an instance of the user model
        $this->load->model('user_m');

        // Grab the email and password from the form POST
        $email = $this->input->post('email');
        $pass  = $this->input->post('password');

        //Ensure values exist for email and pass, and validate the user's credentials
        if( $email && $pass && $this->user_m->validate_user($email,$pass)) {
            // If the user is valid, redirect to the main view
            //redirect('/main/show_main');
            //~~redirect('/create/show_agent');

			//echo $this->details->userlevel;
			//echo $this->session->userdata('userlevel');
			//exit();
			
            //!!redirect('/crmcontroller/show_agent');
			$this->redirect_basedon_userlevel();
			
        } else {
            // Otherwise show the login screen with an error message.
            $this->show_login(true);
        }
    }
	//-------------------------------------------------------------------------------------------------------------------------------
    function showphpinfo() {
        echo phpinfo();
    }
}
/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */