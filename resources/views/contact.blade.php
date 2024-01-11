@extends('layouts.app')

@section('content')
<x-banner title="Contact" description="let’s stay in touch!"></x-banner>
<section class="contact-us">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-12">
          <div class="down-contact">
            <div class="row">
              <div class="col-lg-8">
                <div class="sidebar-item contact-form">
                  <div class="sidebar-heading">
                    <h2>Send us a message</h2>
                  </div>
                  <div class="content">
                      @if(session('success'))
                          <div class="alert alert-success my-2">
                              {{ session('success') }}
                          </div>
                      @endif
                    <form id="contact" action="{{route('store.contact')}}" method="post">
                      @csrf

                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                          <fieldset>
                            <input name="name" type="text" id="name" value="{{old('name')}}" placeholder="Your name"  >
                            
                            @error('name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror

                          </fieldset>
                        </div>
                        <div class="col-md-6 col-sm-12">
                          <fieldset>
                            <input name="email" type="text" id="email" value="{{old('email')}}" placeholder="Your email" >

                            @error('email')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror

                          </fieldset>
                        </div>
                        <div class="col-md-12 col-sm-12">
                          <fieldset>
                            <input name="subject" type="text" id="subject" value="{{old('subject')}}" placeholder="Subject">

                             @error('subject')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror

                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <textarea name="message" rows="6" id="message"  placeholder="Your Message" >{{old('message')}} </textarea>

                            @error('message')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror 

                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group ">
                              <strong>ReCaptcha:</strong>
                              <div class="g-recaptcha my-4" data-sitekey='6Lef9U0pAAAAAAN2-80uZXpGIuRIHAnA_uJac3Qv'></div>
                              @error('g-recaptcha-response')
                                  <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                              @enderror
                             
                          </div>  
                      </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="main-button">Send Message</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="sidebar-item contact-information">
                  <div class="sidebar-heading">
                    <h2>contact information</h2>
                  </div>
                  <div class="content">
                    <ul>
                      <li>
                        <h5>090-484-8080</h5>
                        <span>PHONE NUMBER</span>
                      </li>
                      <li>
                        <h5>info@company.com</h5>
                        <span>EMAIL ADDRESS</span>
                      </li>
                      <li>
                        <h5>123 Aenean id posuere dui, 
                            <br>Praesent laoreet 10660</h5>
                        <span>STREET ADDRESS</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-12">
          <div id="map">
            <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
        
      </div>
    </div>
  </section>
@endsection