<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ahoj   ') }}{{ Auth::user()->name }}{{__(', akým sposôbom chcete vykonať platbu:')}}
        </h2>
    </x-slot>
    <div >
        <style type="text/css">.Row {
                display: table;
                width: 100%; /*Optional*/
                table-layout: fixed; /*Optional*/
                border-spacing: 10px; /*Optional*/
            }
            .Column {
                display: table-cell;
                /*background-color: red; !*Optional*!*/
            }</style>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">


            <div style=" padding: 3%;" class=" mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg Row">

                <div  style="padding: 3%;width: 30%; background-color: #9ca3af;  text-align: center" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg Column">
                    <a href="stripe2"> <img style="border-radius: 12px; width: 92%; padding-bottom: 2%" src="images/stripe_pravidelny.png" alt="card"></a>
                    <a style="font-size: 16px; font-weight: bold;  "  >Platba s predvolenou hodnotou - 5 alebo 10€</a><br>
                    <label >Tento spôsob platby je určený pre mesačných darcov, kde je darca pravideľne prispieva v mesačnom intervali. Tento spôsob je distribuovaný spoločnosťou Stripe.</label>
                </div>

                <div  style="padding: 3%;width: 30%; background-color: #9ca3af; text-align: center" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg Column">
                    <a href="stripe" ><img style="border-radius: 12px; width: 95%;" src="images/stripe_jednorazovy.png" alt="card"></a>
                    <a style="font-size: 16px; font-weight: bold;"  >Platba s Vami zvolenou hodnotou</a><br><br>
                    <label >Tento spôsob platby je určený pre jednorázových darcov, kde je darca pravideľne prispieva v ľubovoľnej sume. Tento spôsob je distribuovaný spoločnosťou Stripe.</label>
                </div>

                <div  style="padding: 3%;width: 30%; background-color: #9ca3af; text-align: center" class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg Column">
                    <a href="paypal" ><img style="border-radius: 12px;" src="images/paypal_jednorazovy.png" alt="card"></a>
                    <a style="font-size: 16px; font-weight: bold;" >Platba s Vami zvolenou hodnotou</a><br><br>
                    <label >Tento spôsob platby je určený pre jednorázových darcov, kde je darca pravideľne prispieva v ľubovoľnej sume. Tento spôsob je distribuovaný spoločnosťou Paypal.</label>
                </div>


        </div>
        </div>
    </div>

</x-app-layout>

