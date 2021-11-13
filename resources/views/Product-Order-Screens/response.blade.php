@extends('layout')
@section('title') Gainloe @endsection
@section('keywords') Home,About,Contact,Car @endsection
@section('description') Write some descripton about the webpage @endsection
@section('content')
 
 
 
@if(session('payment_failure'))
  <script>
    $(document).ready(function () {

  $('#centralModalfailure').modal('show');

  });
  </script>
@endif
<section class="container">
  <div class="text-center">
      <i class="fas fa-exclamation-circle fa-4x mb-3 animated rotateIn"></i>
      <h3 style="color: red"> <?php echo session('payment_failure')?></h3>
      <p> Please Try Again</p>
      <a href="/proceed_to_Payment/{{session('O_id')}}" class="btaobtn btaobtn-danger">Try Again<i class="far fa-gem ml-1 text-white"></i></a>
      <a href="/" class="btaobtn btaobtn-outline-danger">Back To Home Page</a>


    </div>
</section>
 


  <!-- Central Modal Medium Failure -->
  <div class="modal fade" id="centralModalfailure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Payment Failed</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">
        <div class="text-center">
          <i class="fas fa-exclamation-circle fa-4x mb-3 animated rotateIn"></i>
          <h3 style="color: red"> <?php echo session('payment_failure')?></h3>
          <p> Please Try Again</p>
        
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
        <a href="/proceed_to_Payment/{{session('O_id')}}" class="btaobtn btaobtn-danger">Try Again<i class="far fa-gem ml-1 text-white"></i></a>
        <a href="/" class="btaobtn btaobtn-outline-danger"  >Back to Home Page</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Central Modal Medium Failure-->

@endsection