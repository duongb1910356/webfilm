<?php $this->layout("layouts/manager", ["title" => APPNAME]) ?>
<?php $this->start("page") ?>
<div class="container">
    <div class="mt-5 mb-3">
        <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Phim</h2>
        <p class="text-center" data-wow-duration="2s">Danh sách phim.</p>
        <a href="/manager/add" class="btn btn-primary">Thêm phim mới</a>
    </div>


    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Mã phim</th>
                <th>Tên phim</th>
                <th>Thời lượng</th>
                <th>Sản xuất</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($phims as $phim) : ?>
                <tr>
                    <td><?= $phim->maphim ?></td>
                    <td><?= $phim->tenphim ?></td>
                    <td><?= $phim->thoiluong ?></td>
                    <td><?= $phim->sanxuat ?></td>
                    <td>
                        <a href="<?= '/manager/edit/' . $phim->maphim ?>" class="btn btn-primary btn-sm"><i class="fa fa-pen-nib"></i>&nbsp;Chi tiết / Sửa</a>
                        <a href="<?= $phim->maphim ?>" class="btn btn-primary btn-sm btn-danger" data-toggle="modal" data-target="<?='#modaltrash' . $phim->maphim?>"><i class="fa fa-trash"></i>&nbsp;Xóa</a>
                    </td>
                </tr>

                <div class="modal fade" id="<?='modaltrash' . $phim->maphim?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xóa phim</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <span>Bạn có chắc chắn muốn xóa phim này</span>
                            </div>
                            <div class="modal-footer">
                                <a href="<?='/manager/delete/' . $phim->maphim?>" class="btn btn-danger">Xóa</a>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Trở lại</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </tbody>
    </table>
</div>
<?php $this->stop() ?>

<?= $this->start("page_specific_js") ?>
<script src="/js/phim.js"></script>
<?php $this->stop() ?>