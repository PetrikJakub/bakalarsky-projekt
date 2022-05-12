{{--<!doctype html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <title>PayPal</title>--}}
{{--    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>--}}
{{--</head>--}}
{{--<body>--}}
{{--<a class="btn btn-primary m-3" href="{{ route('processTransaction') }}">10eur</a>--}}
{{--@if(\Session::has('error'))--}}
{{--    <div class="alert alert-danger">{{ \Session::get('error') }}</div>--}}
{{--    {{ \Session::forget('error') }}--}}
{{--@endif--}}
{{--@if(\Session::has('success'))--}}
{{--    <div class="alert alert-success">{{ \Session::get('success') }}</div>--}}
{{--    {{ \Session::forget('success') }}--}}
{{--@endif--}}
{{--</body>--}}
{{--</html>--}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Realizácia platby cez Paypal SandBox') }}
        </h2>
    </x-slot>
    <div class="py-12 " style="width: 50%; text-align: center; margin-left: 25%">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <head>

                    <meta charset="utf-8">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
                    <title>PayPal</title>
                    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
                </head>
                <body>
                   <div class="container" >
                                <div class="row">
                                    @if(\Session::has('success'))
                                        <div style=" padding: 3%;border-radius: 12px;" class=" mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg Row">
                                            <div class="alert alert-success" style="background-color: green;border-radius: 2px; text-align: center" >{{ \Session::get('success') }}</div>
                                        </div>
                                        {{ \Session::forget('success') }}
                                    @endif
                                    <form class='form-row row' action="{{ route('processTransaction') }}">
                                        <div class=" col-md-offset-3">
                                            <div class="panel panel-default">
                                                <div class='form-row row'>
                                                  <div class='col-xs-12 form-group required'>
                                                    <x-jet-label class='control-label'  value="{{ __('Zadajte sumu, ktorú chcete darovať:') }}"  />
                                                    <x-jet-input
                                                        class='form-control block mt-1 w-full' type='number'  step="0.01" id="price" name="price"/>
                                                  </div>
                                                </div><br>
                                        <div class="col-xs-12 " style="text-align: center">
                                            <x-jet-button class=" vertical-center center" type="submit">Prispieť</x-jet-button>
                                        </div>
                                                <br>





                {{--                                <a class="btn btn-primary m-3" href="{{ route('processTransaction',['price'-]) }}">Odoslať</a>--}}

                                                @if(\Session::has('error'))
                                                    <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                                    {{ \Session::forget('error') }}
                                                @endif
                                                @if(\Session::has('success'))
                                                    <div class="alert alert-success">{{ \Session::get('success') }}</div>
                                                    {{ \Session::forget('success') }}
                                                @endif
                                            </div>
                                        </div>

                                    </form>
                        </div>
                    </div>


                </body>
            </div>
            <small>Použite testovacie meno : sb-1ccbe15104104@personal.example.com a heslo: B_#5Qpa7</small>

            <?php
//    public function anyData(Request $request)
//{
//    $date1 = $request->input('datepicker1');
//    $date2 = $request->input('datepicker2');
//
//     $waz = average::select([
//                'id',
//                'End Time',
//                'Station',
//                'Unit',
//                'Value'
//        ])->whereBetween('End Time', ['$date1', '$date2']);
//    return Datatables::of($waz)->make(true);
//}
//?>
        </div>
    </div>
</x-app-layout>
