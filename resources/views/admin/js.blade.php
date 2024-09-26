<script type="text/javascript">

      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this imaginary file!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willCancel) => {
          if(willCancel) {
            window.location.href = urlToRedirect;
          }
        });
      }

      document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault(); 


        let formData = new FormData(this);

        let xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
                let percentComplete = Math.round((e.loaded / e.total) * 100);
                document.getElementById('progressBar').style.width = percentComplete + '%';
                document.getElementById('progressBar').innerHTML = percentComplete + '%';
            }
        });

        xhr.addEventListener('load', function() {
            if (xhr.status == 200) {
                alert('Product uploaded successfully!');

                document.getElementById('uploadForm').reset();
                document.querySelector('.progress').style.display = 'none';

            } else {
                alert('Error uploading product!');
            }
        });

        document.querySelector('.progress').style.display = 'block';


        xhr.open('POST', '{{ url("upload_product") }}', true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); 
        xhr.send(formData);
        });


        

    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>

