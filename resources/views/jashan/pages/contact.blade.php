@extends('layouts.around-header')
@section('page-title') 
   Contact  | Rural Pure
@endsection
@section('meta-schema')
@endsection
@section('custom-css')
@endsection
@section('main')
      <!-- Page content-->
      <!-- Background shape-->
      <section class="position-relative bg-light" style="height: 590px;">
        <div class="shape shape-bottom shape-curve-side bg-body">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 250">
            <g>
              <path fill="currentColor" d="M3000,0v250H0v-51c572.7,34.3,1125.3,34.3,1657.8,0C2190.3,164.8,2637.7,98.4,3000,0z"></path>
            </g>
          </svg>
        </div>
      </section>
       Contact details + Form
      <section class="container position-relative zindex-5 pt-7" style="margin-top: -590px;">
        <div class="row pt-md-4 pt-lg-5 mt-3">
          <div class="col-lg-4 col-md-5 offset-lg-1">
            <h1 class="text-light mb-3 pb-4 pt-sm-3">Contacts</h1>
            <div class="d-flex align-items-start mb-4"><i class="ai-map-pin h3 mb-0 text-light"></i>
              <div class="ps-3">
                <p class="text-light mb-2">Shop no 8, Opp Kiran Nursing Home, Ajmer Road, Madanganj-Kishangarh Dist Ajmer (Rajasthan) Pin 305801, India</p><a class="fancy-link text-light fs-sm" href="#map" data-scroll>See on the map</a>
              </div>
            </div>
            <div class="d-flex align-items-start mb-4"><i class="ai-mail h3 mt-n1 mb-0 text-light"></i>
              <div class="ps-3"><a class="d-inline-block text-light text-decoration-none mb-2" href="mailto:Care@ruralpure.com">Care@ruralpure.com</a></div>
            </div>
            <div class="d-flex align-items-start mb-4"><i class="ai-phone h3 mt-n1 mb-0 text-light"></i>
              <div class="ps-3"><a class="d-inline-block text-light text-decoration-none mb-2" href="tel:+919582066729">+91 9582066729, +91 7683055792</a></div>
            </div>
          </div>
          <div class="col-xl-6 col-md-7">
            <div class="card border-0 shadow-lg">
              <div class="card-body py-5 px-3 px-sm-4">
                <h2 class="h3 text-center">Leave A Comment</h2>
                <p class="fs-sm text-muted text-center">We normally respond within 2 business days </p>
                <form class="needs-validation pt-2 px-md-3" action="{{ route('submit.enquiry') }}" method="POST" novalidate>
                    @csrf
                  <div class="row">
                    <div class="col-md-6 mb-3 pb-1">
                      <label class="form-label" for="cont-fn">Full name<sup class="text-danger ms-1">*</sup></label>
                      <input class="form-control" type="text" id="cont-fn" placeholder="Enter Full Name" name="name" required>
                      <div class="invalid-feedback">Please enter your full name!</div>
                    </div>
                    <div class="col-md-6 mb-3 pb-1">
                      <label class="form-label" for="cont-email">Email address<sup class="text-danger ms-1">*</sup></label>
                      <input class="form-control" type="email" id="cont-email" placeholder="Enter Email" name="email" required>
                      <div class="invalid-feedback">Please enter a valid email address!</div>
                    </div>
                  </div>
                  <div class="mb-3 pb-1">
                    <label class="form-label" for="cont-message">Message<sup class="text-danger ms-1">*</sup></label>
                    <textarea class="form-control" id="cont-message" rows="5" placeholder="Write your message here" required></textarea>
                    <div class="invalid-feedback">Please write a message!</div>
                  </div>
                  <div class="text-center pt-2">
                    <button class="btn btn-danger" type="submit">Send Message</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
       Map + Directions
      <section class="container py-5 py-md-6 py-lg-7">
        <div class="row py-sm-3">
          <div class="col-md-7">
            <div class="gallery" id="map"><a class="gallery-item map-popup bg-position-center bg-no-repeat py-7 text-center border rounded-3" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.91476818218!2d-74.11976253858133!3d40.69740344296443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sua!4v1568574342685!5m2!1sen!2sua" data-iframe="true" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;396 Lillian Blvd, Holbrook, NY 11741&lt;/h6&gt;" style="background-image: url(img/pages/contacts/map03.png);"><span class="gallery-caption"><i class="ai-maximize-2 fs-xl mt-n1 me-2"></i>Expand the map</span>
                <div class="d-inline-block py-4 py-sm-7"><img src="{{asset('frontend-theme/around/img/pages/contacts/marker.png')}}" alt="Map marker" width="48"></div></a></div>
          </div>
          <div class="col-md-4 offset-md-1 pt-4">
            <h2 class="h4 pb-3">How to get there</h2>
            <h3 class="h5">Subway</h3>
            <ul class="list-unstyled fs-sm">
              <li>5 mins south 66 St. Lincoln Center</li>
              <li>10 mins west 59 St. Columbus Circus</li>
            </ul>
            <h3 class="h5">Busses</h3>
            <ul class="list-unstyled fs-sm mb-4 pb-2">
              <li>Public busses #43 and #38</li>
            </ul>
            <h2 class="h4 pb-2">Working hours</h2>
            <ul class="list-unstyled fs-sm">
              <li><span class="text-heading fs-base me-1">Mon - Fri:</span>9AM - 8PM</li>
              <li><span class="text-heading fs-base me-1">Sat:</span>10AM - 5PM</li>
              <li><span class="text-heading fs-base me-1">Sun:</span><span class="text-danger">Closed</span></li>
            </ul>
          </div>
        </div>
      </section>
    </main>
@endsection