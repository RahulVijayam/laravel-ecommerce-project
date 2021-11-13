@extends('layout')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
<style>


    @media  screen and (max-width: 700px) {
    #helpcenterindesktopmode{
          display:none;
      }
      #helpcenterinmobilemode{
          display:block;
      }
    }
    
    @media  screen and (min-width: 700px) {
        #helpcenterindesktopmode{
          display:block;
      }
      #helpcenterinmobilemode{
          display:none;
      }
    }
     </style> 
    <div class="container">
    <div class="row d-flex align-items-center ">
<section align="center" id="helpcenterindesktopmode">
    <div class="card-deck" style="padding:5%;">
    <h1 align="center" class="black-text col-md-12" style="font-weight:bold;">Help Center</h1>
    
    <div class="card mb-4 ">
    
    <div class="view overlay">
    <img class="card-img-top  animated pulse infinite slow" src="https://codyhouse.co/demo-templates/mercurio/assets/img/card-v8-img-1.jpg" alt="Card image cap">
    <a href="Frequently-Asked-Questions">
    <div class="mask rgba-white-slight"></div>
    </a>
    </div>
    
    <div class="card-body">
    <h4 align="center" class="card-title font-weight-bold">FAQ'S</h4>
    
    <a href="Frequently-Asked-Questions" align="center" type="button" class="btaobtn btaobtn-outline-primary btn-md  animated pulse infinite slow">Read more</a>
    </div>
    </div>
    
    
    <div class="card mb-4">
    
    <div class="view overlay">
    <img class="card-img-top  animated pulse infinite slow" src="https://codyhouse.co/demo-templates/mercurio/assets/img/card-v8-img-3.jpg" alt="Card image cap">
    <a href="Shipping-and-Returns">
    <div class="mask rgba-white-slight"></div>
    </a>
    </div>
    
    <div class="card-body">
    <h4 align="center" class="card-title font-weight-bold">Shipping & Returns</h4>
     
    <a href="Shipping-and-Returns" align="center" type="button" class="btaobtn btaobtn-outline-primary  btn-md  animated pulse infinite slow">Read more</a>
    </div>
    </div>
    
    
    <div class="card mb-4">
    
    <div class="view overlay">
    <img class="card-img-top  animated pulse infinite slow" src="https://codyhouse.co/demo-templates/mercurio/assets/img/card-v8-img-4.jpg" alt="Card image cap">
    <a href="Contact">
    <div class="mask rgba-white-slight"></div>
    </a>
    </div>
    
    <div class="card-body">
    <h4 align="center" class="card-title font-weight-bold">Contact Us</h4>
    
    <a href="Contact" align="center" type="button" class="btaobtn btaobtn-outline-primary  btn-md  animated pulse infinite slow">Read more</a>
    </div>
    </div>
    
    </div>
    </section>
    
<section id="helpcenterinmobilemode" align="center"  class="wow fadeInUp" id="featuredproducts">
    <h1 align="center" class="black-text col-md-12" style="font-weight:bold;">Help Center</h1>
    
    <div align="center" id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
    <div class="col-12 col-md-3">
    <div class="card mb-2">
    <img class="card-img-top  animated pulse infinite slow" src="https://codyhouse.co/demo-templates/mercurio/assets/img/card-v8-img-1.jpg" alt="Card image cap">
    <div class="card-body">
    <h4 class="card-title font-weight-bold">FAQ'S</h4>
    
    <a href="Frequently-Asked-Questions" class="btn btn-primary btn-md btn-rounded  animated pulse infinite slow">READ MORE</a>
    </div>
    </div>
    </div>
    </div>
    <div class="carousel-item">
    <div class="col-12 col-md-3">
    <div class="card mb-2">
    <img class="card-img-top  animated pulse infinite slow" src="https://codyhouse.co/demo-templates/mercurio/assets/img/card-v8-img-3.jpg" alt="Card image cap">
    <div class="card-body">
    <h4 class="card-title font-weight-bold">Shipping & Returns</h4>
    
    <a href="Shipping-and-Returns" class="btn btn-primary btn-md btn-rounded  animated pulse infinite slow">READ MORE</a>
    </div>
    </div>
    </div>
    </div>
    <div class="carousel-item">
    <div class="col-12 col-md-3">
    <div class="card mb-2">
    <img class="card-img-top  animated pulse infinite slow" src="https://codyhouse.co/demo-templates/mercurio/assets/img/card-v8-img-4.jpg" alt="Card image cap">
    <div class="card-body">
    <h4 class="card-title font-weight-bold">Contact Us</h4>
    
    <a href="Contact" class="btn btn-primary btn-md btn-rounded  animated pulse infinite slow">READ MORE</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="controls-top">
    <a class="btn btn-primary animated pulse infinite slow" style="border-radius:50px;" href="#carousel-example-multi" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="btn btn-primary animated pulse infinite slow" style="border-radius:50px;" href="#carousel-example-multi" data-slide="next"><i class="fas fa-chevron-right"></i></a>
    </div>
    
    </div>
    </section>
    </div>
    </div>
    </section>
</div>
</div> 
@endsection