<div class="panel-body border-btm1">
    <div class="row">
        <form class="form-inline data-table-form" action="" method="GET">
            <div class="col-sm-2">
                <select class="form-control space-btm5-sm" name="limit">
                    <option value="10" {{ Input::get('limit') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ Input::get('limit') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ Input::get('limit') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ Input::get('limit') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
            <div class="col-sm-10 text-right">
                <form class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control space-btm5-sm" placeholder="Search in the result" name="search" value="{{ Input::get('search') }}">
                        <div class="input-group-btn">
                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle space-btm5-sm">
                                <i class="fa fa-search"></i>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                @foreach ($columns as $value => $column)
                                    <li><a href="javascript:;" class="search-column" data-value="{{ $value }}">{{ $column }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="btn-group btn-block-sm">
                        <button class="btn btn-default dropdown-toggle col-xs-10" data-toggle="dropdown">
                            Show / Hide Columns <span class="caret"></span>
                        </button>
                        <button type="submit" class="btn btn-default col-xs-2"><i class="fa fa-refresh"></i></button>
                        <ul class="dropdown-menu btn-block-sm" role="menu">
                            @foreach ($columns as $value => $column)
                                <li>
                                    <a href="javascript:;">
                                        <input type="checkbox" name="columns[]" value="{{ $value }}" {{ !Input::has('columns') || in_array($value, Input::get('columns')) ? 'checked' : '' }}>
                                        {{ $column }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <input type="hidden" name="searchColumn" value="{{ Input::get('searchColumn') }}">
                    <input type="hidden" name="sort" value="{{ Input::get('sort') }}">
                    <input type="hidden" name="order" value="{{ Input::get('order') }}">
                    <input type="hidden" name="page" value="{{ Input::get('page') }}">
                </form>
            </div>
        </form>
    </div>
</div>