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
        var options = { height: height };
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

    handleSlimScroll();
    handleSidebarMenu();

})(jQuery);