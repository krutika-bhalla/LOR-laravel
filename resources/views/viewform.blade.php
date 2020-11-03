@extends('layouts.app')
@section('content')
<style>
    .header img {
        float: left;
        width: 80px;
        height: 80px;
        background: #555;
    }

    .header h1 {
        position: relative;
        top: 18px;
        left: 10px;
    }
    .btn{
        border-bottom-color: maroon;
        border-bottom-width: medium;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;

        border-left-color: maroon;
        border-left-width: medium;
        border-left-left-radius: 5px;
        border-left-right-radius: 5px;
    }
    .btn:hover{
        background: maroon;
        color: white;
    }
    b{
        font-size: medium;
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
    @media (max-width: 750px) {
        .flex-center img {
            display: none; !important;
            float: left;
            width: 20px;
            height: 20px;
            background: #555;
        }

        .flex-center h1 {
            position: relative;
            top: 18px;
            left: 10px;
            font-size: 15px;
        }
    }
</style>
    <div class="container-fluid">
        <div class="col-md-12">
            <a href="javascript:void(0)" onclick="window.print()" class="btn"><i class="fa fa-download" aria-hidden="true"></i> Export PDF</a>
        </div>
        <br>

        <div class="flex-center">
            <p class="header">
                <img src="{{ asset('images/logo.png') }}" style="display: inline; max-height: 70px; max-width: 70px;" >
                <h1 style="display: inline; text-align: center" ><span style="color: maroon"> K J Somaiya Institute of Engineering and Information Technology</span></h1>
            </p>
        </div>

<br><br><br>
            <h3 style="text-align: center; text-decoration: underline">Application Form</h3>
        <br>
    </div>
    <div class="container">

        @foreach($formdetails as $fd)
{{--            {{dd($fd)}}--}}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name"><b>Name</b></label>
                    <input type="name" class="form-control" value="{{$fd->name}}" readonly required placeholder="Enter Full Name" id="examplename" aria-describedby="nameHelp">
                </div>

                <div class="form-group col-md-6">
                    <label for="program"><b>Program</b></label>
                    <input type="text" class="form-control" value="{{$fd->course}}" readonly required placeholder="Enter Program Name" id="exampleprogram" aria-describedby="programHelp">

                </div>
            </div>
        <br>
            <div class="form-group">
                <label><b>Faculty Details</b></label>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered display">
                        <thead>
                        <tr>
                            <th width="30">#</th>

                            <th width="300" style="text-align: center">Faculty Name</th>
                            <th width="30" style="text-align: center">Letterheads</th>
                            <th width="250" style="text-align: center">Branch</th>

                        </tr>

                        </thead>
                        <tbody id="dataTable">
                        @foreach($formfaculty as $ff)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><input type="text" class='form-control' required value="{{$ff->facname}}" readonly></td>
                                <td><input type="number" min="1" class='form-control' required value="{{$ff->noheads}}" readonly></td>
                                <td><input type="text" class='form-control' required  value="{{$ff->facbranch}}" readonly></td>
                            </tr>
                        @endforeach

                        </tbody>

                        <tr>
                            <td></td>
                        <td>
                            <label for="rl"><b>Total Number of Recommendation Letter Heads</b></label>
                        </td>
                        <td>
                            <input type="number" min="1" class="form-control" value="{{$fd->rl}}" readonly required placeholder="Enter Number of RLs" id="examplerl" aria-describedby="rlHelp">
                        </td>
                            <td></td>
                        </tr>
                    </TABLE>
                </div>

            </div>
        <br>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="mobileno"><b>Mobile Number</b></label>
            <input type="tel" class="form-control" value="{{$fd->mobileno}}" readonly required placeholder="Enter Mobile Number" id="phone">
        </div>
        <div class="form-group col-md-4">
            <label for="email"><b>Email</b></label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="{{$fd->email}}" readonly aria-describedby="emailHelp">
        </div>
        <div class="form-group col-md-4">
            <label for="passoutyear"><b>Pass Out Year</b></label>
            <input type="number" min="2000" max="2099" step="1" class="form-control" id="examplePass" placeholder="Enter Pass Out Year" value="{{$fd->passoutyear}}" readonly required>
        </div>
    </div>
<br>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="refno"><b>Reference Number</b></label>
            <input type="text" class="form-control" id="exampleRN" placeholder="Enter Reference Number" value="{{$fd->refno}}" readonly required>
        </div>
        <div class="form-group col-md-6">
            <label for="dateofissue"><b>Date of Issue of Recommendation Letter</b></label>
            <input type="date" class="form-control" id="exampleDate" placeholder="Enter Date of Issue of RL" value="{{$fd->dateofissue}}" readonly required>
        </div>
    </div>
        @endforeach
        @foreach($form_images as $fi)
            <div class="form-group">
                <label for="dateofissue"><b>Student Files</b></label>
                <a href="http://localhost:8000/images/uploads/student_pdfs/{{$fi->image_pdf}}" target="_blank" class="form-control" id="exampleDate" type="button"  readonly required>{{$fi->image_pdf}}</a>
{{--                <embed src="{{ ::url($fi->image_pdf) }}" style="width:600px; height:800px;" frameborder="0">--}}
                {{--                --}}

{{--                --}}
            </div>
        @endforeach




    </div>

@endsection
