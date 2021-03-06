@extends('layouts.app')

@section('nav')
@endsection

@section('content')
<div class="banner">
    <div class="">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="{{ route('phonebook') }}">
                    <img alt="Brand" src="{{ asset('img/logo-2.png') }}" height="35">
                  </a>
                </div>
                <a type="button" class="btn btn-default navbar-btn navbar-right" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a>
                <p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">{{ ucfirst(Auth::user()->name) }}</a>&nbsp;&nbsp;&nbsp;</p>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </nav>
        <br><br>
    </div>
</div>
<div class="container" id="main-content">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    @foreach($phonebooks as $phonebook)
                        <hr style="margin: 0px">
                            <div class="media">
                              <div class="media-left">
                                <a href="#">
                                  <img class="media-object" src="{{ asset('img/contact.png') }}" alt="profile" width="50" height="50">
                                </a>
                              </div>
                              <div class="media-body">
                                <h4 class="media-heading">
                                    
                                    {{ $phonebook->first_name." ".$phonebook->last_name }} -
                                    <small>{{ ucwords($phonebook->street.", ".$phonebook->city.", ".$phonebook->country->name) }}</small>
                                    <small class=" edit-trigger pull-right"><a href="{{action('PhonebookController@edit', $phonebook->id)}}">Edit</a></small>
                                    
                                </h4>
                                <small>
                                    <strong>Phone:</strong> {{ $phonebook->phone_number }} 
                                    &nbsp;  &nbsp;
                                    <strong>Mobile:</strong> {{ $phonebook->mobile_number }}<br>
                                </small>
                              </div>
                            </div>
                        <hr style="margin-bottom: -1px;">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="{{ route('add_contact') }}">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Firstname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Lastname">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile_number" class="form-control" placeholder="+639 (123) 4567">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="### - ####">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" name="street" class="form-control" placeholder="Street">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" placeholder="City" >
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <select id="country-selector" class="form-control" name="country" >
                                <option>- Country -</option>
                                @foreach($countries as $country)
                                <option value='{{ $country->id }}'>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="state" class="form-group hidden">
                             <label>State</label>
                            <select id="state-selector" name="state" class="form-control" name="country" >
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Add Contact</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $("#country-selector").on("change",function(){
            var state = $("#state-selector");
            $.getq('getBookings',"../state/get/"+$(this).val(),null,function(data){
                var raw = jQuery.parseJSON(data);
                var interface = "";
                $.each(raw,function(key,e){
                    interface += "<option value='"+e.id+"''>"+e.name+"</option>";
                });
                $(state).html(interface);
                $("#state").removeClass("hidden");
            });
            $.ajaxq.clear('getBookings');
        });
    </script>
@endsection