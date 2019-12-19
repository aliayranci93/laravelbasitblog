@extends('front.layouts.master')
@section('title')
Anasayfa
@endsection
@section('content')<!-- değişken kısım -->

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-4 col-md-12 mb-4">

      <!--Modal: Name-->
      <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

          <!--Content-->
          <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

              <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                  <img alt="picture" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(115).jpg"
            class="embed-responsive-item"  allowfullscreen />
              </div>

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
              <span class="mr-4">Resim Adı!</span>


              <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Kapat</button>

            </div>

          </div>
          <!--/.Content-->

        </div>
      </div>
      <!--Modal: Name-->

      <a><img class="img-fluid z-depth-1" src="https://mdbootstrap.com/img/screens/yt/screen-video-1.jpg" alt="video"
          data-toggle="modal" data-target="#modal1"></a>

    </div>
    <!-- Grid column -->











  </div>
  <!-- Grid row -->


@section('js')
<script type="text/javascript">

</script>
@endsection
<!-- css section -->
@section('css')
<style>
</style>
@endsection
@endsection<!-- değişken kısım bitti -->
