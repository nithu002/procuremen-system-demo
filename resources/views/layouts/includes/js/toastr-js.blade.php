<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Toastr -->
<script src="../..{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script>
        $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-right',
      showConfirmButton: false,
      timer: 5000
    });

    $('.swalDefaultSuccess').show(function() {
      Toast.fire({
        icon: 'success',
        title: '{{ Session::get('success') }}'
      })
    });
    $('.swalDefaultInfo').show(function() {
      Toast.fire({
        icon: 'info',
        title: '{{ Session::get('info') }}'
      })
    });
    $('.swalDefaultError').show(function() {
      Toast.fire({
        icon: 'error',
        title: '{{ Session::get('error') }}'
      })
    });
    $('.swalDefaultWarning').show(function() {
      Toast.fire({
        icon: 'warning',
        title: '{{ Session::get('warning') }}'
      })
    });
    $('.swalDefaultQuestion').show(function() {
      Toast.fire({
        icon: 'question',
        title: '{{ Session::get('question') }}'
      })
    });
    $('.swalError').show(function() {
      Toast.fire({
        icon: 'error',
        title: 'Not Added The details! some errors from your created form please check manually.'
      })
    });
  });
</script>
