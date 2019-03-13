@extends('layouts.mainTable')

@section('content')

<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
                    {!! Form::open([ 'action' => 'HomePageController@table', 'method' => 'get']) !!}

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => 'Search School']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::select('categories', $search_categories, null , ['placeholder' => 'Category', 'class' => 'form-control form-control-lg']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('categories'))
                                    <p class="help-block">
                                        {{ $errors->first('categories') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                {!! Form::select('city_id', $search_cities, null, ['placeholder' => 'City', 'class' => 'form-control form-control-lg']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('city_id'))
                                    <p class="help-block">
                                        {{ $errors->first('city_id') }}
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit"
                                        class="btn btn-primary">
                                        Search Now
                                </button>
                            </div>
                        </div>

                    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">{{ $company->name }}</h1>
					<div class="product-meta">
						<ul class="list-inline">
                            @foreach ($company->categories as $singleCategories)
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="{{ route('category', [$singleCategories->id]) }}">
                                        <span class="label label-info label-many">{{ $singleCategories->name }}</span>
                                </a></li>
                            @endforeach
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="{{ route('search', ['city_id' => $company->city->id]) }}">{{ $company->city->name }}</a></li>
						</ul>
					</div>
                    <br>
                    <div class="col-md-4">
                        @if($company->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $company->logo) }}" target="_blank"><img class="card-img-top img-fluid" src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $company->logo) }}"/></a>@endif
                    </div>
					<div class="content">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">About School</h3>
								<p>{{ $company->description}}</p>
							</div>
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <i class="fa fa-bookmark  fa-2x"></i><h3 class="tab-title">Course & Program</h3>
                                <p> </p>
                            </div>
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <i class="fa fa-calendar fa-2x"></i><h3 class="tab-title">Audition & Events</h3>
								<p>{{ $company->address}}</p>
							</div>
						</div>
					</div>
                    <div class="container-fluid">

                        <hr>
                        <div class="row">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="row text-center">
                            <div class="col-4 box1 pt-4">
                                <a href="tel:+123456789"><i class="fa fa-phone fa-3x"></i>
                                    <h3 class="d-none d-lg-block d-xl-block">Phone</h3>
                                    <p class="d-none d-lg-block d-xl-block">+123456789</p></a>
                            </div>
                            <div class="col-4 box2 pt-4">
                                <a href=""><i class="fa fa-home fa-3x"></i>
                                    <h3 class="d-none d-lg-block d-xl-block">Address</h3>
                                    <p class="d-none d-lg-block d-xl-block">{{ $company->address}}</p></a>
                            </div>
                            <div class="col-4 box3 pt-4">
                                <a href="mailto:test@test.com"><i class="fa fa-envelope fa-3x"></i>
                                    <h3 class="d-none d-lg-block d-xl-block">E-mail</h3>
                                    <p class="d-none d-lg-block d-xl-block">test@test.com</p></a>
                            </div>
                        </div>
                    </div>


                </div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<!-- User Profile widget -->
					<div class="widget user">
						<h4>Schools for {{ $singleCategories->name }} Studies</h4>
                        @foreach ($company->categories as $singleCategories)
                            @foreach ($singleCategories->companies->shuffle()->take(10) as $singleCompany)
                            <li><a href="{{ route('company', [$singleCompany->id]) }}">{{ $singleCompany->name }}</a></li>
                            @endforeach
                        @endforeach
					</div>
					<!-- Map Widget -->
				</div>
                <div class="sidebar">
                    <!-- User Profile widget -->
                    <div class="widget user">
                        <h4>School in {{ $company->city->name }}</h4>

                    </div>
                    <!-- Map Widget -->
                </div>
			</div>
			
		</div>
	</div>
	<!-- Container End -->
</section>

@stop
