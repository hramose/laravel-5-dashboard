<div class="row">
    <h3 class="panel-title col-sm-10 col-xs-8">{{ $title }}</h3>
    <div class="col-sm-2 col-xs-4 text-right">
        <a class="btn btn-xs btn-default btn-circle">
            <i class="fa fa-plus"></i>
        </a>
        <a class="btn btn-xs btn-default btn-circle" data-toggle="collapse" data-parent=".panel" href=".panel-collapse">
            <i class="fa fa-minus"></i>
        </a>
        <a class="btn btn-xs btn-default btn-circle" onclick="$(this).closest('.panel').hide()">
            <i class="fa fa-close"></i>
        </a>
    </div>
</div>