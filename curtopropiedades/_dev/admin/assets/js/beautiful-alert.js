jQuery.initBeautifulAlert = function (options) {
    var beautifulAlert = function (message) {
        var closeDialog = function () {
            $('#beautiful-alert-overlay, #beautiful-alert-box').hide();
        };
        var closeText = 'Cerrar';
        if (options && ('closeText' in options)) {
            closeText = options['closeText'];
        }
        $('embed').css('visibility', 'hidden');
        if (!$('#beautiful-alert-box').length) {
            $('body').append('<div id="beautiful-alert-overlay"></div><div id="beautiful-alert-box"><div id="beautiful-alert-message"></div><div id="beautiful-alert-close"><span>' + closeText + '</span></div></div>');
        }
        $('#beautiful-alert-message').html(message.replace(/\n/g, '<br />'));
        /*var boxTop = $(window).height()/3 - $('#beautiful-alert-box').height()/2;
        var boxLeft = $(window).width()/2 - $('#beautiful-alert-box').width()/2;
        $('#beautiful-alert-box').css({top: boxTop + $(window).scrollTop(), left: boxLeft});*/
        $('#beautiful-alert-overlay').css({height: $(document).height()});
        $('#beautiful-alert-overlay, #beautiful-alert-box').show();
        $('#beautiful-alert-close span, #beautiful-alert-overlay').bind('click', function () {
            closeDialog();
            $('embed').css('visibility', 'visible');
        });
    };
    window.alert = beautifulAlert;
}
