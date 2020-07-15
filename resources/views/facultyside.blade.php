@extends('layouts.fapp')
@section('contents')

    <table class="table table-striped table-bordered w-20">
        <thead>
        <tr>
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
                    <td>{{$fd->name}}</td>
{{--                    @foreach($users as $user)--}}
{{--                        <td>{{$user->email}}</td>--}}
{{--                    @endforeach--}}
                    <td>{{$fd->email}}</td>
                    <td>{{date('d/m/Y' , strtotime($fd->dateofissue))}}</td>

                    <td><a href="/viewform/{{$fd->user_id}}" type="button" class="btn btn-outline-success">View</a></td>
                    <td><a href="#" type="button" class="btn btn-outline-danger">Edit</a></td>
                    </tr>
                @endforeach



        </tbody>
    </table>

@endsection
