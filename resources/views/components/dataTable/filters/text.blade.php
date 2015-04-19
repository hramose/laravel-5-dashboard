<input type="text" class="form-control input-sm" placeholder="Search"
       name="search[{{ $column['name'] }}]"
       value="{{ Input::has('search') && isset(Input::get('search')[$column['name']]) ? Input::get('search')[$column['name']] : '' }}">