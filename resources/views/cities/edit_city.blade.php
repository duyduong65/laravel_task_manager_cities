@extends('cities.city_information_form')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update city') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{route('cities.update',$city->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text"
                                       class="form-control @if($errors->has('city')) border-danger @endif"
                                       value="{{$city->cityName}}" name="city">
                                @if($errors->has('city'))
                                    <span class="text-danger">
                                            <img src="https://img.icons8.com/color/18/000000/warning-shield.png">
                                            {{$errors->first('city')}}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
