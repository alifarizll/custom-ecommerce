<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    .loader 
    {
        position: fixed;
        left:0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 999999;
        margin: 0 auto;
        background: #22252a;
        padding-top: 20%;
        padding-left: 48%;
    }
  </style>

<div class="loader">
  <img src="{{asset('rings.svg')}}" alt="">
</div>

 <script>
  $(function()
  {
    setTimeout(()=>{
      $(".loader").fadeOut(1000);
    } , 1500)
  })
 </script>