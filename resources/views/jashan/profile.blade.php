@extends('layouts.around-header')
@section('page-title')
    Profile | RuralPure
@endsection
@section('main')
    

   
        
            <div class="container-fluid mt-7">
                <div class="row">
                    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                        <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <div class="container">
                                            <form action="{{ url('changprofile') }}" method="POST" id="profileform"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' name="profile_img"
                                                            onchange="$('#profileform').submit()" id="imageUpload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview"
                                                            style="background-image: url({{ asset(Auth::user()->profile_img) }});">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {{-- <a href="#">
                                            <img src="https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg"
                                                class="rounded-circle">
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0 pt-md-4">

                                <div class="text-center">
                                    <h3>
                                        {{ Auth::user()->name }}<span class="font-weight-light"></span>
                                    </h3>
                                    <div class="h5 font-weight-300">
                                        <i class="ni location_pin mr-2"></i>
                                    </div>
                                    <div class="h5 mt-4">
                                        <a href="{{ url('/passwordreset') }}" class="p-2 btn btn-sm text-white"
                                            style="background-color:#9D2B20;">
                                            Change Password
                                        </a>
                                        <a id="addressbtn" class="p-2 btn btn-sm text-white"
                                            style="background-color:#4466F2;">
                                            Add New Address
                                        </a>
                                        {{-- <i
                                            class="ni business_briefcase-24 mr-2"></i>{{ Auth::user()->address }}
                                        --}}
                                    </div>
                                    <div>
                                        <i class="ni education_hat mr-2"></i>
                                    </div>
                                    <hr class="my-4">
                                    <p></p>
                                    {{-- <a href="#">Show more</a>
                                    --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1" id="accountdataform">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">My account</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#!" class="btn btn-sm btn-primary"
                                            onclick="$('#accountform').submit()">Save</a>
                                        <a href="#" id="delete-address" data-id="{{ $default_address->id }}"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('acount/' . $default_address->id) }}" method="POST" id="accountform">
                                    @method('PUT')
                                    @csrf
                                    <h6 class="heading-small text-muted mb-4">User information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-username">Name</label>
                                                    <input type="text" id="input-username"
                                                        class="form-control form-control-alternative" placeholder="Username"
                                                        value="{{ $default_address->name }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email
                                                        address</label>
                                                    <input type="email" name="email" id="input-email"
                                                        class="form-control form-control-alternative"
                                                        placeholder="jesse@example.com"
                                                        value="{{ $default_address->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-address">Address Line
                                                        1</label>
                                                    <input id="input-address" name="address"
                                                        class="form-control form-control-alternative"
                                                        placeholder="Home Address" value="{{ $default_address->address }}"
                                                        type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-country">Address Line
                                                        2</label>
                                                    <input type="text" name="street" id="input-street"
                                                        class="form-control form-control-alternative"
                                                        value="{{ $default_address->street }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-city">country</label>
                                                    <input type="text" id="input-country" name="country"
                                                        class="form-control form-control-alternative" placeholder="Country"
                                                        value="{{ $default_address->country }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-city">State</label>
                                                    <select name="state" id="state" class="form-control">
                                                        <option value="" disabled selected>Select</option>
                                                        @php $city = App\Model\State::has('cities')->get(); @endphp
                                                        @if (count($city) > 0)
                                                            @foreach ($city as $item)
                                                                <option value="{{ $item->id }}" @if ($default_address->states()->id == $item->id)
                                                                    id="address_state" selected
                                                            @endif >{{ $item->name }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">City
                                                    </label>
                                                    <select name="city" id="city" class="form-control">
                                                        @php $state =
                                                        App\Model\City::whereState(optional($default_address->states())->id)->get();@endphp
                                                        @if ($state)
                                                            @foreach ($state as $item)
                                                                <option value="{{ $item->id }}" @if ($default_address->cityies()->id == $item->id)
                                                                    id="address_city" selected
                                                            @endif>{{ $item->name }}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    {{-- <input type="text" name="city"
                                                        id="input-postal-code" class="form-control form-control-alternative"
                                                        placeholder="City" value="{{ Auth::user()->city()->name }}">
                                                    --}}
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Postal
                                                        code</label>
                                                    <input type="number" name="postcode" id="postcode"
                                                        class="form-control form-control-alternative"
                                                        placeholder="Postal code" value="{{ $default_address->postcode }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-city">Dob</label>
                                                    <input type="text" id="input-city"
                                                        class="form-control form-control-alternative"
                                                        value="{{ Auth::user()->dob }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-country">Phone</label>
                                                    <input type="text" name="phone_no" id="input-phone"
                                                        class="form-control form-control-alternative"
                                                        value="{{ $default_address->phone_no }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="make_default" class="text-dark">Default Address</label>
                                                <input id="make_default" style="margin-top:42px;" name="make_default"
                                                    type="checkbox" @if ($default_address->is_defualt == 'Y') checked
                                                @endif value="Y">
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-country"> Your Defualt Address
                                            </label>
                                            <div class="row" class="address_checkbox">
                                                @foreach ($address as $addr)
                                                    <div class="col-md-4">
                                                        <label for="{{ $addr->address_type }}"
                                                            class="text-dark">{{ $addr->address_type }}</label>
                                                        <input id="{{ $addr->address_type }}" class="deafult_address"
                                                            name="deafult_address" type="checkbox" @if ($addr->is_defualt == 'Y') checked
                                                @endif value="{{ $addr->id }}" >
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                            <!-- Description -->
                            {{-- <h6 class="heading-small text-muted mb-4">About me
                            </h6>
                            <div class="pl-lg-4">
                                <div class="form-group focused">
                                    <label>About Me</label>
                                    <textarea rows="4" class="form-control form-control-alternative"
                                        placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                </div>
                            </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1" id="addressform">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Add New Address</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('useraddress') }}" method="POST" id="addaddressform">
                                @method('POST')
                                @csrf
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Name</label>
                                                <input type="text" id="name" name="name"
                                                    class="form-control form-control-alternative" placeholder="Username"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email
                                                    address</label>
                                                <input type="email" name="email" id="email"
                                                    class="form-control form-control-alternative"
                                                    placeholder="jesse@example.com" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Phone Number</label>
                                                <input type="text" name="phone_no" id="phone_no"
                                                    class="form-control form-control-alternative" placeholder="Phone Number"
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Address Type</label>
                                                <input type="text" name="address_type" id="address_type"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Example :: Home Address" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-address">Address Line 1</label>
                                                <textarea id="address" name="address"
                                                    class="form-control form-control-alternative" placeholder="Home Address"
                                                    value="" type="text" cols="30" rows="3"></textarea>
                                                {{-- <input id="input-address" name="address"
                                                    class="form-control form-control-alternative" placeholder="Home Address"
                                                    value="" type="text"> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">country</label>
                                                <input type="text" id="country" name="country"
                                                    class="form-control form-control-alternative" placeholder="Country"
                                                    value="{{ Auth::user()->country }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">Address Line 2</label>
                                                <input type="text" name="street" id="input-country" id="street"
                                                    class="form-control form-control-alternative" value="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">State
                                                </label>
                                                <select name="state" id="addstate" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                    @foreach (App\Model\State::has('cities')->get() as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                {{-- <input type="text" name="state"
                                                    id="state" class="form-control form-control-alternative"
                                                    placeholder="state" value=""> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">City
                                                </label>
                                                <select name="city" id="addcity" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                                {{-- <input type="text" name="city" id="city"
                                                    class="form-control form-control-alternative" placeholder="City"
                                                    value=""> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">Landmark</label>
                                                <input type="text" name="landmark" id="landmark"
                                                    class="form-control form-control-alternative" value="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Postal
                                                    code</label>
                                                <input type="number" name="postcode" id="postcode"
                                                    class="form-control form-control-alternative" placeholder="Postal code"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn  btn-primary">Save</button>
                                </div>
                                <!-- Description -->
                                {{-- <h6 class="heading-small text-muted mb-4">About me
                                </h6>
                                <div class="pl-lg-4">
                                    <div class="form-group focused">
                                        <label>About Me</label>
                                        <textarea rows="4" class="form-control form-control-alternative"
                                            placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>

    <script>
        $(document).on('click', '.deafult_address', function() {
            $('.deafult_address').not(this).prop('checked', false);
        });

    </script>
    @push('script')
        <script>
            $('#addressform').hide();

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });
            $('#addressbtn').click(function() {
                if ($(this).html() == 'My Acoount') {
                    $(this).html('Add New Address');
                } else {
                    $(this).html('My Acoount');
                }
                $('#accountdataform').toggle();
                $('#addressform').toggle();
            });
            $('#state').change(function() {
                var id = $(this).children("option:selected").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: `city/${id}`,
                    success: function(data) {
                        // console.log(data);      
                        var len = data.length;
                        $('#city').empty();
                        for (var i = 0; i < len; i++) {
                            var name = data[i].name;
                            var id = data[i].id;
                            var option = '<option value="' + id + '">' + name + '</option>';
                            $('#city').append(option);
                        }
                    }
                });
            });
            $('#addstate').change(function() {
                var id = $(this).children("option:selected").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: `city/${id}`,
                    success: function(data) {
                        // console.log(data);      
                        var len = data.length;
                        $('#addcity').empty();
                        for (var i = 0; i < len; i++) {
                            var name = data[i].name;
                            var id = data[i].id;
                            var option = '<option value="' + id + '">' + name + '</option>';
                            $('#addcity').append(option);
                        }
                    }
                });
            });
            $('input[name="deafult_address"]').click(function() {
                var id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "GET",
                    url: `address/${id}`,
                    success: function(data) {
                        $('#accountform').attr('action',
                            `${location.protocol}//${location.host}/acount/${data.id}`);
                        $('#input-username').val(data.name);
                        $('#input-email').val(data.email);
                        $('#input-address').val(data.address);
                        $('#input-country').val(data.country);
                        $('#postcode').val(data.postcode);
                        $('#input-phone').val(data.phone_no);
                        $('#input-street').val(data.street);
                        $('#address_state').html(data.state.name);
                        $('#address_city').html(data.city.name);
                        $('#address_state').val(data.state.id);
                        $('#address_city').val(data.city.id);
                        $('#delete-address').attr('data-id',`${data.id}`);
                        if (data.is_defualt === 'Y')
                            $('#make_default').prop('checked', true);
                        else
                            $('#make_default').prop('checked', false);
                    }
                });
            });

            $("#delete-address").click(function() {
                var id = $(this).data('id');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    url: "delete-address/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data) {
                        toastr.success(data.message);
                        setTimeout(function(){ window.location.href="/acount"; }, 2000);
                    },
                    error: function(err) {
                        console.log(err);
                        toastr.error(err.responseJSON.message);
                    }
                });

            });

        </script>
        <script type="text/javascript">
            function preventBack() {
                window.history.forward();
            }
            setTimeout("preventBack()", 0);
            window.onunload = function() {
                null
            };

        </script>
    @endpush
@endsection
