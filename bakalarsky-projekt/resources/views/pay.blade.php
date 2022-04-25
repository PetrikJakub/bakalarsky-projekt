<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ahoj   ') }}{{ Auth::user()->name }}{{__(', akým sposôbom chcete vykonať platbu:')}}
        </h2>
    </x-slot>


    {{--    <div class="py-12">--}}
        {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
            {{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
                {{--                                <x-jet-welcome />--}}
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">


                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                        <div  style="" class="ml-1">

                            <a href="stripe2" >Platba s predvolenou hodnotou - 5 alebo 10€</a>

                        </div>
                    </div>
                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                        <div  style="" class="ml-1">


                            <a href="stripe" >Platba s Vami zvolenou hodnotou</a>
                        </div>
                    </div>

</x-app-layout>

