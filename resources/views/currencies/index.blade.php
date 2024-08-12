


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Currencies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5 flex justify-end px-5">
                <a href="{{ route('amounts.exchange.amount') }}" class="uppercase inline-block dark:bg-gray-200 dark:text-gray-800 hover:bg-gray-600 font-semibold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    {{ __('ALl Exchange Amounts') }}
                </a>
            </div>
            @if($errors->any())
                <div class="alert-danger dark:bg-red-900 dark:text-red-200 bg-red-100 text-red-800 p-4 rounded">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <form action="{{ route('currencies.store') }}" method="POST">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Add Currency') }}
                        </h2>
                        <div>
                            <x-text-input id="currency-input" name="currency" type="text" class="mt-1 block w-full" placeholder="Currency Code (e.g., USD)"  required autofocus autocomplete="currency" />
                        </div>
                        <div>

                            <x-text-input id="rate-input" name="rate" type="number" step="0.01" class="mt-1 block w-full" placeholder="Exchange Rate"  required autofocus autocomplete="rate" />
                        </div>
                        <div class="mt-3">
                            <x-primary-button id="submit-button" type="submit">{{ __('Add Currency') }}</x-primary-button>

                        </div>
                    </form>
                </div>
                <div  class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="overflow-x-auto p-6 text-gray-900 dark:text-gray-100 ">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('All Currencies') }}
                        </h2>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                @if (!empty($currencies))
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Currency</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Rate</th>
                                        {{-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Role</th> --}}
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Actions</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                                @if (!empty($currencies))
                                    @foreach ($currencies as $currency => $rate)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{$currency}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{$rate}}</td>
                                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">Admin</td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 edit-button" data-currency="{{ $currency }}" data-rate="{{ $rate }}">Edit</a>
                                                <form action="{{ route('currencies.destroy', $currency) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 ml-4">Delete</button>
                                                    </form>
                                                    </td>
                                        </tr>
                                    @endforeach
                                @else
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("No currencies have been added.") }}
                                </p>
                                @endif



                            </tbody>
                        </table>
                    </div>


                </div>


            </div>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-button').on('click', function(event) {
                event.preventDefault();
                var currency = $(this).data('currency');
                var rate = $(this).data('rate');
                $('#currency-input').val(currency);
                $('#rate-input').val(rate);
                $('#submit-button').text('Update Currency');
                $('#currency-input').prop('readonly', true);
            });
        });
    </script>

</x-app-layout>




