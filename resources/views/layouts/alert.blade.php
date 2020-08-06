<style type="text/css">
    .swal2-container.swal2-backdrop-show{
        background: rgba(0,0,0,.2);
    }
    .swal2-success-ring{
      border-radius: 50%!important;
    }
</style>
@if(session()->has('data'))
<script type="text/javascript">
    Swal.fire({
      position: 'top-end',
      icon: "{{  session('data')['alert-type'] }}",
      title: "{{  session('data')['alert'] }} ",
      showConfirmButton: false,
      timer: 7000
    })
</script>
@endif
@if(count($errors->all()))
<script type="text/javascript">
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: '@foreach ($errors->all() as $message) {{ $message }}<br>@endforeach',
      showConfirmButton: false,
      timer: 7000
    })
</script>
@endif


 