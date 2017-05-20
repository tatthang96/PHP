<?php
Class Trangthietbi extends MY_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('trangthietbi_model');
    }
    
    //Lay ra danh sach cac trang thiet bi
    function index()
    {
        $list = $this->trangthietbi_model->get_list();
        //pre($list);
        $this->data['list'] = $list;
        
        
        
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        $this->data['temp'] = 'admin/trangthietbi/index';
        $this->load->view('admin/main', $this->data);
    }
    
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //Neu ma submit co dư lieu post len thi kt
//        if ($this->input->post()) {
//            $this->form_validation->set_rules('matb', 'Mã thiết bị', 'required');
//            $this->form_validation->set_rules('tentb', 'Họ và tên người dùng', 'required');
//            $this->form_validation->set_rules('username', 'Tài khoản người dùng', 'required|callback_check_username');
//            $this->form_validation->set_rules('password', 'Mật khẩu người dùng', 'required|min_length[6]');
//            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
//
//            if ($this->form_validation->run()) {
//                //them vao csdl
//                $MaND = $this->input->post('mand');
//                $HoTenND = $this->input->post('hotennd');
//                $Username = $this->input->post('username');
//                $Password = $this->input->post('password');
//
//                $data = array(
//                    'MaND' => $MaND,
//                    'HoTenND' => $HoTenND,
//                    'Username' => $Username,
//                    'Password' => md5($Password)
//                );
//                if ($this->nguoidung_model->create($data))
//                    $this->session->set_flashdata('message', 'Thêm mới thành công');
//                else
//                    $this->session->set_flashdata('message', 'Không thêm đươc');
//
//                redirect(admin_url('admin'));
//            }
//        }


        $this->data['temp'] = 'admin/trangthietbi/add';
        $this->load->view('admin/main', $this->data);
    }
}
