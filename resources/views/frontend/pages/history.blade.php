
@extends('frontend.layouts.index')

@section('content')
	<section class="container margin-top margin-footer">
	    <div class="">
	        <div class="panel-content">
	            @include('frontend.components.partial.create-dict')
	        </div>
	        <div class=" text-center">
	            @include('frontend.components.partial.settings-table')
	        </div>
	    </div>
	</section>
@endsection

