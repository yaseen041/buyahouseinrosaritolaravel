@extends('admin.admin_app')
@section('content')
<div class="wrapper wrapper-content animated fadeIn">
	<div class="row">
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Client Users</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('users')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/users') }}"><span class="label label-primary">View</span></a></div>
					<small>Client Users</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Property Types</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('types')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/types') }}"><span class="label label-primary">View</span></a></div>
					<small>Types</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Property Features</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('features')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/features') }}"><span class="label label-primary">View</span></a></div>
					<small>Features</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Communities</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('neighborhoods')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/communities') }}"><span class="label label-primary">View</span></a></div>
					<small>Communities</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Property Listings</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('properties')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/property-listings') }}"><span class="label label-primary">View</span></a></div>
					<small>Property Listings</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Home Evaluation</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('home_evals')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/evaluations') }}"><span class="label label-primary">View</span></a></div>
					<small>Requests</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Cities of Operation</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('cities')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/cities') }}"><span class="label label-primary">View</span></a></div>
					<small>Cities</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Testimonials</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('testimonials')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/testimonials') }}"><span class="label label-primary">View</span></a></div>
					<small>Testimonials</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Newsletter</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('newsletter_subs')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/newsletter') }}"><span class="label label-primary">View</span></a></div>
					<small>Subscribers</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Contact</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('contact_requests')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/contact') }}"><span class="label label-primary">View</span></a></div>
					<small>Requests</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Tour</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('tour_bookings')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/tour') }}"><span class="label label-primary">View</span></a></div>
					<small>Requests</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Real Estate Agents</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('agents')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/agents') }}"><span class="label label-primary">View</span></a></div>
					<small>Agents</small>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<span class="label label-success pull-right">Total</span>
					<h5>Blogs</h5>
				</div>
				<div class="ibox-content">
					<h1 class="no-margins">{{count_records('blogs')}}</h1>
					<div class="stat-percent font-bold text-primary"><a href="{{ url('admin/blogs') }}"><span class="label label-primary">View</span></a></div>
					<small>Blogs</small>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection