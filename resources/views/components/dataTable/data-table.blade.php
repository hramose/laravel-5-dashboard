<div class="panel panel-default">
    <div class="panel-heading">
        @include('components.partials.panel-header', [$title])
    </div>
    <div class="panel-collapse collapse in">
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
                                <li><a href="#"><input type="checkbox"> Column A</a></li>
                                <li><a href="#"><input type="checkbox"> Column B</a></li>
                                <li><a href="#"><input type="checkbox"> Column C</a></li>
                                <li><a href="#"><input type="checkbox"> Column D</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped border-btm1">
                <thead>
                <tr>
                    <th>Column A</th>
                    <th>Column B</th>
                    <th>Column C</th>
                    <th>Column D</th>
                </tr>
                </thead>
                <tbody>
                <tr><td>Column A</td><td>Column B</td><td>Column C</td><td>Column D</td></tr>
                <tr><td>Column A</td><td>Column B</td><td>Column C</td><td>Column D</td></tr>
                <tr><td>Column A</td><td>Column B</td><td>Column C</td><td>Column D</td></tr>
                <tr><td>Column A</td><td>Column B</td><td>Column C</td><td>Column D</td></tr>
                <tr><td>Column A</td><td>Column B</td><td>Column C</td><td>Column D</td></tr>
                <tr><td>Column A</td><td>Column B</td><td>Column C</td><td>Column D</td></tr>
                </tbody>
            </table>
        </div>
        <section class="border-top1 pdng15">
            <div class="row">
                <div class="col-sm-6 space-btm15-sm text-center-sm space-top10 space-top0-sm">
                    Showing 1 to 10 of 57 entries
                </div>
                <div class="col-sm-6 text-center-sm text-right">
                    <nav>
                        <ul class="pagination space0">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div
></div>