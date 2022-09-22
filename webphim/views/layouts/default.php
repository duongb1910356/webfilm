<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title) ?></title>

    <!-- Bootstap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- CSS tự định nghĩa -->
    <link rel="stylesheet" href="/css/main.css">
    

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&family=Sen:wght@400;700;800&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    
    <!-- CSS chi tiết mỗi trang -->
    <?= $this->section("page_specific_css") ?>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-dark py-4 sticky-top" style="background-color: black;">
            <a class="navbar-brand d-inline-flex align-items-center" href="/">
                <i class="fa fa-video" style="color: red; font-size: 30px;"></i>&nbsp;FilmChua</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-5 mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" name="<?= 'theloai' . App\Models\TheLoai::first()->matheloai ?>" href="<?= '/theloai/' . App\Models\TheLoai::first()->matheloai ?>"><?= $this->e(App\Models\TheLoai::first()->tentheloai) ?><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" name="<?= 'theloai' . App\Models\TheLoai::all()->get(2)->matheloai ?>" href="<?= '/theloai/' . App\Models\TheLoai::all()->get(2)->matheloai ?>"><?= $this->e(App\Models\TheLoai::all()->get(2)->tentheloai) ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thể loại khác</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <?php foreach (App\Models\TheLoai::all() as $theloai) : ?>
                                <a class="dropdown-item" name="<?= 'theloai' . $theloai->matheloai ?>" href="<?= '/theloai/' . $theloai->matheloai ?>"><?= $theloai->tentheloai ?></a>
                            <?php endforeach ?>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-auto">
                    <input class="form-control mr-sm-2" type="text" id="input_search" placeholder="Search">
                </form>
                <div class="d-flex align-items-center">
                    <a href="#" class="mx-4 btn"><i class="fa fa-search icon-item"></i></a>
                    <a href="#" class="mx-4 btn"><i class="fa fa-donate icon-item"></i></a>
                    <a href="#" class="ml-4 btn" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user-plus icon-item"></i></a>
                </div>
            </div>
        </nav>
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-title text-center">
                                <h4>Login</h4>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form id="loginform" method="POST" action="/login">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Your email address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Your password...">
                                    </div>
                                    <button id="btnsubmit" type="submit" class="btn btn-info btn-block btn-round">Login</button>
                                </form>
                                <div class="text-center text-muted delimiter">Đăng nhập chỉ dành cho quản trị viên</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?= $this->section("page") ?>
    </div>

    <footer class="bg-danger text-white pb-0 mb-0 text-center">
        <h3 class="">FILMCHUA.com</h3>
        <p class="mb-0 ">Bản quyền &copy; thuộc về Trần Quốc Dương B1910356</p>
        <i class="fa fa-envelope" aria-hidden="true">&nbsp; B1910356@student.ctu.edu.vn</i>
    </footer>

    <!-- Jquery 3.5 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Script tự định nghĩa -->
    <?= $this->section("page_specific_js") ?>
</body>

</html>