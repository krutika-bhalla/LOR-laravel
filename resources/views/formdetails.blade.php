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
            <form action="{{route('save-formdetails')}}" id="no-back" method="POST">
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

                            <th width="300">Faculty Name</th>
                            <th width="30">Number of Letterheads</th>
                            <th width="250">Branch</th>

                        </tr>
                        </thead>
                        <tbody id="dataTable">
                        <tr>

                            <td><input type='name' class='form-control' required name='facname'></td>
                            <td><input type='number' min="1" class='form-control' required name='noheads' /></td>
                            <td><input type='name' class='form-control' required name='facbranch' /></td>
                        </tr>
                        </tbody>
                    </TABLE>
                    
{{--                    <INPUT type="button" value="Add Row" onClick="addRow('dataTable')" />--}}

{{--                    <INPUT type="button" value="Delete Row" onClick="deleteRow('dataTable')" />--}}

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
                <div class="form-group">
                    <label>Upload Letter of Recommendation</label>
                    <input type="file" class="form-control-file" name="imglor[]" multiple required>
                </div>
                <div class="form-group">
                    <label>Upload Scorecard/s</label>
                    <input type="file" class="form-control-file" name="imgscorecards[]" multiple required>
                </div>
                <button type="submit" class="btn btn-success" onclick="logMeOut(event)" value="Submit Page">Submit</button>
            </form>
        </div>
    <script>
        function logMeOut(e) {
            e.preventDefault();
            window.location.hash="no-back-button";
            window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
            window.onhashchange=function(){window.location.hash="no-back-button";}
            document.getElementById('no-back').submit();
        }
    </script>



    {{--    </div>--}}

    <script src="" async defer></script>
    </body>

@endsection
