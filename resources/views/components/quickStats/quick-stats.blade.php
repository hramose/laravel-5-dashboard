<div class="well">
    <h4 class="space-top0"><span class="glyphicon glyphicon-stats"></span> QUICK STATS</h4>
    <table class="table table-borderless">
        <tbody>
        <tr>
            <td>Total Posts:</td>
            <td class="text-center"><span class="badge badge-default">{{ $model::all()->count() }}</span></td>
        </tr>
        <tr>
            <td>Last Year:</td>
            <td class="text-center"><span class="badge badge-default">{{ $model::lastYear()->get()->count() }}</span></td>
        </tr>
        <tr>
            <td>Last Month:</td>
            <td class="text-center"><span class="badge badge-default">{{ $model::lastMonth()->get()->count() }}</span></td>
        </tr>
        <tr>
            <td>Last Week:</td>
            <td class="text-center"><span class="badge badge-default">{{ $model::lastWeek()->get()->count() }}</span></td>
        </tr>
        </tbody>
    </table>
    <hr>
    <a href="{{ route('post_create') }}" class="btn btn-success btn-lg btn-block">
        <span class="glyphicon glyphicon-plus"></span> Create New Post
    </a>
</div>