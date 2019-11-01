@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-xl-auto">
            <table>
                <tr>
                    <td>
                        <a href="{{route('customers.create')}}"><img
                                src="https://img.icons8.com/nolan/50/000000/add.png">
                        </a>
                    </td>
            </table>
            <form action="{{route('customers.search')}}" method="get" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <input type="text" name="search" class="form-control" style="border: #6c757d solid 1px; border-radius: 5px">
                        </td>
                        <td>
                            <button type="submit" style="border-radius: 5px">
                                <img src=" https://img.icons8.com/nolan/30/000000/search.png">
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
            <div class="col-xl-auto-" style="border:#95999c solid 1px">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">City</th>
                        <th scope="col">image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$customer->firstName}}</td>
                            <td>{{$customer->lastName}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->city->cityName}}</td>
                            <td><img src="{{asset("storage/$customer->image")}}" class="img-fluid" alt=""
                                     width="100"></td>
                            <td>
                                <a href="{{route('customers.destroy',$customer->id)}}">
                                    <img src="https://img.icons8.com/nolan/30/000000/delete-sign.png" alt="delete">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('customers.edit',$customer->id)}}">
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
