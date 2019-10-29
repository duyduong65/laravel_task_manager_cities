@extends('cities.city_information_form')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Customer') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{route('customers.create')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter first name" name="firstName">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter last name" name="lastName">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter phone number" name="phone">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter address" name="address">
                            </div>
                            <div class="form-group">
                                <select name="city_id" class="custom-select mr-sm-2">
                                    @foreach($listCity as $city)
                                        <option value="{{$city->id}}">{{$city->cityName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
