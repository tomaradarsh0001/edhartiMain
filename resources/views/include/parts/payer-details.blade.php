<div class="col-lg-2">
    <label for="">Payment Mode</label>
</div>
<div class="col-lg-4">
    <input type="radio" name="payment_mode" value="PAY_ONLINE" id="mode_online"> <label for="mode_online">Online</label>
</div>
<div class="col-lg-4">
    <input type="radio" name="payment_mode" value="PAY_OFFLINE" id="mode_offline"> <label for="mode_offline">Offline</label>
</div>
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">First Name <span class="text-danger">*</span></label>
                <input type="text" name="payer_first_name" id="payer_first_name" class="form-control" placeholder="Enter Name" required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Last Name</label>
                <input type="text" name="payer_last_name" id="payer_last_name" class="form-control" placeholder="Enter Name">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Mobile <span class="text-danger">*</span></label>
                <input type="text" name="payer_mobile" id="payer_mobile" class="form-control" placeholder="Mobile No." required>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label for="">Email <span class="text-danger">*</span></label>
                <input type="email" name="payer_email" id="payer_email" class="form-control" placeholder="Email" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Address Line 1 <span class="text-danger">*</span></label>
                <input type="text" name="address_1" id="address_1" class="form-control" placeholder="Address line 1" required>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Address Line 2</label>
                <input type="text" name="address_2" id="address_2" class="form-control" placeholder="Address line 2">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Region</label>
                <input type="text" name="region" id="region" class="form-control" placeholder="Region">
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Postal code</label>
                <input type="text" name="postal_code" id="postal_code" class="form-control" placeholder="Postal code">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">Country<span class="text-danger">*</span></label>
                <select name="country" id="country_select" required class="form-control">
                    <option value="">Select</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}" {{$country->name == 'India' ? 'selected': ''}}>{{$country->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="">State<span class="text-danger">*</span></label>
                <select name="state" id="state_select" required class="form-control">
                    <option value="">Select</option>
                    @foreach($states as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label for="city_select">City<span class="text-danger">*</span></label>
                <select name="city" id="city_select" required class="form-control"></select>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 mt-2">
    <button type="submit" class="btn btn-primary">
        Submit
    </button>
</div>