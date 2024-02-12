@props(['formElement','type'])


@if(!empty($formElement))
    <div class="form-group">
        <label>{{$formElement['name'] ?? ""}}</label>
        @switch($type)
            @case('text')
                <input type="text" class="form-control {{$formElement['class'] ?? ""}}" name="{{$formElement['name']}}"
                       value="{{$formElement['value']}}">
                @break
            @case('status')
                <select id="inputState" class="form-control" name="status">
                    <option {{$formElement['value'] === 1 ? 'selected': ''}} value="1">Bật</option>
                    <option {{$formElement['value'] === 0 ? 'selected': ''}} value="0">Tắt</option>
                </select>

                @break

            @default

        @endswitch


    </div>

@endif
