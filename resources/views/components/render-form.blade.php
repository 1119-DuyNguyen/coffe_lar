@props(['formElement','type'])


@if(!empty($formElement))
    <div class="form-group">
        <label
            class="lowercase-and-capitalize-first-letter">{{$formElement['label'] ?? ""}}{!!   empty($formElement['optional']) ? '<sup class="text-danger-600 dark:text-danger-400 font-medium">*</sup>' :""  !!}</label>
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
            @case('checkbox')
                <div class="row">
                    @foreach($formElement['optionValues'] as $option)
                        @php
                            $optionValue=$option[$formElement['optionKey']];
                            if (empty($formElement['value'])) $formElement['value']=[];
                            elseif (! is_array($formElement['value'])) $formElement['value']=[$formElement['value']];

                        @endphp
                        <div class="col-12 col-sm-6 col-lg-4 ">
                            <input type="checkbox" name="{{$formElement['name']}}[]" value="{{$optionValue}}"
                                {{in_array($optionValue,$formElement['value']) ? "checked" :""}} >
                            {{$option[$formElement['optionLabel']]}}
                        </div>
                    @endforeach
                </div>
                @break
            @case('status')
                <select class="form-control" name="status">
                    <option {{$formElement['value'] === 1 ? 'selected': ''}} value="1">Bật</option>
                    <option {{$formElement['value'] === 0 ? 'selected': ''}} value="0">Tắt</option>
                </select>

                @break
            @case('textfield')
                <textarea name="{{$formElement['name']}}"
                          class="form-control {{$formElement['class'] ?? ""}}">{!! $formElement['value'] !!}</textarea>
                @break

            @default
                <input type="{{$formElement['type']}}" class="form-control {{$formElement['class'] ?? ""}}"
                       name="{{$formElement['name']}}"
                       value="{{$formElement['value']}}">
        @endswitch


    </div>

@endif
