<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-striped">
            <tr>
                <td colspan="4">Property Details</td>
            </tr>
            <tr>
                <th>Known As</th>
                <td>{{$demand->property_known_as}}</td>
                <th>Lesse&apos;s Name</th>
                <td>{{$demand->current_lessee}}</td>
            </tr>
        </table>
        <br>
        <table class="table table-bordered table-striped">
            <tr>
                <td colspan="8">Demand details</td>
            </tr>
            <tr>
                <th>Demand Id</th>
                <td>{{$demand->property_known_as}}</td>
                <th>Amount</th>
                <td>₹ {{customNumFormat($demand->net_total)}}</td>
                <th>Balance</th>
                <td>₹ {{customNumFormat($demand->balance_amount)}}</td>
                <th>FY</th>
                <td>{{$demand->current_fy}}</td>
            </tr>
        </table>
        <br>
        <!-- <table class="table table-bordered">
            <tr>
                <th>Property</th>
                <th>Unique Demand Id</th>
                <th>Financial Year</th>
                <th>Net Total</th>
                <th>Balance</th>
            </tr>
            <tr>
                <th>{{$demand->property_known_as}}</th>
                <th>{{$demand->unique_id}}</th>
                <th>{{$demand->current_fy}}</th>
                <th>₹{{customNumFormat($demand->net_total)}}</th>
                <th>₹{{customNumFormat($demand->balance_amount)}}</th>
            </tr>
        </table> -->
        <br>
    </div>
</div>
<form method="post" id="paymentDetailForm" action="{{route('applicant.demandPayment')}}">
    @csrf
    <div class="col-lg-12">
        <h5 class="mt-2 mb-2">Fill payment details</h5>
    </div>
    <input type="hidden" name="demand_id" value="{{$demand->id}}">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped mt-2">
                <tr>
                    <th>#</th>
                    <th>Perticualrs</th>
                    <th>Net total</th>
                    <th>Paid amount</th>
                    <th>Balance</th>
                    <th>Fill paymet amount</th>
                </tr>
                @foreach($demand->demandDetails as $i=>$detail)
                <input type="hidden" name="subhead_id[{{$i}}]" value="{{$detail->id}}">
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$detail->subhead_name}}</td>
                    <td>₹{{customNumFormat($detail->net_total)}}</td>
                    <td>₹{{customNumFormat($detail->paid_amount ?? 0)}}</td>
                    @php
                    $balance = $detail->balance_amount;
                    @endphp
                    <td>₹{{customNumFormat($balance)}}</td>
                    <td>
                        <input type="number" name="paid_amount[{{$i}}]" class="form-control amountToPay" min="0" max="{{$balance}}" {{ $balance == 0 ? 'disabled':'' }}>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <th colspan="5">Total amount to pay</th>
                    <th id="totalAmountToPay">₹ 0</th>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <button type="button" class="btn btn-primary" id="btnSubmitDemandPayment">Procced</button>
        </div>
    </div>
    <div class="row d-none mt-2" id="form-part-2">
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
    </div>
</form>