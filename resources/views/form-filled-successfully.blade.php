@extends('layouts.app')
@section('content')
{{--    {{dd($users)}}--}}


<script type="text/javascript">
    window.history.forward();
    function noBack()
    {
        window.history.forward();
    }
</script>
<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
<div class="container" style="text-align: center">
    <h1 class="display-4">Congratulations</h1>
    <h3 >You have Successfully Filled The Form.</h3>
</div>
</body>

@endsection
