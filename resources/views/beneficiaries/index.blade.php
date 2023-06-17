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
                        <div class="profile-thumb mt-3 mb-4"><img class="rounded-circle"
                                                                  src="{{ asset('images/profile-thumb.jpg') }}"
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

                    <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                        <h3 class="text-5 fw-400 mb-3 mb-sm-4">Beneficiary Details</h3>
                        <hr class="mx-n3 mx-sm-n5 mb-4">
                        <!-- Recent Activity
                        =============================== -->
                        <div class="bg-white rounded py-1 mb-4">
                            <form method="post" action="{{ url('/beneficiaries/add') }}" id="addBeneficiaryForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="payerName" class="form-label">Name</label>
                                    <input type="text" value="" name="name" class="form-control"
                                           data-bv-field="payerName"
                                           id="payerName"
                                           required placeholder="Enter Name">
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label for="emailID" class="form-label">Phone Number</label>
                                        <input type="text" value="" class="form-control" data-bv-field="emailid"
                                               id="phoneNumber"
                                               name="number"
                                               required
                                               placeholder="Enter Email Address">
                                    </div>
                                    <div class="col-6">
                                        <label for="paymentDue" class="form-label">ID Number</label>
                                        <input type="text" class="form-control" data-bv-field="emailid"
                                               required name="national_id"
                                               placeholder="Enter National ID Number">
                                    </div>
                                </div>
                                <input type="hidden" id="hiddenNumber" name="phone">

                                <div id="numberError" style="display: none; color: red" class="error">The phone number
                                    you entered
                                    is invalid
                                </div>

                                <div class="d-grid mt-4">
                                    <button class="btn btn-primary" id="saveBeneficiary" type="button">Add Beneficiary
                                    </button>
                                </div>
                            </form>

                            <table class="table table-hover mt-5">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone Name</th>
                                    <th>ID Number</th>
                                    <th>Transact</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody id="benefTable">
                                </tbody>
                            </table>


                        </div>
                        <!-- Recent Activity End -->
                    </div>

                    <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                        <h4 class="text-5">My Current Beneficiaries</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone Name</th>
                                    <th>ID Number</th>
                                    <th>Transact</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($beneficiaries as $beneficiary)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $beneficiary->name }}</td>
                                        <td>{{ $beneficiary->number }}</td>
                                        <td>{{ $beneficiary->national_id }}</td>
                                        <td>
                                            <button type="button" style="padding: 0px 10px"
                                                    class="btn btn-primary btn-sm">Send Now
                                            </button>
                                        </td>
                                        <td>
                                            <a href="">Edit</a> &nbsp;|&nbsp;
                                            <a href="">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- Middle Panel End -->
            </div>
        </div>
    </div>
    <!-- Content end -->


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" action="{{ url('/beneficiaries/connect') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm Action</h4>
                    </div>
                    <div class="modal-body">
                        <p>Confirm your action. Add <a href="nameID"></a> to your beneficiaries? You will be able to
                            change
                            this later in your beneficiaries</p>
                    </div>
                    <input type="hidden" name="id" id="id"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-sm">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        var input = document.querySelector("#phoneNumber");
        window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
        });
        //get phone number on key up and validate it
        var iti = window.intlTelInputGlobals.getInstance(input);
        //capture onclick of signUp button
        $("#saveBeneficiary").click(function () {
            var phoneNumber = iti.getNumber();
            //check if number is valid
            if (!iti.isValidNumber()) {
                $('#numberError').show();
            } else {
                $('#numberError').hide();
                $("#hiddenNumber").val(phoneNumber);
                $("#addBeneficiaryForm").submit();
            }
        });

        function launchConfirmation(i) {
            $('#id').val(i);
            $('#myModal').modal('show');
        }


        $(document).ready(function () {
            $('#addBeneficiaryForm').on('keyup', function (e) {
                e.preventDefault();

                //if the form fields are not blank
                if ($('#payerName').val() == '' && $('#phoneNumber').val() == '' && $('#national_id').val() == '') {
                    console.log('blank');
                } else {
                    var formData = $(this).serialize();
                    $.ajax({
                        url: '/users/search',
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            // Iterate over the JSON data and create HTML rows
                            $('#benefTable').empty();
                            for (var i = 0; i < response.length; i++) {
                                var row = '<tr>' +
                                    '<td>' + response[i].id + '</td>' +
                                    '<td>' + response[i].name + '</td>' +
                                    '<td></td>' +
                                    '<td></td>' +
                                    '<td></td>' +
                                    '<td><a onclick="launchConfirmation(' + response[i].id + ')" style="padding: 0px 10px" class="btn btn-primary btn-sm"> Add Beneficiary</a></td> ' +
                                    '</tr>';
                                $('#benefTable').append(row);
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
