$(document).ready(function () {
    const getLinkYoutube = function (key_search) {
        // alert(key_search);
        $.getJSON(`https://youtube.googleapis.com/youtube/v3/search?q=${key_search}&key=AIzaSyD1Vj-kq1yw4t-MbBtcsf0eY3Hi3Qa5KrE`, function (data) {
            console.log(data);
            var id_video = data.items[0].id.videoId;
            var link_video = 'https://www.youtube.com/embed/' + id_video;
            // alert(data.items[0].id.videoId);
            $('#duongdanvideo').val(link_video);
        });
    };
    $('#getlink').click(function () {
        var key_search = $('#name').val() + " trailer";
        getLinkYoutube(key_search);
    });

    ('[data-toggle="modal"]').click(function () {
        alert("$this.text()");
    });


    $("#formaddphim").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            "tenphim": {
                required: true,
            },
            "sanxuat": {
                required: true
            },
            "phathanh":{
                required: true
            },
            "duongdanvideo":{
                required: true
            },
            "duongdanhinh":{
                required: true
            }
        },
        messages: {
            "tenphim": {
                required: "Bắt buộc nhập tên phim",
            },
            "sanxuat": {
                required: "Bắt buộc nhập nơi sản xuất",
            },
            "phathanh": {
                required: "Bắt buộc nhập ngày phát hành",
            },
            "duongdanhinh":{
                require: "Chưa chọn ảnh"
            },
            "duongdanvideo":{
                require: "Chưa chọn đường dẫn video"
            },
        }
    });
});