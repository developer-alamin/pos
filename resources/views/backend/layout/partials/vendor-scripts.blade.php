<script src="{{ URL::asset('assets/build/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/build/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ URL::asset('assets/build/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ URL::asset('assets/build/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ URL::asset('assets/build/js/plugins.js') }}"></script>
@yield('script')
@yield('script-bottom')
@stack('scripts')
<script>
    if ('serviceWorker' in navigator ) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/salepro/service-worker.js').then(function(registration) {
                // Registration was successful
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            }, function(err) {
                // registration failed :(
                console.log('ServiceWorker registration failed: ', err);
            });
        });
    }
</script>
<script type="text/javascript">
    var theme = <?php echo json_encode($theme); ?>;
    if(theme == 'dark') {
        $('body').addClass('dark-mode');
        $('#switch-theme i').addClass('dripicons-brightness-low');
    }
    else {
        $('body').removeClass('dark-mode');
        $('#switch-theme i').addClass('dripicons-brightness-max');
    }
    $('#switch-theme').click(function() {
        if(theme == 'light') {
            theme = 'dark';
            var url = <?php echo json_encode(route('switchTheme', 'dark')); ?>;
            $('body').addClass('dark-mode');
            $('#switch-theme i').addClass('dripicons-brightness-low');
        }
        else {
            theme = 'light';
            var url = <?php echo json_encode(route('switchTheme', 'light')); ?>;
            $('body').removeClass('dark-mode');
            $('#switch-theme i').addClass('dripicons-brightness-max');
        }

        $.get(url, function(data) {
            console.log('theme changed to '+theme);
        });
    });

    var alert_product = <?php echo json_encode($alert_product) ?>;

  if ($(window).outerWidth() > 1199) {
      $('nav.side-navbar').removeClass('shrink');
  }
  
  function myFunction() {
      setTimeout(showPage, 100);
  }

  function showPage() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("content").style.display = "block";
  }

  $("div.alert").delay(4000).slideUp(800);

  function confirmDelete() {
      if (confirm("Are you sure want to delete?")) {
          return true;
      }
      return false;
  }

  $("li#notification-icon").on("click", function (argument) {
      $.get('notifications/mark-as-read', function(data) {
          $("span.notification-number").text(alert_product);
      });
  });

  $("a#add-expense").click(function(e){
    e.preventDefault();
    $('#expense-modal').modal();
  });

  $("a#send-notification").click(function(e){
    e.preventDefault();
    $('#notification-modal').modal();
  });

  $("a#add-account").click(function(e){
    e.preventDefault();
    $('#account-modal').modal();
  });

  $("a#account-statement").click(function(e){
    e.preventDefault();
    $('#account-statement-modal').modal();
  });

  $("a#profitLoss-link").click(function(e){
    e.preventDefault();
    $("#profitLoss-report-form").submit();
  });

  $("a#report-link").click(function(e){
    e.preventDefault();
    $("#product-report-form").submit();
  });

  $("a#purchase-report-link").click(function(e){
    e.preventDefault();
    $("#purchase-report-form").submit();
  });

  $("a#sale-report-link").click(function(e){
    e.preventDefault();
    $("#sale-report-form").submit();
  });
  $("a#sale-report-chart-link").click(function(e){
    e.preventDefault();
    $("#sale-report-chart-form").submit();
  });

  $("a#payment-report-link").click(function(e){
    e.preventDefault();
    $("#payment-report-form").submit();
  });

  $("a#warehouse-report-link").click(function(e){
    e.preventDefault();
    $('#warehouse-modal').modal();
  });

  $("a#user-report-link").click(function(e){
    e.preventDefault();
    $('#user-modal').modal();
  });

  $("a#customer-report-link").click(function(e){
    e.preventDefault();
    $('#customer-modal').modal();
  });

  $("a#supplier-report-link").click(function(e){
    e.preventDefault();
    $('#supplier-modal').modal();
  });

  $("a#due-report-link").click(function(e){
    e.preventDefault();
    $("#customer-due-report-form").submit();
  });

  $("a#supplier-due-report-link").click(function(e){
    e.preventDefault();
    $("#supplier-due-report-form").submit();
  });

  $(".account-statement-daterangepicker-field").daterangepicker({
      callback: function(startDate, endDate, period){
        var start_date = startDate.format('YYYY-MM-DD');
        var end_date = endDate.format('YYYY-MM-DD');
        var title = start_date + ' To ' + end_date;
        $(this).val(title);
        $('#account-statement-modal input[name="start_date"]').val(start_date);
        $('#account-statement-modal input[name="end_date"]').val(end_date);
      }
  });

  $('.date').datepicker({
     format: "dd-mm-yyyy",
     autoclose: true,
     todayHighlight: true
   });

  $('.selectpicker').selectpicker({
      style: 'btn-link',
  });
</script>
