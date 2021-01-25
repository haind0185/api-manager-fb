@extends('master')

@section('content')
<main id="main-container">
	<div class="bg-body-light">
		<div class="content content-full">
			<div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
				<h1 class="flex-sm-fill h3 my-2">
					DataTables <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Tables transformed with dynamic features.</small>
				</h1>
				<nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
					<ol class="breadcrumb breadcrumb-alt">
						<li class="breadcrumb-item">
							<a class="link-fx" href="{{route('admin')}}">Home</a>
						</li>
						<li class="breadcrumb-item">
							<a class="link-fx" href="{{route('user-index')}}">User</a>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="content">
        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Dynamic Table <small>Full</small></h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">No</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Expires time</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Expires</th>
                            <th style="width: 15%;">Renew</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($users as $key => $value)
                        <tr>
                            <td class="text-center font-size-sm">{{$key+1}}</td>
                            <td class="font-w600 font-size-sm">
                                <a href="be_pages_generic_blank.html">{{$value->name}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm">
                                {{$value->email}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                            	<span class="badge {{config('define.C_LEVEL')[$value->level]}}">{{config('define.M_LEVEL')[$value->level]}}</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <em class="text-muted font-size-sm">{{$value->expires_time}}</em>
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge {{config('define.C_EXPIRES')[$value->expires]}}">{{config('define.M_EXPIRES')[$value->expires]}}</span>
                            </td>
                            <td class="d-none d-sm-table-cell">
                            	@if($value->expires == config('define.C_EXPIRES_OFF'))
                            	<button type="button" data-id="{{$value->id}}" class="btn btn-renew btn-alt-success mr-1 mb-3">
                                    <i class="fa fa-fw fa-plus mr-1"></i> Gia hạn
                                </button>
                                @else
                                <button type="button" data-id="{{$value->id}}" class="btn btn-dis-renew btn-danger mr-1 mb-3">
                                    <i class="fa fa-fw fa-times mr-1"></i> Bỏ gia hạn
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
</main>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', '.btn-renew', function(){
			let id = $(this).attr('data-id');
			let _token = "{{csrf_token()}}";
			let expires_time = $(this).parent().parent().children('td')[4].querySelector('em');
			let expires = $(this).parent().parent().children('td')[5];
			let renew = $(this).parent().parent().children('td')[6];
			$.ajax({
				type: "post",
				dataType: "json",
				data: {id: id, _token: _token},
				url: "{{ route('user-renew') }}",
				beforeSend: function(xhr) {
					xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				},
				success: function (data) {
					expires_time.innerText = data.data.expires_time;
					expires.innerHTML = '<span class="badge badge-success">on</span>';
					renew.innerHTML =	'<button type="button" data-id="'+data.data.id+'" class="btn btn-dis-renew btn-danger mr-1 mb-3">'
                                   			+'<i class="fa fa-fw fa-times mr-1"></i> Bỏ gia hạn'
                            			+'</button>';
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					
				}
			});
		});

		$(document).on('click', '.btn-dis-renew', function(){
			let id = $(this).attr('data-id');
			let _token = "{{csrf_token()}}";
			let expires_time = $(this).parent().parent().children('td')[4].querySelector('em');
			let expires = $(this).parent().parent().children('td')[5];
			let renew = $(this).parent().parent().children('td')[6];
			$.ajax({
				type: "post",
				dataType: "json",
				data: {id: id, _token: _token},
				url: "{{ route('user-dis-renew') }}",
				beforeSend: function(xhr) {
					xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				},
				success: function (data) {
					expires_time.innerText = data.data.expires_time;
					expires.innerHTML = '<span class="badge badge-danger">off</span>';
					renew.innerHTML =	'<button type="button" data-id="'+data.data.id+'" class="btn btn-renew btn-alt-success mr-1 mb-3">'
                                   			+'<i class="fa fa-fw fa-plus mr-1"></i> Gia hạn'
                            			+'</button>';
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					
				}
			});
		});
	});
</script>
@endsection