@extends('layouts.login')

@section('content')

	<br/>
	<!-- Login Header -->
	<h1 class="h2 text-center push-top-bottom animation-pullDown">
		<i class="fa fa-cube "></i> <strong>{{ CNF_APPNAME }}<br/><small> {{ CNF_APPDESC }} </small></strong>
	</h1>
	<!-- END Login Header -->
	
	<div class="sbox-content">
	    	@if(Session::has('message'))
				{!! Session::get('message') !!}
			@endif
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>		
	<ul class="nav nav-tabs" >
	  <li class="active"><a href="#tab-sign-in" data-toggle="tab">  {{ Lang::get('core.signin') }} </a></li>
	   <li ><a href="#tab-forgot" data-toggle="tab"> {{ Lang::get('core.forgotpassword') }} </a></li>
	   @if(CNF_REGIST =='true') 			
	   <li><a href="{{ URL::TO('user/register')}}" >  {{ Lang::get('core.signup') }} </a></li>
	   @endif	
	 
	</ul>
	
		
	<div class="tab-content" >
		<div class="tab-pane active" id="tab-sign-in">
		<form method="post" id="form-login" action="{{ url('user/signin')}}" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
			<div class="form-group">
				<label  for="login-email" class="col-xs-11"><i class="icon-users"></i>{{ Lang::get('core.email') }}	</label>
				<div class="col-xs-12">
					<input type="text" id="login-email" name="email" placeholder="Correo Electrónico" class="form-control" required="email" />
					
				</div>
			</div>
			
			<div class="form-group">
				<label  for="login-password" class="col-xs-11"><i class="icon-lock"></i>{{ Lang::get('core.password') }}	</label>
				<div class="col-xs-12">
					<input type="password" id="login-password" name="password" placeholder="Contraseña" class="form-control" required="true" />
				</div>
				
			</div>

			<div class="form-group form-actions">
				<div class="col-xs-8">
					<label class="csscheckbox csscheckbox-primary"> Recordar	</label>
					<input type="checkbox" name="remember" value="1" id="login-remember-me" />
				</div>
			</div>

                        
			<div class="form-group" >
				<div class="col-xs-8 text-right">
					<button type="submit" class="btn btn-effect-ripple btn-sm btn-success" ><i class="fa fa-sign-in"></i> {{ Lang::get('core.signin') }}</button>
				</div>
			 	<div class="clr"></div>
			</div>	
				
		   </form>			
		</div>
	<div class="tab-pane  m-t" id="tab-forgot">	
		<form method="post" action="{{ url('user/request')}}" class="form-vertical box" id="fr">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		   <div class="form-group">
		   <div class="col-xs-11">
				<label>{{ Lang::get('core.enteremailforgot') }}</label>
				<input type="text" name="credit_email" placeholder="{{ Lang::get('core.email') }}" class="form-control" required/>
				<i class="icon-envelope form-control-feedback"></i>
			</div> 	
			</div>
			<div class="form-group has-feedback">        
		      <button type="submit" class="btn btn-effect-ripple btn-sm btn-success"> {{ Lang::get('core.sb_submit') }} </button>        
		  </div>
		  <div class="clr"></div>
		</form>
	</div>
	</div>  
  </div>
	<footer class="text-muted text-center animation-pullUp">
                <small><span id="">2015-16</span> &copy; <a href="http://luku.co" target="_blank">Luku</a></small>
	</footer>
	

<script type="text/javascript">
	$(document).ready(function(){
		$('#or').click(function(){
		$('#fr').toggle();
		});
	});
</script>
@stop