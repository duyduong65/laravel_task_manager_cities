@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-xl-auto">
            <a href="{{route('cities.create')}}"><img src="https://img.icons8.com/nolan/50/000000/add.png"></a>
            <div class="col-xl-auto-" style="border:#95999c solid 1px">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col" colspan="3">City Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $key => $city)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td ><a href="">{{$city->cityName}}</a></td>
                            <td>
                                <a href="{{route('cities.destroy',$city->id)}}">
                                    <img src="https://img.icons8.com/nolan/30/000000/delete-sign.png">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('cities.edit',$city->id)}}">
                                    <img src="https://img.icons8.com/nolan/30/000000/edit.png">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
