$(document).ready(function() {
    $('#btn-close').click(function() {
        var src = $('iframe').attr('src');
        $('iframe').attr('src','');
        $('iframe').attr('src',src);
        console.log(src);
    });
});