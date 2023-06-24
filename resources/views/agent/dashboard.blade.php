@extends('agent.layouts.master')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <div class="row">
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                        <div
                            class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa fa-wallet fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">$780</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Float</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Row #1 -->
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                        <div
                            class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa fa-clipboard fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div
                                    class="fs-3 fw-semibold">{{ count(\App\Models\Order::where('agent', \Illuminate\Support\Facades\Auth::id())->get()) }}</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Historical Deposits</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                        <div
                            class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa fa-envelope-open fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div
                                    class="fs-3 fw-semibold">{{ count(\App\Models\Order::where('agent2', \Illuminate\Support\Facades\Auth::id())->get()) }}</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Disbursements</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                        <div
                            class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa fa-users fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">4252</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Transactions</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END Row #1 -->
            </div>

            <h2 class="content-heading">Orders</h2>
            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Agent Transactions
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center">Order</th>
                            <th>Sender</th>
                            <th class="d-none d-sm-table-cell">Recepient</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Amount</th>
                            <th class="text-center" style="width: 15%;">Status</th>
                            <th class="text-center" style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Order::all() as $order)
                            <tr>
                                <td>{{ $order->number }}</td>
                                <td>{{ \App\Models\User::find($order->sender)->name }}</td>
                                <td>{{ \App\Models\User::find($order->recipient)->name }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->status }}</td>
                                @if($order->status == 'initiated')
                                    <td><a href="#"
                                           class="confirm-link"
                                           data-sender="{{ \App\Models\User::find($order->sender)->name }}"
                                           data-idnumber="{{ \App\Models\User::find($order->sender)->national_id }}"
                                           data-recipient="{{ \App\Models\User::find($order->recipient)->name }}"
                                           data-amount="{{ $order->amount }}"
                                           data-order="{{ $order->number }}"
                                        >Confirm</a></td>
                                @elseif($order->status == 'accepted')
                                    <td><a
                                            href="{{ url('collect-funds') }}"
                                            class="confirm-pickup"
                                            data-sender="{{ \App\Models\User::find($order->recipient)->name }}"
                                            data-idnumber="{{ \App\Models\User::find($order->recipient)->national_id }}"
                                            data-recipient="{{ \App\Models\User::find($order->sender)->name }}"
                                            data-amount="{{ $order->amount }}"
                                            data-order="{{ $order->number }}"
                                        >Collect</a></td>
                                @else
                                    <td><a>Collected</a></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Normal Modal -->
    <div class="modal" id="modal-normal" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Confirm this Transaction</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <div class="block-content">
                            <table class="table table-vcenter">
                                <thead class="thead-light">
                                <tr>
                                    <th>Item</th>
                                    <th>Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">Sender</th>
                                    <td id="sendTd"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Sender ID</th>
                                    <td id="idTd"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Recipient</th>
                                    <td id="recipientTd"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Order Number</th>
                                    <td id="orderTd"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Amount</th>
                                    <td id="amountTd"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="post" action="{{ url('accept-deposit') }}">
                        @csrf
                        <div class="block-content block-content-full block-content-sm text-end border-top mt-5">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <input type="hidden" name="order" id="inputNumber">
                            <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Normal Modal -->

    <!-- Normal Modal -->
    <div class="modal" id="modal-collection" tabindex="-1" role="dialog" aria-labelledby="modal-normal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Confirm this Transaction</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <table class="table table-vcenter">
                            <thead class="thead-light">
                            <tr>
                                <th>Item</th>
                                <th>Detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Sender</th>
                                <td id="ssendTd"></td>
                            </tr>
                            <tr>
                                <th scope="row">Recipient ID</th>
                                <td id="sidTd"></td>
                            </tr>
                            <tr>
                                <th scope="row">Recipient</th>
                                <td id="srecipientTd"></td>
                            </tr>
                            <tr>
                                <th scope="row">Order Number</th>
                                <td id="sorderTd"></td>
                            </tr>
                            <tr>
                                <th scope="row">Amount</th>
                                <td id="samountTd"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <form method="post" action="{{ url('cash-pickup') }}">
                        @csrf
                        <div class="block-content block-content-full block-content-sm text-end border-top mt-5">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <input type="hidden" name="order" id="collectNumber">
                            <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Normal Modal -->

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

        //modal-normal

        //launch modal on confirm-link click
        $('.confirm-link').on('click', function (e) {
            e.preventDefault();
            let sender = $(this).data('sender');
            let idnumber = $(this).data('idnumber');
            let recipient = $(this).data('recipient');
            let amount = $(this).data('amount');
            let order = $(this).data('order');

            //assign values to table cells
            $('#sendTd').text(sender);
            $('#idTd').text(idnumber);
            $('#recipientTd').text(recipient);
            $('#amountTd').text(amount);
            $('#orderTd').text(order);
            $('#inputNumber').val(order);
            $('#modal-normal').modal('show');
        });

        //launch modal on confirm-link click
        $('.confirm-pickup').on('click', function (e) {
            e.preventDefault();
            let sender = $(this).data('sender');
            let idnumber = $(this).data('idnumber');
            let recipient = $(this).data('recipient');
            let amount = $(this).data('amount');
            let order = $(this).data('order');

            //assign values to table cells
            $('#ssendTd').text(sender);
            $('#sidTd').text(idnumber);
            $('#srecipientTd').text(recipient);
            $('#samountTd').text(amount);
            $('#sorderTd').text(order);
            $('#collectNumber').val(order);
            $('#modal-collection').modal('show');
        });

    </script>
@endpush

