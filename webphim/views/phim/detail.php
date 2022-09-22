<?php

use Symfony\Component\Console\Output\NullOutput;

$this->layout("layouts/default", ["title" => APPNAME, "theloais" => $theloais]) ?>

<?php $this->start("page") ?>
<div class="pt-3 my-3 background-secction">
    <div class="row">
        <div class="col-md-4">
            <div class="text-white float-right">
                <?php foreach ($data->daodiens as $daodien) :
                    echo $daodien->tendaodien;
                ?>
                <?php endforeach ?>
            </div>
            <br>
            <img src="<?= 'data:image/jpg;charset=utf8;base64,' . base64_encode($data->images->noidung) ?>" style="width: 85%; height: auto; float: right;" alt="">
        </div>
        <div class="col-md-8 pt-4">
            <div class="text-white">
                <h3><?= $data->tenphim ?></h3>
                <div class="pt-4">
                    <p style="font-size: 18px;">
                        Thể loại:
                        <?php foreach ($data->theloais as $theloai) :
                            echo $theloai->tentheloai;
                        ?>
                        <?php endforeach ?>
                    </p>
                    <p style="font-size: 18px">Thời lượng: <?= $data->thoiluong ?> phút</p>
                    <p style="font-size: 18px">Sản xuất: <?= $data->sanxuat ?></p>
                    <p style="font-size: 18px">
                        Diễn viên:
                        <?php foreach ($data->dienviens as $dienvien) : ?>
                            <?= $dienvien->tendienvien ?>
                        <?php endforeach ?>
                    </p>
                </div>
                <div>
                    <div class="btn btn-danger" data-toggle="modal" data-target="<?= '#modal' . $data->maphim ?>">Xem ngay</div>
                    <div class="modal fade" id="<?= 'modal' . $data->maphim ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <!--Content-->
                            <div class="modal-content">
                                <!--Body-->
                                <div class="modal-body mb-0 p-0">
                                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                        <iframe class="embed-responsive-item" src="<?= $data->videos->duongdanvideo ?>" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" id="btn-close" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <span class="text-white"><?= $data->mota ?></span>
    </div>
</div>


<div class="mt-4 mb-3">
    <h4 class="text-white">Đề xuất</h4>
    <div class="row">
            <?php if(isset($dexuats)==True) foreach ($dexuats as $dexuat):?>
                <div class="col-md-3">
                    <div class="mb-4">
                        <img src="<?= 'data:image/jpg;charset=utf8;base64,' . base64_encode($dexuat->images->noidung) ?>" alt="" class="side-bar__img">
                        <div class="side-bar__title d-flex align-items-center">
                            <a href="<?= '/phim/detail/' . $dexuat->maphim ?>"><i style="color: red;" class="fa fa-play mx-2 "></i></a>
                            <div class="side-bar__title-img test1">
                                <span class=""><?= $dexuat->tenphim ?></span><br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
    </div>
    <img id="loader" src="/img/loadimg-img.gif" alt="loai-img" style="display: none;">
    <div style="color: while; background-color: gray; text-align: center;">
        <a id="them" class="text-white cursor-pointer">View more</a>
        <!-- <a href=""><?=$_SESSION['maphim']?></a> -->
    </div>
</div>

</div>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script src="/js/video.js"></script>
<script src="/js/loadpage.js"></script>
<?php $this->stop() ?>