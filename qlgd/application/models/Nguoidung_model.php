<?php
Class Nguoidung_model extends MY_Model
{
    var $table = 'nguoidung';
    var $key = 'MaND';
    
    function deleteNguoiDung($id){
        $this->db->where($this->key, $id);
        $this->db->delete("nguoidung");
        return ($this->db->affected_rows() > 0);
    }
}
 