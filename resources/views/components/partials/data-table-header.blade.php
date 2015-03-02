<div class="panel-body border-btm1">
    <div class="row">
        <div class="col-sm-3">
            <form class="form-inline">
                <select class="form-control space-btm5-sm">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                    <option>100</option>
                </select>
            </form>
        </div>
        <div class="col-sm-9 text-right">
            <form class="form-inline">
                <input type="text" class="form-control space-btm5-sm" placeholder="Search in the result">
                <div class="btn-group block-sm">
                    <button type="button" class="btn btn-default dropdown-toggle btn-block-sm" data-toggle="dropdown" aria-expanded="false">
                        Show / Hide Columns <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        @foreach ($columns as $column)
                            <li><a href="#"><input type="checkbox"> {{ $column }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>