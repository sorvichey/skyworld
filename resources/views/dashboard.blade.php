@extends('layouts.app')
@section('content')
   <h1>Dashboard</h1>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $("#sidebar-menu li").removeClass('active');
            $("#menu_dashboard").addClass('active');
        });
    </script>
@stop