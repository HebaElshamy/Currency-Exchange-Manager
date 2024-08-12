
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-5 text-gray-900 dark:text-gray-100 ">
                        <div class=" flex justify-start px-5" >
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __(' Welcome to the Currency Management System!') }}
                            </h2>
                        </div>
                    </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <div class="mb-5 flex justify-start px-5" >
                            <a href="{{ route('currencies.index') }}" class="uppercase inline-block dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-600 font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                {{ __('Manage Currencies') }}
                            </a>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <div class="mb-5 flex justify-start px-5" >
                            <a href="{{ route('amounts.index') }}" class="uppercase inline-block dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-600 font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                {{ __('Manage Amounts') }}
                            </a>
                        </div>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100 ">
                        <div class="mb-5 flex justify-start px-5" >
                            <a href="{{ route('amounts.exchange.amount') }}" class="uppercase inline-block dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-600 font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                                {{ __('ALl Exchange Amounts') }}
                            </a>
                        </div>
                    </div>



                </div>

            </div>

        </div>


    </x-app-layout>




