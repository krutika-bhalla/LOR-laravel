@extends('layouts.app')
@section('content')
{{--    {{dd($users)}}--}}

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
        if (typeof history.pushState === "function") {
            history.pushState("jibberish", null, null);
            window.onpopstate = function () {
                history.pushState('newjibberish', null, null);
            };
        }
        else {
            var ignoreHashChange = true;
            window.onhashchange = function () {
                if (!ignoreHashChange) {
                    ignoreHashChange = true;
                    window.location.hash = Math.random();
                }
                else {
                    ignoreHashChange = false;
                }
            };
        }
    };
    //
    // window.addEventListener( "pageshow", function ( event ) {
    //     var historyTraversal = event.persisted ||
    //         ( typeof window.performance != "undefined" &&
    //             window.performance.navigation.type === 2 );
    //     if ( historyTraversal ) {
    //         // Handle page restore.
    //         window.location.reload();
    //     }
    // });
</script>
{{--<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">--}}
<div class="container" style="text-align: center">
    <h1 class="display-4">Congratulations</h1>
    <h3 >You have Successfully Filled The Form.</h3>
</div>
</body>

@endsection
