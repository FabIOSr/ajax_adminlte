<script src="{{ asset('js/app.js') }}"></script>
<script src="/vendor/shieldforce/package-auto-validation-laravel/public/plugins/toast/toast.js"></script>
<script src="/vendor/shieldforce/package-auto-validation-laravel/public/js/toast.adapters.js"></script>

@if (count($errors) > 0)
	<script>
		$.toast( {
			heading   : 'Atenção ao(s) seguinte(s) erro(s):' ,
			text      : [
				@foreach ($errors->all() as $error)
					"{{ $error }}" ,
				@endforeach
			] ,
			icon      : 'error' ,
			hideAfter : false ,
			position  : 'top-right' ,
		} )
	</script>
@endif