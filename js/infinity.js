var $ = jQuery;



$(window).on("scroll", function() {
    var scrollHeight = $(document).height();
    var scrollPosition = $(window).height() + $(window).scrollTop();
    
    if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
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
                console.log(resp);

                
            },
            error: function (jqXHR, estado, error) {
            },
            complete: function (jqXHR, estado) {
            }
        });        
    }
});