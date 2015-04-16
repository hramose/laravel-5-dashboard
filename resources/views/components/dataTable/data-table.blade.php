<form class="form-inline data-table-form" action="" method="GET">

    <div class="panel-body border-btm1 pdng-left10 pdng-right10">
        <div class="row">
            {{-- number of rows per page --}}
            <div class="col-sm-2">
                <select class="form-control space-btm5-sm" name="limit">
                    <option value="10" {{ Input::get('limit') == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ Input::get('limit') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ Input::get('limit') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ Input::get('limit') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
            <div class="col-sm-10 text-right text-center-sm">
                {{-- add a new record --}}
                <button class="btn btn-success" data-toggle="tooltip" title="Add a New Record"><i class="fa fa-plus"></i></button>

                {{-- delete selected row(s) --}}
                <button class="btn btn-danger" data-toggle="tooltip" title="Delete Selected Row(s)"><i class="fa fa-trash"></i></button>

                {{-- show/hide columns --}}
                <div class="btn-group" data-toggle="tooltip" title="Show/Hide Columns">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-table"></i> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        @foreach ($dataTable->columns as $column)
                            <li><a href="javascript:;"><input type="checkbox" name="columns[]" value="{{ $column['name'] }}"> {{ $column['label'] }}</a></li>
                        @endforeach
                        <li class="divider"></li>
                        <li><a href="javascript:;"><i class="fa fa-refresh"></i> Refresh Table</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped border-btm1 data-table">
            <thead>
            <tr class="filters">
                <th></th>
                @foreach ($dataTable->columns as $column)
                    <th>
                        @include('components.dataTable.filters.' . $column['type'], $column)
                    </th>
                @endforeach
            </tr>
            <tr>
                <th><input type="checkbox" class="select-row"></th>
                @foreach ($dataTable->columns as $column)
                    @if (!Input::has('columns') || in_array($column['name'], Input::get('columns')))
                        <th>
                            <a class="sortable  {{ Input::get('sort') == $column['name'] ? Input::get('order') : '' }}" data-value="{{ $column['name'] }}" href="javascript:;">
                                <i class="fa fa-sort {{ Input::get('sort') == $column['name'] ? (Input::get('order') == 'asc' ? 'fa-sort-asc' : 'fa-sort-desc') : 'fa-sort' }}"></i> {{ $column['label'] }}
                            </a>
                        </th>
                    @endif
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($dataTable->data as $row)
                <tr>
                    <td><input type="checkbox" class="select-row"></td>
                    @foreach ($dataTable->columns as $column)
                        @if (!Input::has('columns') || in_array($column['name'], Input::get('columns')))
                            <td>
                                @if (isset($column['link']))
                                    {!! $row->present()->{camel_case(str_replace('.', '_', $column['link']))} !!}
                                @else
                                    {{ $row->present()->{camel_case(str_replace('.', '_', $column['name']))} }}
                                @endif
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="border-top1 pdng10">
        <div class="row">
            <div class="col-sm-6 space-btm15-sm text-center-sm space-top10 space-top0-sm">
                Showing {{ ($dataTable->data->perPage() * ($dataTable->data->currentPage() - 1) + 1) }}
                to {{ $dataTable->data->hasMorePages() ? $dataTable->data->perPage() * $dataTable->data->currentPage() : $dataTable->data->total() }}
                of {{ $dataTable->data->total() }} entries
            </div>
            <div class="col-sm-6 text-center-sm text-right">{!! $dataTable->data->render() !!}</div>
        </div>
    </div>

</form>