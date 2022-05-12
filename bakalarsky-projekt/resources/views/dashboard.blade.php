<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ahoj   ') }}{{ Auth::user()->name }} {{ __(', táto stránka bola vytvorená pre účeli bakalárskej práce FEI-5382-97901.') }}
        </h2>
    </x-slot>

    {{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                                <x-jet-welcome />--}}
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">


        <div style="padding: 2%" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <h1 style="color:deepskyblue; text-align: center">Základné informácie o záverečnej práci</h1>


            <div class="mt-8 overflow-hidden  sm:rounded-lg">
                <div  style="padding-left: 2%" class="ml-1">
                    <h2>
                        Typ práce:
                    </h2>
                    <p style="color: #9ca3af; padding-bottom: 10px">
                        Bakalárska práca
                    </p>
                    <h2>
                        Názov práce:
                    </h2>
                    <p style="color: #9ca3af; padding-bottom: 10px">
                        Integrácia platobnej brány do webovej aplikácie
                    </p>
                    <h2>
                        Autor:
                    </h2>
                    <p style="color: #9ca3af; padding-bottom: 10px">
                        Jakub Petrík
                    </p>
                    <h2>
                        Pracovisko:
                    </h2>
                    <p style="color: #9ca3af; padding-bottom: 10px">
                        Ústav informatiky a matematiky (FEI)
                    </p>
                    <h2>
                        Vedúci práce:
                    </h2>
                    <p style="color: #9ca3af; padding-bottom: 10px">
                        Ing. Matej Rábek, PhD.
                    </p>
                    <h2>
                        Evidenčné číslo:
                    </h2>
                    <p style="color: #9ca3af; padding-bottom: 10px">
                        FEI-5382-97901
                    </p>



                    <h2>Abstrakt:</h2>
                    <p style="color: #9ca3af">Cieľom práce je analyzovať metódy integrácie platieb do webových aplikácií. Bude navrhnutá aplikácia prezentujúca tieto metódy. Ich integrácie budú popísané a porovnané ich výhody a obmedzenia. Práca popisuje aj popis bezpečnostných provkov zahrnutých v jednotlivých metódach a ich právne opodstatnenie.</p>

                </div>
            </div>

         </div>
    </div>
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>

