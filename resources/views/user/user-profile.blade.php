@extends('layouts.around-header')
@section('page-title') 
    Profile
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
@endsection
@section('main')
     <!-- Page content-->
      
      <!-- Page content-->
      <div class="container mt-5 mb-5">
        <div class="row">

            <div class="d-flex flex-column h-100 bg-light rounded-3 shadow-lg p-4">
                <div class="py-2 p-md-3">
                    <!-- Title + Delete link-->
                    <div class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-start">
                        <div class="px-4 py-4 mb-1 m-auto text-center"><img class="d-block rounded-circle mx-auto my-2" src="{{asset('frontend-theme/around/img/dashboard/avatar/main.jpg')}}" at="{{$user->name}}" width="110">
                               <div class="px-4 pb-4 text-center" style="color:black"><a class="btn btn-light px-3 mb-2" data-bs-toggle="dropdown"><i class="ai-user fs-base me-2"></i>{{ $user->email }}</a>
                                     <ul class="dropdown-menu dropdown-menu-center">
                                        <li><a class="dropdown-item" href="{{ route('user.profile') }}">
                                          <div class="d-flex align-items-center">
                                            <div class="fs-xl text-muted"><i class="ai-user"></i></div>
                                            <div class="ps-3"><span class="d-block text-heading">Account Setting</span></div>
                                          </div></a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ url('/myorder ') }}">
                                          <div class="d-flex align-items-center">
                                            <div class="fs-xl text-muted"><i class="ai-layers"></i></div>
                                            <div class="ps-3"><span class="d-block text-heading">My Orders</span></div>
                                          </div></a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('checkout') }}">
                                          <div class="d-flex align-items-center">
                                            <div class="fs-xl text-muted"><i class="ai-shopping-cart"></i></div>
                                            <div class="ps-3"><span class="d-block text-heading">My Cart</span></div>
                                          </div></a></li>
                                        <li class="dropdown-divider"></li>
                                         <li><a class="dropdown-item" href="{{ route('user.logout') }}">
                                          <div class="d-flex align-items-center">
                                            <div class="fs-xl text-muted"><i class="ai-life-buoy"></i></div>
                                            <div class="ps-3"><span class="d-block text-heading">Logout</span></div>
                                          </div></a>
                                        </li>
                                        </ul>
                                </div>
                        </div>
                    </div>
                    <!-- Content-->
                    
                    <div class="bg-secondary rounded-3 p-4 my-4">
                       <div class="ps-sm-3 text-center text-sm-start">
                           
                            <h4>{{ $user->name }}</h4>
                            @if($user->street && $user->state && $user->city && $user->country )
                            <p>{{ $user->street }} , {{ $user->city }} , {{ $user->state }} , {{ $user->country }}.  </p>
                            @else
                             <p class="text-danger"> Detail is not updated , Please Update it ! </p>
                            @endif
                            
                        </div>
                     </div>
                </div>
                 @if ($message = Session::get('error'))
                        <!-- Danger alert -->
                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                          <span class="fw-medium"> <strong>{{ $message }}</strong></span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                     @if ($message = Session::get('success'))
                        <!-- Danger alert -->
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                          <span class="fw-medium"> <strong>{{ $message }}</strong></span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                <form action="{{route('user.update.profile')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="id">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3 pb-1">
                      <div class="group-input">
                            <label for="country">Country. *</label>
                            <input id="number" name="country" class="form-control @error('country') is-invalid @enderror"
                                value="Canada" autocomplete="country" readonly>
                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> 
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3 pb-1">
                        <div class="group-input">
                            <label for="fullname">State. *</label>
                               <input class="form-control numberonly  @error('state') is-invalid @enderror" type="text" id="account-state" name="state"  value="@if($user->state) {{ $user->state}} @endif">
                            <!--<select name="state" id="state" placeholder="Choose State" class="form-control  @error('state') is-invalid @enderror">-->
                            <!--    @if($user->state)-->
                            <!--    <option value="{{ $user->state }}" {{ old('state') == $user->state ? 'selected' : '' }}>{{ $user->state }}</option>-->
                            <!--    @else-->
                            <!--    <option selected disabled>Select State</option>-->
                            <!--    @endif-->
                            <!--    <option>Chandigarh</option>-->
                            <!--    <option>Haryana</option>-->
                            <!--    <option>Punjab</option>-->
                                
                            <!--</select>                                -->
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>    
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3 pb-1">
                        <div class="group-input">
                            <label for="fullname">City. *</label>
                             <input class="form-control   @error('city') is-invalid @enderror" type="text" id="account-city" name="city"  value="@if($user->city) {{ $user->city}} @endif">
                            <!--<select name="city" id="city" class="form-control  @error('city') is-invalid @enderror">-->
                            <!--    @if($user->city)-->
                            <!--    <option value="{{ $user->city }}" {{ old('city') == $user->city ? 'selected' : '' }}>{{ $user->city }}</option>-->
                            <!--    @else-->
                            <!--    <option selected disabled>Select City</option>-->
                            <!--     @endif-->
                            <!--    <option>Chandigarh</option>-->
                            <!--    <option>Panchkula</option>-->
                            </select>                                                                
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>  
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3 pb-1">
                      <label class="form-label px-0" for="account-address">Address Line</label>
                      <input class="form-control  @error('street') is-invalid @enderror" type="text" id="account-address" name="street" value="@if($user->street) {{ $user->street}} @endif">
                    </div>
                     @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                    
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3 pb-1">
                      <label class="form-label px-0" for="account-zip">ZIP Code</label>
                      <input class="form-control numberonly  @error('zip') is-invalid @enderror" type="text" id="account-zip" name="zip"  value="@if($user->zip) {{ $user->zip}} @endif">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3 pb-1">
                      <label class="form-label px-0" for="account-zip">Landmark</label>
                      <input class="form-control  @error('landmark') is-invalid @enderror" type="text" id="account-landmark" name="landmark" value="@if($user->street) {{ $user->landmark}} @endif">
                    </div>
                  </div>
                  <div class="col-12">
                    <hr class="mt-2 mb-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                      <!--<div class="form-check d-block">-->
                      <!--  <input class="form-check-input" type="checkbox" id="show-email" checked>-->
                      <!--  <label class="form-check-label" for="show-email">Show my email to registered users</label>-->
                      <!--</div>-->
                      <button class="btn btn-primary mt-3 mt-sm-0" type="submit"><i class="ai-save fs-lg me-2"></i>Save changes</button>
                    </div>
                  </div>
                 
                </div>
                 </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection