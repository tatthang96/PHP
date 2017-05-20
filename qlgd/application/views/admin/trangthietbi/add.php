<?php $this->load->view('admin/trangthietbi/head', $this->data) ?>
<div class="line"></div>

<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Thêm mới trang thiết bị</h6>
        </div>
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="formRow">
                    <label class="formLeft" for="param_name">Mã thiết bị:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="matb" id="param_mand" _autocheck="true" type="text" value="<?php echo set_value('matb') ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('matb') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label class="formLeft" for="param_name">Họ và tên:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input name="tentb" id="param_hotennd" _autocheck="true" type="text" value="<?php echo set_value('tentb') ?>"></span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('tentb') ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="formSubmit">
                    <input value="Thêm mới" class="redB" type="submit">
                    <input value="Hủy bỏ" class="basic" type="reset">
                </div>
            </fieldset>
        </form>
    </div>


</div>

