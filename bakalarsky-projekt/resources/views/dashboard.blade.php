<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    {{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                                <x-jet-welcome />--}}
                <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                        <h1 style="color:deepskyblue">Integrácia platobnej brány do webovej aplikácie</h1>
                    </div>

                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                        <div  style="" class="ml-1">
                            <h2>Abstrakt:</h2>
                            <p style="color: #9ca3af">Cieľom práce je analyzovať metódy integrácie platieb do webových aplikácií. Bude navrhnutá aplikácia prezentujúca tieto metódy. Ich integrácie budú popísané a porovnané ich výhody a obmedzenia. Práca popisuje aj popis bezpečnostných provkov zahrnutých v jednotlivých metódach a ich právne opodstatnenie.</p>
                        </div>
                    </div>

                    <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                        <div class="text-center text-sm text-gray-500 sm:text-left">
                            <div class="flex items-center">

                                <a class="ml-1 ">
                                    Vedúci práce:
                                </a>

                                <a  class="ml-1 underline">
                                    Ing. Matej Rábek, PhD
                                </a>

                                <a  class="ml-4 ">
                                    Práca udelená pre:
                                </a>

                                <a  class="ml-1 underline">
                                    Jakub Petrík
                                </a>
                            </div>
                        </div>
                 </div>
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>

