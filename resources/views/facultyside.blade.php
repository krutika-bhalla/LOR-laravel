@extends('layouts.fapp')
@section('contents')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
{{--        <img src="images/uploads/facultyside_img{{ Session::get('image') }}">--}}
    @endif

    <div class="table-responsive">
        <table id="mytable" class="table table-bordered table-striped display">
            <thead>
            <tr>
                <th>#</th>
                <th scope="col">Name of Student</th>
    {{--            <th scope="col">Somaiya Email</th>--}}
                <th scope="col">Student Email</th>
                <th scope="col">Date of Issue</th>
                <th scope="col">View Form</th>
                <th scope="col">Edit</th>
            </tr>
            </thead>
            <tbody>


                    @foreach($formdetails as $fd)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$fd->name}}</td>
        {{--                    @foreach($users as $user)--}}
        {{--                        <td>{{$user->email}}</td>--}}
        {{--                    @endforeach--}}
                            <td>{{$fd->email}}</td>
                            <td>{{date('d/m/Y' , strtotime($fd->dateofissue))}}</td>
{{--                            @foreach($facimages as $fi)--}}
{{--                            @if()--}}
                            <td><a href="/viewform/{{$fd->user_id}}" type="button" class="btn btn-outline-success">View</a></td>
{{--                            @foreach($facimages as $fa)--}}
{{--                            @if($fa != True){--}}
                                <td><a href="/editform/{{$fd->user_id}}" type="button" class="btn btn-outline-danger">Edit</a></td>
{{--                                }--}}
{{--                                @else{
                            <td><a href="/editform/{{$fd->user_id}}" type="button" class="btn btn-outline-danger" disabled="true">Edit</a></td>
                            }--}}
{{--                                @endforeach--}}
                        </tr>
                    @endforeach



            </tbody>
        </table>
    </div>

@endsection
