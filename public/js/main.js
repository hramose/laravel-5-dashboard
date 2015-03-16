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

    function handleResponsiveSidebar()
    {
        $(window).on('load resize', function()
        {
            var wSize = $(window).width();
            if (wSize <= 768)
            {
                $('#container').addClass('sidebar-closed');
                $('#sidebar').hide();
            }

            if (wSize > 768)
            {
                $('#container').removeClass('sidebar-closed');
                $('#sidebar').show();
            }
        });

        $('.navbar-toggle').on('click', function() {
            $('#sidebar').toggle();
        });
    }

    function handlePanelResize()
    {
        $('body').on('click', '[data-action="expand-panel"]', function()
        {
            if ($('#container').hasClass('hidden'))
            {
                $('.panel-expanded').html('');
                $('#container').removeClass('hidden');
            }
            else
            {
                var panel = $(this).closest('.panel').parent().html();
                $('#container').addClass('hidden');
                $('.panel-expanded').html(panel);
            }
        });
    }

    function handleDataTable()
    {
        $('body').on('change', '.data-table select[name="limit"]', function()
        {
            var form = $(this).closest('form');
            form.find('input[name="page"]').val(1);
            form.submit();
        });

        $('body').on('click', '.data-table a.search-column', function()
        {
            var value = $(this).data('value');
            var form = $(this).closest('form');
            form.find('input[name="page"]').val(1);
            form.find('input[name="searchColumn"]').val(value);
            form.submit();
        });

        $('body').on('click', '.data-table ul.dropdown-menu a', function(e)
        {
            e.stopPropagation();
        });

        $('body').on('click', '.data-table .pagination a', function(e)
        {
            e.preventDefault();
            var url = $(this).attr('href');
            var page = url.split('?page=')[1];
            var form = $(this).closest('.panel').find('form.data-table-form');
            form.find('input[name="page"]').val(page);
            form.submit();
        });

        $('body').on('click', '.data-table a.sortable', function(e)
        {
            e.preventDefault();
            var column = $(this).data('value');
            var order = $(this).hasClass('desc') ? 'asc' : 'desc';
            var form = $(this).closest('.panel').find('form.data-table-form');
            form.find('input[name="sort"]').val(column);
            form.find('input[name="order"]').val(order);
            form.submit();
        });
    }

    function handleSummernote()
    {
        $('[data-plugin="summernote"]').summernote({
            height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear', 'style']],
                ['color', ['color']],
                ['style', ['fontname']],
                ['insert', ['picture', 'link', 'hr', 'table']],
                ['layout', ['height']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });
    }

    handleSlimScroll();
    handleSidebarMenu();
    handleResponsiveSidebar();
    handlePanelResize();
    handleDataTable();
    handleSummernote();

})(jQuery);