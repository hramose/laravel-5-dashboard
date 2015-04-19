<input type="text" class="form-control input-sm date-time-picker"
       placeholder="Search" name="search[{{ $column['name'] }}]"
       value="{{ Input::has('search') && isset(Input::get('search')[$column['name']]) ? Input::get('search')[$column['name']] : '' }}"
       data-type="date-picker" data-format="Y/m/d">