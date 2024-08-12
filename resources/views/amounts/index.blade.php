


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Amounts') }}
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
                    <form id="amount-form" action="{{ route('amounts.store') }}" method="POST">
                        @csrf

                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Add Amount') }}
                        </h2>
                        <div>
                            <x-text-input type="number" id="amount" name="amount" step="0.01" placeholder="Amount" class="mt-1 block w-full" required autofocus autocomplete="name" />
                        </div>

                        <div>

                            {{-- Currency Select --}}
                            <select name="currency" id="currency" class="mt-1 block w-full text-lg dark:bg-gray-900 dark:text-gray-500" required>
                                <option value="" class="">Select Currency</option>
                                @foreach ($currencies as $currency => $rate)
                                    <option value="{{$currency}}">{{$currency}}</option>
                                @endforeach
                                <option value="other" class="">Other</option>
                            </select>
                        </div>
                        <div id="custom-currency-container" class="hidden mt-2">
                            <x-text-input type="text" id="custom-currency" name="custom_currency" placeholder="Enter custom currency" class="block w-full"  />
                        </div>

                        <div class="mt-3">
                            <x-primary-button id="submit-button" type="submit">{{ __('Add Amount') }}</x-primary-button>

                        </div>
                    </form>
                </div>
                <div  class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="overflow-x-auto p-6 text-gray-900 dark:text-gray-100 ">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('All Amounts') }}
                        </h2>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                @if (count($amounts)>0)
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Amount</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Currency Code</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Last Update</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Actions</th>
                                    </tr>
                                @endif
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                                @if (count($amounts)>0)
                                    @foreach ($amounts as $amount)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{$amount->amount}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{$amount->currency}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{$amount->updated_at->diffForHumans()}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 edit-button" data-action= "{{ route('amounts.update', $amount->id) }}" data-currency="{{$amount->currency }}" data-amount="{{ $amount->amount }}">Edit</a>
                                                <form action="{{ route('amounts.destroy', $amount->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 ml-4">Delete</button>
                                                    </form>
                                                    </td>
                                        </tr>
                                    @endforeach
                                @else
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("No amounts have been added.") }}
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
            var amount = $(this).data('amount');
            var actionUrl = $(this).data('action');
            $('#amount').val(amount);

            var $currencySelect = $('#currency');
            var currencyExists = $currencySelect.find('option[value="' + currency + '"]').length > 0;

            if (currencyExists) {

                $currencySelect.val(currency);
                $('#custom-currency').val('');
            } else {

                $currencySelect.val('other');
                $('#custom-currency-container').removeClass('hidden');
                $('#custom-currency').val(currency);
            }


            $('#submit-button').text('Update Amount');
            $('#amount-form').attr('action', actionUrl);
        });
    });

    $(document).ready(function() {
        $('#currency').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'other') {
                $('#custom-currency-container').removeClass('hidden');
            } else {
                $('#custom-currency-container').addClass('hidden');
            }
        });
    });
    </script>

</x-app-layout>




