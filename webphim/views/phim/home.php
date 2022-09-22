<?php $this->layout("layouts/default", ["title" => APPNAME, "theloais" => $theloais, "current_page" => $current_page]) ?>

<?php $this->start("page") ?>
<div class="px-3 pt-3 my-3 background-secction">
    <!-- <h5 class="text-white"><?='thông báo' . $thongbao?></h5> -->
    <h5 class="text-white" id="<?= isset($theloaicuaphim) ? $theloaicuaphim->matheloai : '' ?>"><?= isset($theloaicuaphim) ? 'Phim ' . $theloaicuaphim->tentheloai : 'Phim tổng hợp' ?></h5>
    <div class="row" id="noidung">
        <?php foreach ($phims as $phim) : ?>
            <div class="col-md-3">
                <div class="mb-4">
                    <!-- <div>phim nay la <?= $phim->images->tenhinh ?></div> -->
                    <img src="<?= 'data:image/' . $phim->images->loai . ';charset=utf8;base64,' . base64_encode($phim->images->noidung) ?>" style="width: 100%;" alt="" class="side-bar__img">
                    <div class="side-bar__title d-flex align-items-center">
                        <a href="<?= '/phim/detail/' . $this->e($phim->maphim) ?>"><i style="color: red;" class="fa fa-play mx-2"></i></a>
                        <div class="side-bar__title-img test1">
                            <span class=""><?=$phim->tenphim?></span><br>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <img id="loader" src="/img/loadimg-img.gif" alt="loai-img" style="display: none;">
    <div style="color: while; background-color: gray; text-align: center;">
        <a id="them" class="text-white cursor-pointer">View more</a>
    </div>
</div>
<?php $this->stop() ?>
<?= $this->start("page_specific_js") ?>
<script src="/js/loadpage.js"></script>
<?php $this->stop() ?>