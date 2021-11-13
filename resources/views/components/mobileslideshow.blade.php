<style>
    .bottom-left {
  position: absolute;
  bottom: 8px;
  left: 80px;
}
</style>

<div align="center" id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="carousel" style="  background: #c2c2a3;" >
    <br>
  <div class="carousel-inner py-2" role="listbox">
      <div class="carousel-item  active" >
        <div class="col-12 col-md-3" style="border-radius:10px;">
                <div class="container">
                        <div class="card mb-2">
                          <img class="card-img-top  animated pulse infinite slow" src="{{asset('slideshow/Mobile/1.webp')}}"
                                alt="Card image cap" style="border-radius:10px;">
                        </div>
                  </div>
        </div>
      </div>    
      <div class="carousel-item" >
        <div class="col-12 col-md-3" style="border-radius:10px;">
                <div class="container">
                        <div class="card mb-2">
                          <img class="card-img-top  animated pulse infinite slow" src="{{asset('slideshow/Mobile/2.webp')}}"
                                alt="Card image cap" style="border-radius:10px;">
                        </div>
                        <div class="bottom-left"  >
                           <button class="btaobtn btaobtn-primary" onclick="services()">Book Now</button>
             
                        </div>
                  </div>
        </div>
      </div>   
      <div class="carousel-item" >
        <div class="col-12 col-md-3" style="border-radius:10px;">
                <div class="container">
                        <div class="card mb-2">
                          <img class="card-img-top  animated pulse infinite slow" src="{{asset('slideshow/Mobile/3.webp')}}"
                                alt="Card image cap" style="border-radius:10px;">
                        </div>
                        <div class="bottom-left"  >
                         
                        </div>
                  </div>
        </div>
      </div>   
      <div class="carousel-item" >
        <div class="col-12 col-md-3" style="border-radius:10px;">
                <div class="container">
                        <div class="card mb-2">
                          <img class="card-img-top  animated pulse infinite slow" src="{{asset('slideshow/Mobile/4.webp')}}"
                                alt="Card image cap" style="border-radius:10px;">
                        </div>
                        <div class="bottom-left mx-5"  >
                           <button class="btaobtn btaobtn-primary" onclick="services()">Book Now</button>
             
                        </div>
                  </div>
        </div>
      </div>   
      
      
  </div> 
</div>     