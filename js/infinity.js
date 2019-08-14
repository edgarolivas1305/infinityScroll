var $ = jQuery;



$(window).on("scroll", function() {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    
    if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
        $('.loader_new_infinity').addClass('is-show');
        $.ajax({
            url: aj_ajax.ajaxurl,
            type: 'POST',
            data: {
                'action': 'actionScrollInfinito',
                data_id: my_script_vars.postID,
                // tax:'tipo_destino',
                // postType: post
            },
            success: function (resp) {
                my_script_vars.postID = resp.id_pt;
                document.title = resp.title;
                window.history.pushState('',resp.title, resp.url);           
                $('.infinityContainer').append(resp.template);
                $('.loader_new_infinity').removeClass('is-show');                
            },
            error: function (jqXHR, estado, error) {
            },
            complete: function (jqXHR, estado) {
            }
        });        
    }
});