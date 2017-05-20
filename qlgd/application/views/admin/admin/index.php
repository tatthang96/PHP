<?php $this->load->view('admin/admin/head', $this->data) ?>
<div class="line"></div>

<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data)?>
       <div class="widget">

        <div class="title">
            <span class="titleIcon"><input id="titleCheck" name="titleCheck" type="checkbox"></span>
            <h6>
                Danh sách người dùng			</h6>
            <div class="num f12">Số lượng: <b><?php echo $total ?></b></div>
        </div>

        <table class="sTable mTable myTable" id="checkAll" width="100%" cellspacing="0" cellpadding="0">

            <thead class="filter"><tr><td colspan="9">
                        <form class="list_filter form" action="index.php/admin/product.html" method="get">
                            <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                                    <tr>
                                        <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
                                        <td class="item"><input name="id" value="" id="filter_id" style="width:55px;" type="text"></td>

                                        <td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
                                        <td class="item" style="width:155px;"><input name="name" value="" id="filter_iname" style="width:155px;" type="text"></td>

                                        <td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
                                        <td class="item">
                                            <select name="catalog">
                                                <option value=""></option>
                                                <!-- kiem tra danh muc co danh muc con hay khong -->
                                                <optgroup label="Tivi">
                                                    <option value="18">
                                                        Toshiba											            </option>
                                                    <option value="17">
                                                        Samsung											            </option>
                                                    <option value="16">
                                                        Panasonic											            </option>
                                                    <option value="15">
                                                        LG											            </option>
                                                    <option value="14">
                                                        JVC											            </option>
                                                    <option value="13">
                                                        AKAI											            </option>
                                                </optgroup>

                                                <!-- kiem tra danh muc co danh muc con hay khong -->
                                                <optgroup label="Điện thoại">
                                                    <option value="12">
                                                        HTC											            </option>
                                                    <option value="11">
                                                        BlackBerry											            </option>
                                                    <option value="10">
                                                        Asus											            </option>
                                                    <option value="9">
                                                        Apple											            </option>
                                                </optgroup>

                                                <!-- kiem tra danh muc co danh muc con hay khong -->
                                                <optgroup label="Laptop">
                                                    <option value="8">
                                                        HP											            </option>
                                                    <option value="7">
                                                        Dell											            </option>
                                                    <option value="6">
                                                        Asus											            </option>
                                                    <option value="5">
                                                        Apple											            </option>
                                                    <option value="4">
                                                        Acer											            </option>
                                                </optgroup>

                                            </select>
                                        </td>

                                        <td style="width:150px">
                                            <input class="button blueB" value="Lọc" type="submit">
                                            <input class="basic" value="Reset" onclick="window.location.href = 'index.php/admin/product.html';" type="reset">
                                        </td>

                                    </tr>
                                </tbody></table>
                        </form>
                    </td></tr></thead>

            <thead>
                <tr>
                    <td style="width:21px;"><img src="<?php echo public_url('admin'); ?>/images/icons/tableArrows.png"></td>
                    <td style="width:80px;">Mã người dùng</td>
                    <td>Họ và tên</td>
                    <td style="width:75px;">Ngày sinh</td>
                    <td style="width:50px;">Giới tính</td>
                    <td>Điện thoại</td>
                    <td>Email</td>
                    <td>Tài khoản</td>
                    
                    <td style="width:120px;">Hành động</td>
                    
                </tr>
            </thead>

            <tfoot class="auto_check_pages">
                <tr>
                    <td colspan="9">
                        <div class="list_action itemActions">
                            <a href="#submit" id="submit" class="button blueB" url="admin/product/del_all.html">
                                <span style="color:white;">Xóa hết</span>
                            </a>
                        </div>

                        <div class="pagination">
                        </div>
                    </td>
                </tr>
            </tfoot>

            <tbody class="list_item">
                <?php foreach ($list as $row):?>
                <tr class="row_9">
                    <td><input name="id[]" value="<?php echo $row->MaND ?>" type="checkbox"></td>

                    <td class="textC"><?php echo $row->MaND ?></td>

                    <td>
                        <div class="image_thumb">
                            <img src="<?php echo base_url('upload/nguoidung/'.$row->HinhAnh) ?>" height="40">
                            <div class="clear"></div>
                        </div>

                        <a href="" class="tipS" title="" target="_blank">
                            <b><?php echo $row->HoTenND ?></b>
                        </a>

                        <div class="f11">
                            Đã bán: 0					  | Xem: 20					</div>

                    </td>

                    
                     <td class="textC"><?php echo $row->NgaySinh ?></td>
                    <td class="textC">
                        <?php echo  $row->GioiTinh ?>
                    </td>
                    
                      <td class="textC">
                        <?php echo  $row->DienThoai ?>
                    </td>
                    
                    <td class="textC">
                        <?php echo  $row->Email ?>
                    </td>
                    
                    <td class="textC">
                        <?php echo  $row->Username ?>
                    </td>
                   

                    <td class="option textC">
                        <a href="" title="Gán là nhạc tiêu biểu" class="tipE">
                            <img src="<?php echo public_url('admin'); ?>/images/icons/color/star.png">
                        </a>
                        <a href="product/view/9.html" target="_blank" class="tipS" title="Xem chi tiết sản phẩm">
                            <img src="<?php echo public_url('admin'); ?>/images/icons/color/view.png">
                        </a>
                        <a href="<?php echo admin_url('admin/edit/'.$row->MaND)?>" title="Chỉnh sửa" class="tipS">
                            <img src="<?php echo public_url('admin'); ?>/images/icons/color/edit.png">
                        </a>

                        <a href="<?php echo admin_url('admin/delete/'.$row->MaND) ?>" title="Xóa" class="tipS verify_action">
                            <img src="<?php echo public_url('admin'); ?>/images/icons/color/delete.png">
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</div>

<div class="clear mt30"></div>
