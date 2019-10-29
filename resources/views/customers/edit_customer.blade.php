@extends('cities.city_information_form')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update customer') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{route('customers.update',$customer->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="firstName" value="{{$customer->firstName}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastName" value="{{$customer->lastName}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" value="{{$customer->phone}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address" value="{{$customer->address}}">
                            </div>
                            <div class="form-group">
                                <select name="city_id" class="custom-select mr-sm-2">
                                    @foreach($listCity as $city)
                                        <option value="{{$city->id}}"
                                        @if($city->id == $customer->city_id)
                                            selected
                                        @endif
                                        >{{$city->cityName}}</option>
                                    @endforeach
                                </select>
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
