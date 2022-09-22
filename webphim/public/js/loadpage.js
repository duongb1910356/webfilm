$(document).ready(function() {
    var page = 2;
    var matheloaicuaphim = $('h5.text-white').attr("id");
    var tenphim;    
    $('#them').click(function() {
        // alert(page)
        $.ajax({
            url: "/ajax",
            type: "GET",
            data: {
                current_page: page,
                matheloai: matheloaicuaphim,
                tenphim: tenphim,
            },
            beforeSend: function() {
                $("#loader").show();
            },
            success: function(data) {
                // alert(data)
                if (data != '')
                    $('#noidung').append(data);
                else {
                    $('a#them').hide();
                }
            },
            error: function() {
                alert("Không tải được phim")
            },
            complete: function() {
                $("#loader").hide();
            }
        });
        page = page + 1;
    });
    $('#input_search').keydown(function(event) {
        tenphim = $(this).val();
        page = 1;
        if (event.which == 13) {
            // alert(tenphim)
            event.preventDefault();
            $('#noidung').html('');
            $('#them').trigger("click");
        }
    })


});