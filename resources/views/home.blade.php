@extends('layout')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')

<div id="slide_show_in_desktop_mode">
  @include('components.desktopslideshow')
</div>
<div id="slide_show_in_mobile_mode">
  @include('components.mobileslideshow')
</div>

<!-- About Starts Here -->

 <div id="About" class="container-fluid" style="background:white;">
    <br><br>
      <div class="row">
        <div class="col-md-4">
        <img src=" {{asset('public/Img/about.png')}}" alt="" class="img-fluid" >
        </div>
        <div  align="center" class="col-md-8">
            <h1 class="black-text" style="font-weight:bold;">About Gainloe</h1>
            <div class="col-md-3" style=" border-bottom: 2px solid #003399;"></div>
            <div class="row my-5" style="font-size:30px;">
              <div class="col-md-6" >
                    <ul align="left" style="list-style:none;">
                    <li><i class="fab fa-pagelines"></i> Natural Fibre</li>
                    <li><i class="fab fa-pagelines"></i> Eco Friendly Products</li>
                    </ul>
              </div>
              <div class="col-md-6">
                    <ul align="left" style="list-style:none;">
                    <li><i class="fab fa-pagelines"></i> Plant Fibre Furnishi</li>
                    <li><i class="fab fa-pagelines"></i> Highly Climate Resilent</li>
                  </ul>
              </div>
            </div>
            <p  align="left" class="mx-5">
              <a href="{{url('about')}}"  class="btn btn-dark">Know More</a>
              </p>
                                            
        </div>
      </div>
      
</div>

<!-- About completed Here -->

@php
$Products=App\Models\Products::where('status','=','1')->get();
@endphp
<!-- Products Starts Here -->
<section id="Products" align="center">
  
    <h1 class="black-text" style="font-weight:bold;">PRODUCTS</h1>
    <div style=" border-bottom: 2px solid #003399;width:100px;margin-left:45%;"></div>
    <div  class="row "  >
      @foreach($Products as $item)
      <div class="col-md-4 px-5">
          <img src=" {{asset('public/Uploads/Products/'.$item->image1)}}" alt="" class="img-fluid" >
          
            <h2 class="black-text" style="font-weight:bold;">{{$item->name}}</h2>
            <a href="Shop/{{$item->url}}" class="btn btn-primary">Shop Now</a>
      
      </div>  
     @endforeach

    </div>
   
    <hr class="col-md-6"> 
</section>
<!-- Products Ends Here -->
<section  class="slideanim"  id="testimonialsdesktopmode" align="center"  >
 
      @include('components.testimonialsdesktopmode')
</section>
<section  class="slideanim"  id="testimonialsmobilemode" align="center"  >
 
 @include('components.testimonialsmobilemode')
</section>

 

<!--Team Starts Here-->
 <div id="Team">
<div id="teaminthedesktopmode" class="container" align="center" >
      @include('components.teamindesktopmode')
</div>
<div id="teaminthemobilemode" class="container"  align="center" >
      @include('components.teaminmobilemode')
</div>
 </div>
<!--Team Ends Here-->
<!-- ======= Contact Section Starts Here ======= --> 
 
  <section id="contact" class="contact" style="background:white;">
          <div class="container">

            <div class="section-title">
            
              <h2>Contact</h2>
              <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
            </div>

            <div class="row">

              <div class="col-lg-5 d-flex align-items-stretch">
                <div align="left" class="info">
                  <div class="address" >
                  <i class="fas fa-map-marker-alt"></i>
                    <h4>Location:</h4>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>

                  <div class="email">
                  <i class="fas fa-envelope"></i>
                    <h4>Email:</h4>
                    <p>info@example.com</p>
                  </div>

                  <div class="phone">
                  <i class="fas fa-phone"></i>
                    <h4>Call:</h4>
                    <p>+1 5589 55488 55s</p>
                  </div>

                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

              </div>

              <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="name">Your Name</label>
                      <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                      <div class="validate"></div>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">Your Email</label>
                      <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                      <div class="validate"></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validate"></div>
                  </div>
                  <div class="form-group">
                    <label for="name">Message</label>
                    <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                    <div class="validate"></div>
                  </div>
                  <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div>

            </div>

          </div>
  </section>
 
<!-- ======= Contact Section Ends Here ======= --> 
  
  


@if (session('status'))

        <script>
            $(document).ready(function () {

        $('#centralModalSuccess').modal('show');

        });
        </script>
@endif

 
 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">Order Success</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p> <?php echo  session('status') ?></p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="{{url('/')}}" class="btn btn-success">SHOP MORE<i class="far fa-gem ml-1 text-white"></i></a>
         <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->
@endsection
  