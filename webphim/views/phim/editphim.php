<?php $this->layout("layouts/manager", ["title" => APPNAME]) ?>
<?php $this->start("page") ?>
<div class="container">
    <div class="mt-5 mb-3">
        <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Phim</h2>
        <p class="text-center" data-wow-duration="2s">Chỉnh sửa phim</p>
    </div>
    <div class="row">
        <div class="col-md-12 mb-5">
            <form enctype="multipart/form-data" name="formaddphim" id="formaddphim" action="<?='/manager/edit/' . $phim->maphim?>" method="post" class="col-md-6 col-md-offset-3">
                <!-- Name -->
                <div class="form-group<?= isset($errors['name']) ? ' has-error' : '' ?>">
                    <label for="tenphim" class="font-weight-bold">Tên phim</label>
                    <input type="text" name="tenphim" class="form-control" maxlen="255" id="name" placeholder="Nhập tên phim" value="<?= $phim->tenphim ?>" />
                </div>

                <!-- Name -->
                <div class="form-group<?= isset($errors['name']) ? ' has-error' : '' ?>">
                    <label for="sanxuat" class="font-weight-bold">Nơi sản xuất</label>
                    <input type="text" name="sanxuat" class="form-control" maxlen="255" id="sanxuat" placeholder="Nhập nơi sản xuất" value="<?= $phim->sanxuat ?>" />
                </div>

                <!-- Name -->
                <div class="form-group<?= isset($errors['name']) ? ' has-error' : '' ?>">
                    <label for="phathanh" class="font-weight-bold">Ngày sản xuất</label>
                    <input type="date" name="phathanh" class="form-control" maxlen="255" id="phathanh" placeholder="Chọn ngày phát hành" value="<?= $phim->phathanh ?>" />
                </div>

                <!-- Name -->
                <div class="form-group<?= isset($errors['name']) ? ' has-error' : '' ?>">
                    <label for="thoiluong" class="font-weight-bold">Thời lượng</label>
                    <input type="number" name="thoiluong" class="form-control" maxlen="255" id="thoiluong" placeholder="Nhập thời lượng phim" value="<?= $phim->thoiluong ?>" />
                </div>

                <!-- Description -->
                <div class="form-group  font-weight-bold">
                    <label for="mota">Mô tả</label>
                    <textarea name="mota" id="mota" class="form-control" placeholder="Nhập mô tả của phim"><?= $phim->mota ?></textarea>
                </div>

                <!-- Name -->
                <div class="form-group">
                    <label for="duongdanhinh" class="font-weight-bold">Chọn hình ảnh</label>
                    <input type="file" name="duongdanhinh" class="form-control " id="duongdanhinh" value="" />
                    <img src="<?= 'data:image/' . $phim->images->loai . ';charset=utf8;base64,' . base64_encode($phim->images->noidung) ?>" style="width: 150px;" alt="">
                </div>

                <!-- Name -->
                <div class="form-group">
                    <label for="duongdanvideo" class="font-weight-bold">Thêm đường dẫn video</label>
                    <input type="text" name="duongdanvideo" class="form-control " maxlen="255" id="duongdanvideo" placeholder="Nhập đường link video" value="<?= $phim->videos->duongdanvideo ?>" />
                    <button type="button" id="getlink" class="btn btn-primary my-3">Tự động lấy link Youtube</button>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="chondienvien">Diễn viên</label>
                    <div class="col-9">
                        <select multiple="multiple" name="chondienvien[]" id="chondienvien" class="filter-multi-select form-control">
                            <?php
                            foreach (App\Models\DienVien::all() as $dienvien) {
                                $giong = false;
                                foreach ($phim->dienviens as $dv) {
                                    if ($dienvien->madienvien == $dv->madienvien) {
                                        $giong = true;
                                    }
                                }
                                if ($giong == false)
                                    echo '<option value="' . $dienvien->madienvien . '">' . $dienvien->tendienvien . '</option>';
                                else
                                    echo '<option selected value="' . $dienvien->madienvien . '">' . $dienvien->tendienvien . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="chondaodien">Đạo diễn</label>
                    <div class="col-9">
                        <select multiple="multiple" name="chondaodien[]" id="chondaodien" class="filter-multi-select form-control">
                            <?php
                            foreach (App\Models\DaoDien::all() as $daodien) {
                                $giong = false;
                                foreach ($phim->daodiens as $dd) {
                                    if ($daodien->madaodien == $dd->madaodien) {
                                        $giong = true;
                                    }
                                }
                                if ($giong == false)
                                    echo '<option value="' . $daodien->madaodien . '">' . $daodien->tendaodien . '</option>';
                                else
                                    echo '<option selected value="' . $daodien->madaodien . '">' . $daodien->tendaodien . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-3 col-form-label" for="chontheloai">Thể loại</label>
                    <div class="col-9">
                        <select multiple="multiple" name="chontheloai[]" id="chontheloai" class="filter-multi-select">
                            <?php
                            foreach (App\Models\TheLoai::all() as $theloai) {
                                $giong = false;
                                foreach ($phim->theloais as $tl) {
                                    if ($theloai->matheloai == $tl->matheloai) {
                                        $giong = true;
                                    }
                                }
                                if ($giong == false)
                                    echo '<option value="' . $theloai->matheloai . '">' . $theloai->tentheloai . '</option>';
                                else
                                    echo '<option selected value="' . $theloai->matheloai . '">' . $theloai->tentheloai . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary mb-5">Cập nhật</button>
            </form>
        </div>
    </div>
</div>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script src="/js/filter-multi-select-bundle.min.js"></script>
<script src="/js/phim.js"></script>
<?php $this->stop() ?>