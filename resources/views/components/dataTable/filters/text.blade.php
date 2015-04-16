<input type="text" class="form-control input-sm" placeholder="Search"
       name="search[{{ $column['name'] }}]"
       value="{{ Input::get('search[' . $column['name'] . ']') }}">