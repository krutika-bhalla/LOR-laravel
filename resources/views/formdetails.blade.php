@extends('layouts.app')
@section('content')

    <style>
        /*set border to the form*/

        /*form {*/
        /*    border: 3px solid #ffffff;*/
        /*}*/
        /*assign full width inputs*/

        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid rgb(245, 225, 225);
            box-sizing: border-box;
        }
        /*set a style for the buttons*/

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        /* set a hover effect for the button*/

        button:hover {
            opacity: 0.8;
        }
        /*set extra style for the cancel button*/

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /*set padding to the container*/

        .container {
            padding: 7px;
        }
        /*set the forgot password text*/

        span.psw {
            float: right;
            padding-top: 16px;
        }
        /*set styles for span and cancel button on small screens*/

        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
        /* https://gist.github.com/toddparker/32fc9647ecc56ef2b38a */
        /* Some basic page styles */
        form {
            font: 100%/1.5 AvenirNext-Regular, Corbel, "Lucida Grande", "Trebuchet Ms", sans-serif;
            color: #111;
            background-color: #fff;
            margin: 2em 10%;
        }
        /* Label styles: style as needed */
        label {
            display:block;
            /*margin: 2em 1em .25em .75em;*/
            font-size: 1.25em;
            color:#333;
        }
        .select-wrapper {
            background-color: #eee;
            border: 1px solid #aaa;
            color: #aaa;
            cursor: pointer;
            float: left;
            overflow: hidden;
            /*padding-right: 3em;*/
            position: relative;
            width: 100%;
        }
        .select {
            -webkit-appearance: none;
            background-color: #eee;
            border-width: 0;
            box-sizing: border-box;
            cursor: pointer;
            float: left;
            font-size: 1em;
            line-height: 1em;
            padding: 1em 1em;
            width: 100%;
            width: calc(100% + 2em);
        &:focus {
             outline: none;
         }
        }
        .select-icon {
            position: absolute;
            top: .8em;
            right: 1em;
        }
        .signin {
            /*background-color: #f1f1f1;*/
            text-align: center;
        }

    </style>
    </head>

    <body>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li><h5 class="alert-heading">{{ $error }}</h5>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
{{--        <div class="jumbotron">--}}
            <form action="{{route('save-formdetails')}}" method="post" enctype="multipart/form-data">
                @csrf
                <center> <h1>FORM DETAILS</h1> </center> <!--css left-->

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" name="name" required placeholder="Enter Full Name" id="examplename" aria-describedby="nameHelp">
                    <small id="nameHelp" class="form-text text-muted">First Name Middle Name Last Name</small>
                </div>
                <div class="form-group">
                    <label for="program">Program</label>
                    <input type="text" class="form-control" name="course" required placeholder="Enter Program Name" id="exampleprogram" aria-describedby="programHelp">
                    <small id="programHelp" class="form-text text-muted">Example: Masters in Management of Information System</small>
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
                        <tr id="duplicate">
                            <td><input type="text" class='form-control' required name="facname[]"></td>
                            <td><input type="number" min="1" class='form-control' required name="noheads[]"></td>
                            <td><input type="text" class='form-control' required  name="facbranch[]"></td>
                        </tr>
                        </tbody>

                    </TABLE>
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <button type="button"  class="btn btn-outline-primary" id="add-expense"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center"><button type="button" class="btn btn-outline-danger" id="remove-expense"><i class="fa fa-minus" aria-hidden="true"></i> Remove</button></div>
                    </div>

                    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
                    <script
                        src="https://code.jquery.com/jquery-3.5.1.min.js"
                        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                        crossorigin="anonymous"></script>

                    <script>
                        $(document).ready(function(){
                            // $('#remove-expense').hide();
                            $('#add-expense').on('click', function(){
                                $('#remove-expense').fadeIn("1500");
                                $('#dataTable').append('<tr id="append"><td><input type="text" class= "form-control" required name="facname[]"></td><td><input type="number" min="1" class="form-control" required name="noheads[]"></td><td><input type="text" class="form-control" required  name="facbranch[]"></td></tr>');
                                // $('#remove-expense').on('click', function(){
                                //     $('.append').parent().remove();
                                // });
                                $('#remove-expense').on('click', function() {
                                    $('#append').last().remove();
                                });
                            });
                            $('#project-form').submit(function(e) {
                                e.preventDefault();
                                // get all the inputs into an array.
                                var $inputs = $('#project-form :input');
                                //Remove Button
                                // not sure if you wanted this, but I thought I'd add it.
                                // get an associative array of just the values.
                                var values = {};
                                $inputs.each(function() {
                                    values[this.name] = $(this).val();
                                });
                                console.log(values);

                            });
                        });
                    </script>

                </div>




                <div class="form-group">
                    <label for="rl">Number of Recommendation letters</label>
                    <input type="number" min="1" class="form-control" name="rl" required placeholder="Enter Number of RLs" id="examplerl" aria-describedby="rlHelp">
                    <small id="rlHelp" class="form-text text-muted">Enter the number of Recommendation Letters required.</small>
                </div>
                <div class="form-group">
                    <label for="mobileno">Mobile Number</label>
                    <input type="tel" class="form-control" name="mobileno" required placeholder="Enter Mobile Number" id="phone">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="email" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted">Enter your email id.</small>
                </div>
                <div class="form-group">
                    <label for="passoutyear">Pass Out Year</label>
                    <input type="number" min="2000" max="2099" step="1" class="form-control" id="examplePass" placeholder="Enter Pass Out Year" name="passoutyear" required>
                </div>
                <div class="form-group">
                    <label for="refno">Reference Number</label>
                    <input type="text" class="form-control" id="exampleRN" placeholder="Enter Reference Number" name="refno" required>
                </div>
                <div class="form-group">
                    <label for="dateofissue">Date of Issue of RL</label>
                    <input type="date" class="form-control" id="exampleDate" placeholder="Enter Date of Issue of RL" name="dateofissue" required>
                </div>
{{--                <div class="form-group">--}}
{{--                    <label>Upload Letter of Recommendation</label>--}}
{{--                    <input type="file" class="form-control-file" id="custom-file-label" accept="image/*" name="imagelor1" required>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label>Upload Score Card</label>--}}
{{--                    <input type="file" class="form-control-file" id="custom-file-label" accept="image/*" name="imagelor2" required>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label>Upload Score Card</label>--}}
{{--                    <input type="file" class="form-control-file" id="custom-file-label" accept="image/*" name="imagelor3" required>--}}
{{--                </div>--}}
{{--                <script>--}}
{{--                   $('#project-form').submit(function(e) --}}
{{--                        e.preventDefault();--}}
{{--                        if(i == 3) {--}}
{{--                            $('.custom-file input').change(function (e) {--}}
{{--                                var files = [];--}}
{{--                                for (var i = 0; i < $(this)[0].files.length; i++) {--}}
{{--                                    files.push($(this)[0].files[i].name);--}}
{{--                                }--}}
{{--                                $(this).next('#custom-file-label').html(files.join(', '));--}}
{{--                            });--}}
{{--                        }--}}
{{--                        else {--}}
{{--                            console.log("cannot add more images");--}}
{{--                        }--}}
{{--                        i++;--}}
{{--                    });--}}
{{--                </script>--}}


                <button type="submit" class="btn btn-success" value="Submit Page">Submit</button>
            </form>
        </div>




    {{--    </div>--}}

    <script src="" async defer></script>
    </body>

@endsection
