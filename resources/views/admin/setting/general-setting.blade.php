<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
<div class="card border">
    <div class="card-body">
        <form action="{{route('admin.general-setting.update')}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Site Name</label>
                <input type="text" class="form-control" name="site_name" value="{{@$settings->site_name}}">
            </div>
            <div class="form-group">
                <label>Layout</label>
                <select name="layout" id="" class="form-control">
                    <option {{$settings->layout == 'LTR' ? 'selected' : ''}} value="LTR">LTR</option>
                    <option {{$settings->layout == 'RTL' ? 'selected' : ''}} value="RTL">RTL</option>
                </select>
            </div>
            <div class="form-group">
                <label>Contact Email</label>
                <input type="text" class="form-control" name="contact_email" value="{{@$settings->contact_email}}">
            </div>
            <div class="form-group">
                <label>Contact Phone</label>
                <input type="text" class="form-control" name="contact_phone" value="{{@$settings->contact_phone}}">
            </div>
            <div class="form-group">
                <label>Contact Address</label>
                <input type="text" class="form-control" name="contact_address" value="{{@$settings->contact_address}}">
            </div>
            <div class="form-group">
                <label>Google Map Url</label>
                <input type="text" class="form-control" name="map" value="{{@$settings->map}}">
            </div>
            <hr>
            <div class="form-group">
                <label>Default Currecy Name</label>
                <select name="currency_name" id="" class="form-control select2">
                    <option value="">Select</option>
                    @foreach (config('settings.currency_list',[]) as $currency)
                        <option {{$settings->currency_name == $currency ? 'selected' : ''}} value="{{$currency}}">{{$currency}}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label>Currency Icon</label>
                <input type="text" class="form-control" name="currency_icon" value="{{@$settings->currency_icon}}">
            </div>
{{--            <div class="form-group">--}}
{{--                <label>Timezone</label>--}}
{{--                <select name="time_zone" id="" class="form-control select2">--}}
{{--                    <option value="">Select</option>--}}
{{--                    @foreach (config('settings.time_zone',[]) as $key => $timeZone)--}}
{{--                        <option {{$settings->time_zone == $key ? 'selected' : ''}} value="{{$key}}">{{$key}}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
