(function($)
{
    var handleSlimScroll = function()
    {
        $('[data-scrollable="true"]').each(function()
            {
                generateSlimScroll($(this))
            }
        )};

    var generateSlimScroll = function(div)
    {
        var height = $(div).attr('data-height');
        height = height ? height : $(div).height();
        var options = { height: height, size: '5px', alwaysVisible: true };

        $(div).slimScroll(options)
    }

    var handleSidebarMenu = function()
    {
        $('#sidebar .nav > .has-sub > a').on('click', function()
        {
            var subMenu = $(this).next('.sub-menu');
            console.log(subMenu);

            if ($('.page-sidebar-minified').length === 0)
            {
                $('#sidebar .nav > li.has-sub > .sub-menu').not(subMenu).slideUp(250, function()
                {
                    $(this).closest('li').removeClass('expand');
                });

                $(subMenu).slideToggle(250, function()
                {
                    var parent = $(this).closest('li');

                    if ($(parent).hasClass('expand'))
                    {
                        $(parent).removeClass('expand');
                    }
                    else
                    {
                        $(parent).addClass('expand');
                    }
                });
            }
        });

        $('#sidebar .nav > .has-sub .sub-menu li.has-sub > a').click(function()
        {
            if ($('.page-sidebar-minified').length === 0)
            {
                var subMenu = $(this).next('.sub-menu');

                $(subMenu).slideToggle(250);
            }
        });
    }

    //var handleSidebarMinify = function()
    //{
    //    $('[data-click=sidebar-minify]').on('click', function(e)
    //    {
    //        e.preventDefault();
    //
    //        if ($('#page-container').hasClass('page-sidebar-minified'))
    //        {
    //            $('#page-container').removeClass('page-sidebar-minified');
    //
    //            if ($('#page-container').hasClass('page-sidebar-fixed'))
    //            {
    //                generateSlimScroll($('#sidebar [data-scrollbar='true']'));
    //            }
    //        }
    //        else
    //        {
    //            $('#page-container').addClass('page-sidebar-minified');
    //
    //            if ($('#page-container').hasClass('page-sidebar-fixed'))
    //            {
    //                $('#sidebar [data-scrollbar='true']').slimScroll({destroy:true});
    //                $('#sidebar [data-scrollbar='true']').removeAttr('style');
    //            }
    //
    //            $('#sidebar [data-scrollbar=true]').trigger('mouseover');
    //        }
    //
    //        $(window).trigger('resize');
    //    });
    //}

    handleSlimScroll();
    handleSidebarMenu();
    //handleSidebarMinify();

})(jQuery);