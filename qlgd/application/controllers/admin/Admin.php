<?php

Class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('nguoidung_model');
    }

    //Lay danh sach nguoi dung
    function index() {
        $input = array();
        $list = $this->nguoidung_model->get_list($input);
        $this->data['list'] = $list;
        //pre($list);

        $total = $this->nguoidung_model->get_total();
        $this->data['total'] = $total;

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }

    //Kiểm tra username tồn tại chưa
    function check_username() {
        $username = $this->input->post('username');
        $where = array('Username' => $username);
        if ($this->nguoidung_model->check_exists($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
            return false;
        }
        return true;
    }

    //Them moi quan tri vien
    function add() {
        $this->load->library('form_validation');
        $this->load->helper('form');

        //Neu ma submit co dư lieu post len thi kt
        if ($this->input->post()) {
            $this->form_validation->set_rules('mand', 'Mã người dùng', 'required');
            $this->form_validation->set_rules('hotennd', 'Họ và tên người dùng', 'required');
            $this->form_validation->set_rules('username', 'Tài khoản người dùng', 'required|callback_check_username');
            $this->form_validation->set_rules('password', 'Mật khẩu người dùng', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');

            if ($this->form_validation->run()) {
                //them vao csdl
                $MaND = $this->input->post('mand');
                $HoTenND = $this->input->post('hotennd');
                $Username = $this->input->post('username');
                $Password = $this->input->post('password');

                $data = array(
                    'MaND' => $MaND,
                    'HoTenND' => $HoTenND,
                    'Username' => $Username,
                    'Password' => md5($Password)
                );
                if ($this->nguoidung_model->create($data))
                    $this->session->set_flashdata('message', 'Thêm mới thành công');
                else
                    $this->session->set_flashdata('message', 'Không thêm đươc');

                redirect(admin_url('admin'));
            }
        }


        $this->data['temp'] = 'admin/admin/add';
        $this->load->view('admin/main', $this->data);
    }

    function edit() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        //Lấy id quản trị viên cần chỉnh sửa
        $id = $this->uri->rsegment('3');
        //Lấy thông tin quản trị viên
        $info = $this->nguoidung_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên này');
            redirect(admin_url('admin'));
        }
        $this->data['info'] = $info;

        if ($this->input->post()) {
            $this->form_validation->set_rules('mand', 'Mã người dùng', 'required');
            $this->form_validation->set_rules('hotennd', 'Họ và tên người dùng', 'required');
            $this->form_validation->set_rules('username', 'Tài khoản người dùng', 'required|callback_check_username');

            $password = $this->input->post('password');
            if ($password) {
                $this->form_validation->set_rules('password', 'Mật khẩu người dùng', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
            }
            if ($this->form_validation->run()) {
                $MaND = $this->input->post('mand');
                $HoTenND = $this->input->post('hotennd');
                $Username = $this->input->post('username');

                $data = array(
                    'MaND' => $MaND,
                    'HoTenND' => $HoTenND,
                    'Username' => $Username,
                );

                if ($password) {
                    $data[$Password] = md5($password);
                }

                if ($this->nguoidung_model->update($id, $data))
                    $this->session->set_flashdata('message', 'Cập nhật thành công');
                else
                    $this->session->set_flashdata('message', 'Không cập nhật được thêm đươc');

                redirect(admin_url('admin'));
            }
        }

        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->data);
    }

    //Hàm xóa
    function delete() {
        $id = $this->uri->rsegment('3');
        //Lấy thông tin quản trị viên
        $info = $this->nguoidung_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên này');
            redirect(admin_url('admin'));
        }
        //Thuc hien xoa
        $this->nguoidung_model->deleteNguoiDung($id);
        $this->session->set_flashdata('message', 'Xóa dữ liệu thành công');
        
        redirect(admin_url('admin'));
    }
    
    function logout()
    {
        if($this->session->userdata('login'));
        {
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('login'));
    }

//    function create() {
//        $data = array();
//        $data['MaND'] = 'admin1';
//        $data['HoTenND'] = 'Trần Tất Thắng';
//        $data['NgaySinh'] = '2016/03/03';
//        $data['GioiTinh'] = 'Nam';
//        $data['DienThoai'] = '01206060798';
//        $data['Email'] = 'tatthang96@gmail.com';
//        $data['Username'] = 'admin';
//        $data['Password'] = 'admin';
//        $data['HinhAnh'] = 'no';
//        $data['MaNhom'] = 'ad';
//        if ($this->nguoidung_model->create($data)) {
//            echo 'Them Thanh Cong';
//        } else {
//            echo 'loi';
//        }
//    }
//    
//    function update(){
//        $id = '';
//        $data = array();
//        $data['MaND'] = 'admin3';
//        $data['HoTenND'] = 'Trần Tất Thắng Tan';
//        $data['NgaySinh'] = '2017/03/03';
//        $data['GioiTinh'] = 'Nữaa';
//        $data['DienThoai'] = '01206060798';
//        $data['Email'] = 'tatthang97@gmail.com';
//        $data['Username'] = 'admin1';
//        $data['Password'] = 'admin1';
//        $data['HinhAnh'] = 'no11';
//        $data['MaNhom'] = 'ad';
//        if($this->nguoidung_model->update($id, $data))
//                echo 'ok';
//        else
//            echo 'flase';
//           
//    }
//    
//    function delete()
//    {
//        $id = 'admin1';
//        if ($this->nguoidung_model->deleteNguoiDung($id))
//            echo 'da xoa';
//        else
//            echo 'khong xoa';
//    }
//    
//    function get_info()
//    {
//        $id = 'admin1';
//        $info = $this->nguoidung_model->get_info($id, 'MaND, Username');
//        echo '<pre>';
//        print_r($info);
//    }
//    
//    function get_list()
//    {
//        //lay tat ca
//        $input = array();
//        $list = $this->nguoidung_model->get_list($input);
//        echo '<pre>';
//        print_r($list);
//    }
//    
//    function get_listdk()
//    {
//        //lay dk0
//        $input = array();
//        //$input['where'] = array('HoTenND' => 'Trần Tất Thắng');
//        //$input['order'] = array('HoTenND', 'desc');
//        //$input['limit'] = array(1, 0);
//        //Lay 1 dong du lieu tai vi tri dau tien
//        //$input['like'] = array('MaND', 'admin');
//        $list = $this->nguoidung_model->get_list($input);
//        echo '<pre>';
//        print_r($list);
//    }
}
