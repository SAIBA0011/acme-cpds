@extends('spark::layouts.app')

@section('content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Cpd Articles</div>

				<div class="panel-body">
				@if(count($cpds))
					<table class="table table-striped">
						<thead>
							<th>Accreditation Number</th>
							<th>Name</th>
							<th>CEU</th>
							<th>Expiry Date</th>
							<th>Cost</th>
							<th>Purchase</th>
						</thead>
						<tbody>
							@foreach($cpds as $cpd)
							<tr>
								<td>{{ $cpd->accreditation_number }}</td>
								<td><a href="#" data-toggle="modal" data-target="#cpd_{{ $cpd->id }}">{{ $cpd->name }}</a></td>
								<td>{{ $cpd->points }} CEU</td>
								<td>{{ $cpd->expiry_date->toFormattedDateString() }}</td>
								<td>{{ $cpd->cost }} Credits</td>
								<td>
									@if(auth()->user()->hasPurchasedCpd($cpd->id))
									<a href="/cpds/purchase/{{ $cpd->id }}" class="btn btn-xs btn-success btn-block disabled">Purchased</a>
									@else
									<a href="/cpds/purchase/{{ $cpd->id }}" class="btn btn-xs btn-primary btn-block">Purchase</a>
									@endif
								</td>
							</tr>
							<div class="modal fade" id="cpd_{{ $cpd->id }}">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title"><b>{{ $cpd->accreditation_number }}</b> - {{ $cpd->name }}</h4>
							      </div>
							      <div class="modal-body">
							      	<h4>Description</h4>
							        {{ nl2br($cpd->description) }}
							        @if(count($cpd->articles))
							        <hr>
							        <h4>Articles</h4>
								        @if(auth()->user()->hasPurchasedCpd($cpd->id))
								        	<ul class="list-group">
								        	@foreach($cpd->articles as $article)
								        		<li class="list-group-item">
								        			<i class="fa fa-file-pdf-o"></i> 
								        			<a href="{{ $article->link }}" target="_blank">{{ $article->name }}</a>
							        			</li>
								        	@endforeach
								        </ul>
								        @else
								        <p>You will be able to access the articles once you have purchased this CPD unit for {{ $cpd->cost }} credits.</p>
								        @endif
							        @endif
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>
							  </div>
							</div>
							@endforeach
						</tbody>
					</table>
				@else
				<div class="alert alert-info">
					<p>There are currently no cpds listed, please check back later.</p>
				</div>
				@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
