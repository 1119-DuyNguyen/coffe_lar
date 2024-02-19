@props(['formElement','type'])


@if(!empty($formElement))
    <div class="form-group">
        <label>{{$formElement['label'] ?? ""}}</label>
        @switch($formElement['type'])
            @case('select')
                <select class="form-control" name="{{$formElement['name']}}">
                    @foreach($formElement['optionValues'] as $option)
                        @php
                            $optionValue=$option[$formElement['optionKey']];

                        @endphp
                        <option
                            value="{{$optionValue}}" {{ ($optionValue == $formElement['value'] ) ? 'selected': ""  }} >
                            {{$option[$formElement['optionLabel']] }}</option>
                    @endforeach
                </select>
                @break

            @case('status')
                <select class="form-control" name="status">
                    <option {{$formElement['value'] === 1 ? 'selected': ''}} value="1">Bật</option>
                    <option {{$formElement['value'] === 0 ? 'selected': ''}} value="0">Tắt</option>
                </select>

                @break

            @default
                <input type="{{$formElement['type']}}" class="form-control {{$formElement['class'] ?? ""}}"
                       name="{{$formElement['name']}}"
                       value="{{$formElement['value']}}">
        @endswitch


    </div>

@endif
