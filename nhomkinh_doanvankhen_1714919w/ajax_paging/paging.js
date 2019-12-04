$(document).ready(function(){
    function loaddata(id,loai){
        var wrap = $('.load_paging[data-loai='+loai+']');
        $.ajax
        ({
            type: "POST",
            url: "ajax_paging/index3.php",
            data: {id},
            success: function(msg)
            {
                wrap.html(msg);
            }
        }); 
    }
    $('.load_paging').each(function(){
        var loai = $(this).data('loai');
        var id = $(this).parents('.khung').find('.tab_sp li.active').data('id');
        loaddata(id,loai);
    });
    $('.tab_sp li').click(function(){
        var loai = $(this).parents('.khung').find('.load_paging').data('loai');
        var id = $(this).data('id');
        $(this).parents('.tab_sp').find('li.active').removeClass('active');
        $(this).addClass('active');
        loaddata(id,loai);
    });
});