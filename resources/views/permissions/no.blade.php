@extends('layouts.app')
@section('content')
    <div class="card card-gray">
        <div class="card-header">
            <div class="header-block">
                <p class="title">  សារព្រមាន
                   <a href="{{url('role')}}" class="btn btn-primary-outline btn-oval btn-sm mx-left"> 
                    <i class="fa fa-mail-reply"></i> ត្រលប់ក្រោយ</a>
                </p>
            </div>
        </div>
        
        <div class="card-block">
            <p></p>
           <h5 class="text-danger text-center">លោកអ្នកមិនមានសិទ្ធិមើលផ្នែកនេះទេ សូមទំនាក់ទំនងទៅកានអ្នកគ្រប់គ្រងកម្មវិធី!</h5>
           <p></p>
            
        </div>
    </div>
    
@endsection
@section('js')

   <script>
        $(document).ready(function () {
            $("#sidebar-menu li ").removeClass("active open");
			$("#sidebar-menu li ul li").removeClass("active");
			
            $("#menu_security").addClass("active open");
			$("#security_collapse").addClass("collapse in");
            $("#role_id").addClass("active");
			
        })
    </script>
@endsection