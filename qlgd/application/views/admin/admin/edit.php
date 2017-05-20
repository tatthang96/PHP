<?php $this->load->view('admin/admin/head', $this->data) ?>
<div class="line"></div>

<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Cập nhật người dùng</h6>
        </div>
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="formRow">
                    <label class="formLeft" for="param_name">Mã người dùng:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="mand" id="param_mand" _autocheck="true" type="text" value="<?php echo $info->MaND ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('mand') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label class="formLeft" for="param_name">Họ và tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="hotennd" id="param_hotennd" _autocheck="true" type="text" value="<?php echo $info->HoTenND ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('hotennd') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_name">Username:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="username" id="param_username" _autocheck="true" type="text" value="<?php echo $info->Username ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('username') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_name">Mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="password" id="param_password" _autocheck="true" type="password"></span>
                        <p>Nếu cập nhật mật khẩu thì mới nhập giá trị</p>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('password') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_name">Nhập lại mật khẩu:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo">
                            <input name="re_password" id="param_re_password" _autocheck="true" type="password"></span>
                            
                            <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('re_password') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formSubmit">
                    <input value="Cập nhật" class="redB" type="submit">
                    <input value="Hủy bỏ" class="basic" type="reset">
                </div>
            </fieldset>
        </form>
    </div>


</div>

