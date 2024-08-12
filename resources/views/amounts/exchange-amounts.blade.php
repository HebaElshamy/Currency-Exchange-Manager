


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Exchange Amounts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-2">

                <div  class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="overflow-x-auto p-6 text-gray-900 dark:text-gray-100 ">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('ALl Exchange Amounts') }}
                        </h2>
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                @if (count($amounts)>0)
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Amount</th>
                                        @foreach ($currencies as $currency => $rate)
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                                            {{$currency}}<br>
                                            <span class="">{{$rate}}</span>
                                        </th>
                                         @endforeach

                                    </tr>
                                @endif
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                                @if (count($amounts)>0)
                                    @foreach ($amounts as $amount)

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{$amount->amount}}
                                                <br>
                                            <span class="whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{$amount->currency}}</span>
                                            </td>
                                            @foreach ($currencies as $currency => $rate)
                                                @php
                                                $computedAmount = $amount->amount;
                                                if ($amount->currency !== $currency) {
                                                    $computedAmount *= $rate;
                                                }
                                            @endphp
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{$computedAmount}}</td>
                                            @endforeach

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

                $('#currency').val(currency);
                $('#amount').val(amount);
                $('#submit-button').text('Update Amount');
                $('#amount-form').attr('action', actionUrl);

            });
        });
    </script>

</x-app-layout>




