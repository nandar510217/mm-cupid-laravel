
<script src="{{ url('assets/front/js/bootstrap.bundle.min.js')}}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
    @if (session('succ_msg'))
        <script>
            new PNotify({
              title: 'Success!',
              text: "{{ session('succ_msg')}}",
              type: 'success',
              styling: 'bootstrap3'
            })
        </script>         
    @endif

    @if (session('err_msg'))
        <script>
            new PNotify({
              title: 'Oh No!',
              text: "{{ session('err_msg')}}",
              type: 'error',
              styling: 'bootstrap3'
            })
        </script>       
    @endif
    
  
</html>