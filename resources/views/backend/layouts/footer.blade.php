<!-- footer content -->
<footer>
    <div class="pull-right">
     Myanmar Dating Website <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
  
  </div>
      </div>
  
      <!-- jQuery -->
      <script src="{{ url('assets/js/jquery2.2/jquery.min.js')}}"></script>
      <script src="{{ url('assets/js/pnotify/pnotify.js')}}"></script>
      <!-- Bootstrap -->
     <script src="{{ url('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
      <!-- jQuery Sparklines -->
      <script src="{{ url('assets/js/sparkline/jquery.sparkline.min.js')}}"></script>
      <!-- bootstrap-progressbar -->
      <script src="{{ url('assets/js/bootstrap-progress-bar/bootstrap-progressbar.min.js')}}"></script>
      <!-- Flot -->
      <script src="{{ url('assets/js/flot/jquery.flot.js')}}"></script>
      <!-- DateJS -->
      <script src="{{ url('assets/js/datejs/date.js')}}"></script>
      <!-- iCheck -->
      <script src="{{ url('assets/js/iCheck/icheck.min.js')}}"></script>
      <script src="{{ url('assets/js/sweetalert/sweetalert.js')}}"></script>
  
      <!-- Custom Theme Scripts -->
      <script src="{{ url('assets/js/custom.js')}}"></script>

      @if (session('success_msg'))
          <script>
            new PNotify({
              title: 'Success!',
              text: "{{ session('success_msg')}}",
              type: 'success',
              styling: 'bootstrap3'
            })
          </script>         
      @endif

      @if (session('error_msg'))
          <script>
            new PNotify({
              title: 'Oh No!',
              text: "{{ session('error_msg')}}",
              type: 'error',
              styling: 'bootstrap3'
            })
          </script>       
      @endif
  