<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //var $table_name = $this->config->item('tbl_timesheet');
class Posts_model extends CI_Model {
  /*
    var $empid   = '';
    var $checkin = '';
    var $checkout = '';
    var $ipcheckin = '';
  */
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  //--------------------------------------------------------------------------------------------------------------------	COMMENTS / REPLIES TO POSTs
  function save_comment( $body ) {

    $data['pb_postsid'] = $this->input->post('pb_postsid');
    $data['comments'] = $body;
    $data['userid'] = $this->session->userdata('userid');
	//defined as int
    $data['date_created'] = date('Y-m-d H:i:s',time());  
    $data['ipsignup'] = $this->input->ip_address();

    if ( $this->db->insert($this->config->item('pb_comments'),$data) ) {
      return $data;
    } else {
      return false;
    }
  }
  //--------------------------------------------------------------------------------------------------------------------	POSTs
  function save_post( $body ) {

    $data['comments'] = $body;
    $data['userid'] = $this->session->userdata('userid');
    $data['date_created'] = date('Y-m-d H:i:s',time());
    $data['ipsignup'] = $this->input->ip_address();

    if ( $this->db->insert($this->config->item('pb_posts'),$data) ) {
      return $data;
    } else {
      return false;
    }
  }
  //--------------------------------------------------------------------------------------------------------------------	
  function get_posts_for_user( $user_id, $num_posts = 10 ) {

    $this->db->from($this->config->item('pb_posts'));
    $this->db->where( array('userid'=>$user_id) );
    $this->db->limit( $num_posts );
    $this->db->order_by('date_created','desc');

    $posts = $this->db->get()->result_array();

    if( is_array($posts) && count($posts) > 0 ) {
      return $posts;
    }

    return false;
  }
  //--------------------------------------------------------------------------------------------------------------------	
  //will vary for simple forum exchange
  function get_all_other_posts( $user_id, $team_id, $is_admin, $num_posts = 10 ) {
    // start building a query
    $this->db->from($this->config->item('pb_posts'));
    $this->db->join('user','post.userId=user.id');

    // restrict to teammates if not an admin
    if(!$is_admin){
      $this->db->where('teamId',$team_id);
    }

    $this->db->where_not_in('userid', array($user_id));
    $this->db->limit( $num_posts );
    $this->db->order_by('date_created','desc');

    $posts = $this->db->get()->result_array();

    if( is_array($posts) && count($posts) > 0 ) {
      return $posts;
    }

    return false;
  }
  //--------------------------------------------------------------------------------------------------------------------	
  function get_post_count_for_user( $userid ) {

    $this->db->from($this->config->item('pb_posts'));
    $this->db->where( array('userid'=>$userid) );

    return $this->db->count_all_results();
  }
  //--------------------------------------------------------------------------------------------------------------------	
}
/* End of file posts_model.php */
/* Location: ./application/models/exclusive/posts_model.php */