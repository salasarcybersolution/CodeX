<!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{asset('public/assets/vendor/libs/jquery/jquery.js')}}"></script> 
  <script src="{{asset('public/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('public/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  
<!-- Vendors JS -->
<script src="{{asset('public/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/tagify/tagify.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>


<script src="{{asset('public/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>


<script src="{{asset('public/assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{asset('public/assets/js/extended-ui-sweetalert2.js')}}"></script>
<script src="{{asset('public/assets/vendor/js/menu.js')}}"></script>


<script src="{{asset('public/myCustomJs.js')}}"></script>
<script src="{{asset('public/CustomJs.js')}}"></script>
<script src="{{asset('public/final-report.js')}}"></script>
<script src="{{asset('public/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/assets/js/form-validation.js')}}"></script>
  

<script src="{{asset('public/assets/js/forms-selects.js')}}"></script>
<script src="{{asset('public/assets/js/forms-tagify.js')}}"></script>
<script src="{{asset('public/assets/js/forms-typeahead.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/bloodhound/bloodhound.js')}}"></script>



<script src="{{asset('public/assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/i18n/i18n.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>

<script src="{{asset('public/assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/datatables-fixedcolumns/datatables.fixedcolumns.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>

<script src="{{asset('public/assets/js/main.js')}}"></script>
<script src="{{asset('public/assets/js/forms-pickers.js')}}"></script>

 <!-- Added by Husain -->

<script src="{{asset('public/assets/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<!-- <script src="{{asset('public/assets/vendor/libs/pickr/pickr.js')}}"></script> -->


 <script>
  $(document).ready(function () {
    $('#example').DataTable();
    checkInputFields();
 });

  function checkInputFields(){
    
    $('input, select, textarea').each(
    function(){
        var val = $(this).val().trim();
        if (val.length){
            $(this).parents('.field').addClass('populated-input');
        }
    });
  }

</script>

<script type="text/javascript">
      (function () {
    var $input = $("input"),
        $select = $("select"),
        $textarea = $("textarea"),
        $field = $(".field"),
        $clearButton = $(".clear-button");
        
        $input
            .on("focusin", function () {
                var $this = $(this);
                $this.closest($field).addClass("focus-active");
            })
            .on("focusout", function () {
                var $this = $(this);
                $this.closest($field).removeClass("focus-active");
                if ($this.val() == "") {
                    $this.closest($field).removeClass("populated-input");
                } else {
                    $this.closest($field).addClass("populated-input");
                }
            });

        $select
            .on("focusin", function () {
                var $this = $(this);
                $this.closest($field).addClass("focus-active");
            })
            .on("focusout", function () {
                var $this = $(this);
                $this.closest($field).removeClass("focus-active");
                if ($this.val() == "") {
                    $this.closest($field).removeClass("populated-input");
                } else {
                    $this.closest($field).addClass("populated-input");
                }
            });

         $textarea
            .on("focusin", function () {
                var $this = $(this);
                $this.closest($field).addClass("focus-active");
            })
            .on("focusout", function () {
                var $this = $(this);
                $this.closest($field).removeClass("focus-active");
                if ($this.val() == "") {
                    $this.closest($field).removeClass("populated-input");
                } else {
                    $this.closest($field).addClass("populated-input");
                }
            });   

        // $clearButton.on("click", function () {
        //     $input.closest($field).removeClass("populated-input");
        // });
    })();

    </script>

