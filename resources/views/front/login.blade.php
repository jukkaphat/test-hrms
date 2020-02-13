<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>{{$setting->website}} | เข้าสู่ระบบ</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- CSS Global Compulsory -->
    {!! HTML::style('front_assets/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! HTML::style('front_assets/css/style.css') !!}

    <!-- CSS Implementing Plugins -->
    {!! HTML::style('front_assets/plugins/line-icons/line-icons.css') !!}
    {!! HTML::style('front_assets/plugins/font-awesome/css/font-awesome.min.css') !!}

    <!-- CSS Page Style -->
    {!! HTML::style('front_assets/css/pages/page_log_reg_v2.css') !!}

    <!-- CSS Theme -->
    {!! HTML::style('front_assets/css/theme-colors/default.css') !!}

    <!-- CSS Customization -->
    {!! HTML::style('front_assets/css/custom.css') !!}
    {!! HTML::style('assets/global/plugins/froiden-helper/helper.css')  !!}
</head> 
<style>
	.myfont-head{
		font-family: 'Kanit', sans-serif !important;
	}
	.myfont-text{
		font-family: 'Sarabun', sans-serif !important;
	}
</style>

<!-- BEGIN BODY -->
<body class="login myfont-text">
<!-- BEGIN LOGO -->
<div class="logo">
		<img src="{{$setting->getLogoImageAttribute()}}" width="200px"/>
		<h4 class="form-title myfont-text" style="color:#FFF">สำหรับพนักงาน</h4>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	{!!  Form::open(array('url' => '','id'=> 'login-form', 'class' =>'login-form'))  !!}

		<h3 class="form-title myfont-head">ระบบจัดการบุคลากร</h3>
		<div id="alert"></div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">อีเมล</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="อีเมล" name="email"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">รหัสผ่าน</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="รหัสผ่าน" name="password"/>
			</div>
		</div>
		<label style="font-weight: normal;" class="margin-bottom-20 rem">
            <input type="checkbox" name="remember">	จำการเข้าสู่ระบบ
        </label>
		<div class="form-actions">
			<button type="submit" class="btn blue pull-right" id="submitbutton" onclick="login();return false;">
			เข้าสู่ระบบ <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	{!! Form::close() !!}
	<!-- END LOGIN FORM -->
	<hr>
		<div class="form-group text-center">
			<a href="/admin"><label class="btn btn-sm green ">ไปที่หน้าสำหรับ<u>ผู้ดูแล</u></label></label></a>
		</div>
	
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	  {{date('Y')}} &copy; {{$setting->website}}
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{!! HTML::script('front_assets/plugins/respond.js') !!}
{!! HTML::script('front_assets/plugins/html5shiv.js') !!}
{!! HTML::script('front_assets/js/plugins/placeholder-IE-fixes.js') !!}
<![endif]-->
<!-- JS Customization -->

{!!  HTML::script("assets/global/plugins/jquery.min.js") !!}
{!!  HTML::script("assets/global/plugins/bootstrap/js/bootstrap.min.js")  !!}
{!!  HTML::script("assets/global/plugins/backstretch/jquery.backstretch.min.js")  !!}
{!!  HTML::script("assets/global/scripts/metronic.js")  !!}
{!!  HTML::script("assets/admin/layout/scripts/demo.js")  !!}
{!!  HTML::script('assets/global/plugins/froiden-helper/helper.js') !!}

<!-- END PAGE LEVEL SCRIPTS -->

<script>
jQuery(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  Metronic.init(); // init metronic core components
	
       // init background slide images
       $.backstretch([
			"{{ URL::asset('assets/admin/pages/media/bg/1.jpg') }}",
			"{{ URL::asset('assets/admin/pages/media/bg/2.jpg') }}",
			"{{ URL::asset('assets/admin/pages/media/bg/3.jpg') }}",
			"{{ URL::asset('assets/admin/pages/media/bg/4.jpg') }}"
        ], {
          fade: 1000,
          duration: 7000
    }
    );
});
</script>


<script>
function login(){
	$.easyAjax({
		type: 'POST',
		url: "{{route('login')}}",
		data: $('#login-form').serialize(),
		container: "#login-form",
		messagePosition: 'inline',
		success: function (response) {
			if (response.status == "success") {
				$('#login-form')[0].reset();
			}
		}
	});
	return false;
}
    
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>