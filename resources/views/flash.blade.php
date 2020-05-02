@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>	

        <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>	

        <strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('warning'))

<div class="alert alert-warning alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>	

	<strong>{{ $message }}</strong>

</div>

@endif


@if ($message = Session::get('info'))

<div class="alert alert-info alert-block">

	<button type="button" class="close" data-dismiss="alert">×</button>	

	<strong>{{ $message }}</strong>

</div>

@endif


@if ($errors->any())

<div class="alert alert-danger">

	<button type="button" class="close" data-dismiss="alert">×</button>	

	Please check the form below for errors

</div>

@endif
 
 
 
 
 {{-- @if(Session::has('flash_message'))
  <script type="text/javascript">
     swal({
         title:'Success!',
         text:"{{Session::get('success')}}",
         timer:2000,
         type:'success'
     }).then((value) => {
       //location.reload();
     }).catch(swal.noop);
 </script>
 @endif  --}}

 {{-- @if ( Session::has('message') )
         
  M.toast({html: '{{ Session::get('message') }}'}) 
                 
@endif --}}