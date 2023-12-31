@extends('layouts.master')

@section('content')

    <!-- Content
  ============================================= -->
    <div id="content" class="py-4">
        <div class="container">
            <!-- Steps Progress bar -->
            <div class="row mt-4 mb-5">
                <div class="col-lg-11 mx-auto">
                    <div class="row widget-steps">
                        <div class="col-4 step active">
                            <div class="step-name">Details</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="step-dot"></a></div>
                        <div class="col-4 step disabled">
                            <div class="step-name">Confirm</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="step-dot"></a></div>
                        <div class="col-4 step disabled">
                            <div class="step-name">Success</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="step-dot"></a></div>
                    </div>
                </div>
            </div>
            <h2 class="fw-400 text-center mt-3">Send Money</h2>
            <p class="lead text-center mb-4">Send your money on anytime, anywhere in the world.</p>
            <div class="row">
                <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                    <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                        <h3 class="text-5 fw-400 mb-3 mb-sm-4">Personal Details</h3>
                        <hr class="mx-n3 mx-sm-n5 mb-4">
                        <!-- Send Money Form
                        ============================ -->
                        <form id="form-send-money" method="post" action="{{ url('/orders/create') }}">
                            @csrf
                            <p style="float: right" id="pp">Not Listed? <a
                                    href="{{ url('transactions/beneficiaries') }}"> Create New Beneficiary</a></p>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Select a Beneficiary</label>
                                <select name="recipient" class="form-control select2">
                                    @if($recipient == null)
                                        @foreach(\Illuminate\Support\Facades\Auth::user()->beneficiaries()->get() as $beneficiary)
                                            <option value="{{ $beneficiary->id }}">{{ $beneficiary->name }}</option>
                                        @endforeach
                                    @else
                                        @foreach(\Illuminate\Support\Facades\Auth::user()->beneficiaries()->get() as $beneficiary)
                                            <option
                                                {{ $beneficiary->id == $recipient->id ? 'selected' : '' }} value="{{ $beneficiary->id }}">{{ $beneficiary->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="youSend" class="form-label">You Send</label>
                                <div class="input-group">
                                    <span class="input-group-text">FROM</span>
                                    <input type="text" class="form-control" data-bv-field="youSend" id="youSend"
                                           onkeyup="currencyConverter(this.value, 1)"
                                           value="1,000" name="fromAmount" placeholder="">
                                    <span class="input-group-text p-0">
                    <select name="from" id="youSendCurrency" data-style="form-select bg-transparent border-0"
                            data-container="body"
                            data-live-search="true" class="selectpicker form-control bg-transparent" required="">
                         <option data-icon="currency-flag currency-flag-usd me-1"
                                 data-rate="1"
                                 selected="selected" value="">USD</option>
                        @foreach(\App\Models\ExchangeRate::all() as $rate)
                            <option data-icon="currency-flag currency-flag-{{ strtolower($rate->currency_code) }} me-1"
                                    data-rate="{{ $rate->rate }}"
                                    selected="selected" value="">{{ $rate->currency_code }}</option>
                        @endforeach
                    </select>
                    </span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="recipientGets" class="form-label">Recipient Gets</label>
                                <div class="input-group">
                                    <span class="input-group-text">TO &nbsp;&nbsp; &nbsp;&nbsp;</span>
                                    <input type="text" class="form-control" data-bv-field="recipientGets"
                                           onkeyup="currencyConverter(this.value, 2)"
                                           id="recipientGets" value="1,410.06" name="toAmount" placeholder="">
                                    <span class="input-group-text p-0">

                    <select name="to" id="recipientCurrency" data-style="form-select bg-transparent border-0"
                            data-container="body" data-live-search="true"
                            class="selectpicker form-control bg-transparent" required="">
                            <option data-icon="currency-flag currency-flag-usd me-1"
                                    data-rate="1"
                                    selected="selected" value="">USD</option>
                        @foreach(\App\Models\ExchangeRate::all() as $rate)
                            <option data-icon="currency-flag currency-flag-{{ strtolower($rate->currency_code) }} me-1"
                                    data-rate="{{ $rate->rate }}"
                                    selected="selected" value="">{{ $rate->currency_code }}</option>
                        @endforeach
                    </select>
                    </span>
                                </div>
                            </div>
                            <p class="text-muted text-center">The current exchange rate is <span class="fw-500">1 USD = 18.19 ZAR</span>
                            </p>
                            <hr>
                            <p>Total Fees<span class="float-end" id="fees"></span></p>
                            <hr>
                            <p class="text-4 fw-500">Total To Pay<span class="float-end"
                                                                       id="totalFees">1,000.00 USD</span></p>
                            <input type="hidden" id="hiddenNumber" name="phone">
                            <input type="hidden" id="amount" name="amount">
                            <div id="numberError" style="display: none; color: red; margin-bottom: 15px" class="error">
                                The phone number
                                you entered
                                is invalid
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary" type="button" id="createOrder">Continue</button>
                            </div>
                        </form>
                        <!-- Send Money Form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content end -->

@endsection

<!--javascript push here and stack on master page-->
@push('scripts')
    <script>

        //set up csrf for laravel ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $('#youSendCurrency').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            console.log($(this).val());
        });

        //currency conversion logic here
        function currencyConverter(amount, control) {
            if (control === 1) {
                var e = document.getElementById("youSendCurrency");
                var option = e.options[e.selectedIndex];
                var rate = option.getAttribute('data-rate');
                var b = document.getElementById("recipientCurrency");
                var option2 = b.options[b.selectedIndex];
                var rate2 = option2.getAttribute('data-rate');
                const amountInCur = 1 / rate;
                const amountInToCurrency = amountInCur * rate2 * amount;
                $('#recipientGets').val(amountInToCurrency.toFixed(2));
            } else {
                var e = document.getElementById("recipientCurrency");
                var option = e.options[e.selectedIndex];
                var rate = option.getAttribute('data-rate');


                var b = document.getElementById("youSendCurrency");
                var option2 = b.options[b.selectedIndex];
                var rate2 = option2.getAttribute('data-rate');


                const amountInCur = 1 / rate;
                const amountInToCurrency = amountInCur * rate2 * amount;

                console.log(amountInToCurrency);

                $('#youSend').val(amountInToCurrency.toFixed(2));
            }
        }

    </script>
@endpush
