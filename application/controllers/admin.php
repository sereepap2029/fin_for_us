<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();        
        $this->load->model('m_admin');
        $this->load->model('m_webboard');
        if ($this->session->userdata('username')&&$this->uri->segment(2,'')!='') {
            $user_data = $this->m_admin->get_admin_by_username($this->session->userdata('username'));
            if (isset($user_data->username)) {
                $this->user_data = $user_data;
            } 
            else {
                redirect('admin/logout');
            }
        }         
    }
    
    public function index()
    {
        $this->load->view('admin/v_login');
    }
    public function dashboard()
    {
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_dashboard');
        $this->load->view('admin/v_footer');
    }
    public function admin_list() {
        $page=$this->uri->segment(3,'1');
        $page=(int)$page;
        $data_foot['table'] = "yes";
        $data_head['user_data'] = $this->user_data;
        $data_view['user_list_obj'] = $this->m_admin->get_all_admin(($page-1)*10);
        $data_view['user_list']=$data_view['user_list_obj']->result();
        $count_all=$data_view['user_list_obj']->count_all;
        //echo $count_all;
        $page_num=ceil($count_all/10);
        $data_view['page'] = $page;
        $data_view['page_num'] = $page_num;
        $this->load->view('admin/v_header', $data_head);
        $this->load->view('admin/v_admin_list', $data_view);
        $this->load->view('admin/v_footer', $data_foot);
    }    

    public function admin_user_add() {
        
        $data_head['user_data'] = $this->user_data;
        $data['err_msg']='';
        if (isset($_POST['username'])) {
            $isdup = $this->m_admin->check_admin_username($_POST['username']);
            if ($_POST['username'] == "") {
                $data['err_msg'] = "กรุณากรอก username";
                
                $this->load->view('admin/v_header', $data_head);
                $this->load->view('admin/v_admin_user_add', $data);
                $this->load->view('admin/v_footer');
            } 
            else if ($_POST['password'] != $_POST['confirm_password']||trim($_POST['password']," ")=="") {
                
                $data['err_msg'] = "กรุณากรอกรหัสผ่านให้ตรงกัน";
                
                $this->load->view('admin/v_header', $data_head);
                $this->load->view('admin/v_admin_user_add', $data);
                $this->load->view('admin/v_footer');
            } 
            else if (!$isdup) {
                $data['err_msg'] = "username " . $_POST['username'] . " ถูกใช้ไปแล้ว";                
                $this->load->view('admin/v_header', $data_head);
                $this->load->view('admin/v_admin_user_add', $data);
                $this->load->view('admin/v_footer');
            } 
            else {
                $data = array(
                    'username' => trim($_POST['username']," "), 
                    'password' => $_POST['password'], 
                    'nickname' => $_POST['nickname'], 
                    'firstname' => $_POST['firstname'], 
                    'lastname' => $_POST['lastname'], 
                    'email' => $_POST['email'], 
                    'phone' => $_POST['phone'],
                    );                
                $this->m_admin->add_admin($data);
                redirect('admin/admin_list');
            }
        } 
        else {
            $this->load->view('admin/v_header', $data_head);
            $this->load->view('admin/v_admin_user_add', $data);
            $this->load->view('admin/v_footer');
        }
    }
    public function admin_user_edit() {
        $username=$this->uri->segment(3,'');
        $data_head['user_data'] = $this->user_data;
        $data['admin_data']=$this->m_admin->get_admin_by_username($username);
        $data['err_msg']='';
        if (isset($_POST['password'])) {
            if ($_POST['password'] != $_POST['confirm_password']||trim($_POST['password']," ")=="") {
                
                $data['err_msg'] = "กรุณากรอกรหัสผ่านให้ตรงกัน";
                
                $this->load->view('admin/v_header', $data_head);
                $this->load->view('admin/v_admin_user_add', $data);
                $this->load->view('admin/v_footer');
            } 
            else {
                $data2 = array(
                    'password' => $_POST['password'], 
                    'nickname' => $_POST['nickname'], 
                    'firstname' => $_POST['firstname'], 
                    'lastname' => $_POST['lastname'], 
                    'email' => $_POST['email'], 
                    'phone' => $_POST['phone'],
                    );                
                $this->m_admin->update_admin($data2,$data['admin_data']->username);
                redirect('admin/admin_list');
            }
        } 
        else {
            $this->load->view('admin/v_header', $data_head);
            $this->load->view('admin/v_admin_user_add', $data);
            $this->load->view('admin/v_footer');
        }
    }

    public function delete_admin() {
        $id = $this->uri->segment(3, '');
        $this->m_admin->delete_admin($id);
        redirect('admin/admin_list');
    }

    public function login()
    {   
    $data['error_msg2']='Please login with your username and password';

    if(isset($_POST['login']) && $_POST['login'] == 'yes' )
        {
            $user_data=$this->m_admin->get_admin($_POST['username'],$_POST['password']);
            //echo $_POST['login_name']." asdasd ".$_POST['password'];
            if (isset($user_data->username)) {
                $this->session->set_userdata('username', $user_data->username);
                $data2 = array(
                   'last_access' => time()
                );

                $this->db->where('username', $user_data->username);
                $this->db->update('admin_user', $data2); 
                redirect('admin/dashboard');

            }else{          
                $this->load->view('admin/v_login',$data);
                $this->session->sess_destroy();
            }           
        }else{
            $this->load->view('admin/v_login',$data);
            $this->session->sess_destroy();
        }   
        
    }
    public function logout()
    {       
        $this->session->set_userdata('username', '');
        $this->session->sess_destroy();
        redirect('admin');
    }


    public function webboard_room_list() {
        $page=$this->uri->segment(3,'1');
        $page=(int)$page;
        $data_foot['table'] = "yes";
        $data_head['user_data'] = $this->user_data;
        $data_view['room_list_obj'] = $this->m_webboard->get_all_room(($page-1)*10);
        $data_view['room_list']=$data_view['room_list_obj']->result();
        $count_all=$data_view['room_list_obj']->count_all;
        //echo $count_all;
        $page_num=ceil($count_all/10);
        $data_view['page'] = $page;
        $data_view['page_num'] = $page_num;
        $this->load->view('admin/v_header', $data_head);
        $this->load->view('admin/v_webboard_room_list', $data_view);
        $this->load->view('admin/v_footer', $data_foot);
    }

    public function webboard_room_add() {
        
        $data_head['user_data'] = $this->user_data;
        $data['err_msg']='';
        if (isset($_POST['room_name'])) {
            if ($_POST['room_name'] == "") {
                $data['err_msg'] = "กรุณากรอก Room name";
                
                $this->load->view('admin/v_header', $data_head);
                $this->load->view('admin/v_webboard_room_add', $data);
                $this->load->view('admin/v_footer');
            }             
            else {
                $data = array(
                    'room_name' => $_POST['room_name'], 
                    'room_description' => $_POST['room_description'], 
                    'id' => $this->m_webboard->generate_id(), 
                    );                
                $this->m_webboard->add_room($data);
                redirect('admin/webboard_room_list');
            }
        } 
        else {
            $this->load->view('admin/v_header', $data_head);
            $this->load->view('admin/v_webboard_room_add', $data);
            $this->load->view('admin/v_footer');
        }
    }
}