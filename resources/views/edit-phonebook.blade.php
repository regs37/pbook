@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="panel panel-default col-sm-6 col-sm-offset-3">
        <div class="panel-body">
                <a href="{{ route('phonebook') }}"><-- Back</a><br><br>
            <form method="POST" action="{{action('PhonebookController@update', $id)}}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" name="first_name" class="form-control" placeholder="Firstname" value="{{ $phonebook->first_name }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Lastname</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Lastname" value="{{ $phonebook->last_name }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Mobile Number</label>
                        <input type="text" name="mobile_number" class="form-control" placeholder="+639 (123) 4567" value="{{ $phonebook->mobile_number }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="### - ####" value="{{ $phonebook->phone_number }}">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Street</label>
                    <input type="text" name="street" class="form-control" placeholder="Street" value="{{ $phonebook->street }}">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" class="form-control" placeholder="City"value="{{ $phonebook->city }}" >
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <select id="country-selector" class="form-control" name="country" >
                        <option>- Country -</option>
                        @foreach($countries as $country)
                            @if ($country->id === $phonebook->country_id)
                                 <option value='{{ $country->id }}' selected>{{ $country->name }}</option>
                            @else
                                <option value='{{ $country->id }}'>{{ $country->name }}</option>
                            @endif
                       
                        @endforeach
                    </select>
                </div>
                <div id="state" class="form-group">
                    <label>State</label>
                    <select id="state-selector" name="state" class="form-control" name="country" >
                        @foreach($states as $state)
                            @if ($state->id === $phonebook->state_id)
                                <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                            @else
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Update Contact</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $("#country-selector").on("change",function(){
            var state = $("#state-selector");
            $.getq('getBookings',"../../state/get/"+$(this).val(),null,function(data){
                var raw = jQuery.parseJSON(data);
                var interface = "";
                $.each(raw,function(key,e){
                    interface += "<option value='"+e.id+"''>"+e.name+"</option>";
                });
                $(state).html(interface);
            });
            $.ajaxq.clear('getBookings');
        });
    </script>
@endsection