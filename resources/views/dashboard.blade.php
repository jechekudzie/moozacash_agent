@extends('layouts.master')

@section('content')

    <!-- Content
    ============================================= -->
    <div id="content" class="py-4">
        <div class="container">
            <div class="row">
                <!-- Left Panel
                ============================================= -->
                <aside class="col-lg-3">

                    <!-- Profile Details
                    =============================== -->
                    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                        <div class="profile-thumb mt-3 mb-4"><img class="rounded-circle" src="images/profile-thumb.jpg"
                                                                  alt="">
                            <div class="profile-thumb-edit bg-primary text-white" data-bs-toggle="tooltip"
                                 title="Change Profile Picture"><i class="fas fa-camera position-absolute"></i>
                                <input type="file" class="custom-file-input" id="customFile">
                            </div>
                        </div>
                        <p class="text-3 fw-500 mb-2">Hello, Smith Rhodes</p>
                        <p class="mb-2"><a href="settings-profile.html" class="text-5 text-light"
                                           data-bs-toggle="tooltip" title="Edit Profile"><i class="fas fa-edit"></i></a>
                        </p>
                    </div>
                    <!-- Profile Details End -->

                    <!-- Available Balance
                    =============================== -->
                    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                        <div class="text-17 text-light my-3"><i class="fas fa-wallet"></i></div>
                        <h3 class="text-9 fw-400">$2956.00</h3>
                        <p class="mb-2 text-muted opacity-8">Available Balance</p>
                        <hr class="mx-n3">
                        <div class="d-flex"><a href="withdraw-money.html" class="btn-link me-auto">Withdraw</a> <a
                                href="deposit-money.html" class="btn-link ms-auto">Deposit</a></div>
                    </div>
                    <!-- Available Balance End -->

                    <!-- Need Help?
                    =============================== -->
                    <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
                        <div class="text-17 text-light my-3"><i class="fas fa-comments"></i></div>
                        <h3 class="text-5 fw-400 my-4">Need Help?</h3>
                        <p class="text-muted opacity-8 mb-4">Have questions or concerns regrading your account?<br>
                            Our experts are here to help!.</p>
                        <div class="d-grid"><a href="#" class="btn btn-primary">Chate with Us</a></div>
                    </div>
                    <!-- Need Help? End -->

                </aside>
                <!-- Left Panel End -->

                <!-- Middle Panel
                ============================================= -->
                <div class="col-lg-9">

                    <!-- Profile Completeness
                    =============================== -->
                    <div class="bg-white shadow-sm rounded p-4 mb-4">
                        <h3 class="text-5 fw-400 d-flex align-items-center mb-4">Profile Completeness<span
                                class="border text-success rounded-pill fw-500 text-2 px-3 py-1 ms-2">50%</span></h3>
                        <hr class="mb-4 mx-n4">
                        <div class="row gy-4 profile-completeness">
                            <div class="col-sm-6 col-md-3">
                                <div class="border rounded text-center px-3 py-4"><span
                                        class="d-block text-10 text-light mt-2 mb-3"><i
                                            class="fas fa-mobile-alt"></i></span> <span
                                        class="text-5 d-block text-success mt-4 mb-3"><i
                                            class="fas fa-check-circle"></i></span>
                                    <p class="mb-0">Mobile Added</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="border rounded text-center px-3 py-4"><span
                                        class="d-block text-10 text-light mt-2 mb-3"><i
                                            class="fas fa-envelope"></i></span> <span
                                        class="text-5 d-block text-success mt-4 mb-3"><i
                                            class="fas fa-check-circle"></i></span>
                                    <p class="mb-0">Email Added</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="position-relative border rounded text-center px-3 py-4"><span
                                        class="d-block text-10 text-light mt-2 mb-3"><i class="fas fa-credit-card"></i></span>
                                    <span class="text-5 d-block text-light mt-4 mb-3"><i
                                            class="far fa-circle "></i></span>
                                    <p class="mb-0"><a class="btn-link stretched-link" href="">Add Card</a></p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="position-relative border rounded text-center px-3 py-4"><span
                                        class="d-block text-10 text-light mt-2 mb-3"><i
                                            class="fas fa-university"></i></span> <span
                                        class="text-5 d-block text-light mt-4 mb-3"><i
                                            class="far fa-circle "></i></span>
                                    <p class="mb-0"><a class="btn-link stretched-link" href="">Add Bank Account</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Profile Completeness End -->

                    <!-- Recent Activity
                    =============================== -->

                    <h3 class="text-5 fw-400 d-flex align-items-center px-4 mb-4">Transaction History</h3>

                    <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->number }}</td>
                                        <td>
                                            @if($order->sender == \Illuminate\Support\Facades\Auth::id())
                                                Sent to {{ \App\Models\User::find($order->recipient)->name }}
                                            @elseif($order->recipient == \Illuminate\Support\Facades\Auth::id())
                                                Received from {{ \App\Models\User::find($order->sender)->name }}
                                            @endif
                                        </td>
                                        <td>{{ $order->amount }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
                                        <td>Update | Cancel</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Recent Activity End -->
                </div>
                <!-- Middle Panel End -->
            </div>
        </div>
    </div>
    <!-- Content end -->

@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
            });
            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical', //Types: default, vertical, accordion
            });
        });
    </script>
@endpush
