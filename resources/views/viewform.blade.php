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
            <h3 style="text-align: center;">Application Form</h3>
        </div><br>
    </div>
    <div class="container">

        @foreach($formdetails as $fd)
{{--            {{dd($fd)}}--}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" value="{{$fd->name}}" readonly required placeholder="Enter Full Name" id="examplename" aria-describedby="nameHelp">

            </div>
            <div class="form-group">
                <label for="program">Program</label>
                <input type="text" class="form-control" value="{{$fd->course}}" readonly required placeholder="Enter Program Name" id="exampleprogram" aria-describedby="programHelp">

            </div>
            <div class="form-group">
                <label>Faculty Details</label>
                <TABLE width="500" class="table table-striped table-bordered">
                    <thead>
                    <tr>

                        <th width="300" style="text-align: center">Faculty Name</th>
                        <th width="30" style="text-align: center">Letterheads</th>
                        <th width="250" style="text-align: center">Branch</th>

                    </tr>
                    </thead>
                    <tbody id="dataTable">
                    @foreach($formfaculty as $ff)
                    <tr id="duplicate">

                        <td><input type="text" class='form-control' required value="{{$ff->facname}}" readonly></td>
                        <td><input type="number" min="1" class='form-control' required value="{{$ff->noheads}}" readonly></td>
                        <td><input type="text" class='form-control' required  value="{{$ff->facbranch}}" readonly></td>
                    </tr>
                    @endforeach
                    </tbody>

                </TABLE>


    </div>
    <div class="form-group">
        <label for="rl">Number of Recommendation letters</label>
        <input type="number" min="1" class="form-control" value="{{$fd->rl}}" readonly required placeholder="Enter Number of RLs" id="examplerl" aria-describedby="rlHelp">

    </div>
    <div class="form-group">
        <label for="mobileno">Mobile Number</label>
        <input type="tel" class="form-control" value="{{$fd->mobileno}}" readonly required placeholder="Enter Mobile Number" id="phone">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="{{$fd->email}}" readonly aria-describedby="emailHelp">

    </div>
    <div class="form-group">
        <label for="passoutyear">Pass Out Year</label>
        <input type="number" min="2000" max="2099" step="1" class="form-control" id="examplePass" placeholder="Enter Pass Out Year" value="{{$fd->passoutyear}}" readonly required>
    </div>
    <div class="form-group">
        <label for="refno">Reference Number</label>
        <input type="text" class="form-control" id="exampleRN" placeholder="Enter Reference Number" value="{{$fd->refno}}" readonly required>
    </div>
    <div class="form-group">
        <label for="dateofissue">Date of Issue of RL</label>
        <input type="date" class="form-control" id="exampleDate" placeholder="Enter Date of Issue of RL" value="{{$fd->dateofissue}}" readonly required>
    </div>

        @endforeach




    </div>

@endsection
