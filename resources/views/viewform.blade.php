@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="col-md-12">
            <a href="javascript:void(0)" onclick="window.print()" class="btn btn-success"><i class="fa fa-download" aria-hidden="true"></i> Export PDF</a>
        </div>
        <div class="row-md-12">
            <h1 style="text-align: center; padding-bottom: 35px; ">
                K J Somaiya Institute of Engineering and Information Technology
            </h1>
            <h3 style="text-align: center;">Letter of Recommendation</h3>
        </div><br>
        {{dd($formfaculty)}}
        @foreach($formdetails as $fd)
            {{dd($fd)}}

        <label>Name: </label> {{$fd->name}}

        @endforeach




    </div>

@endsection
