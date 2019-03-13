@extends('layouts.mainTable')

@section('content')

    <section class="page-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">

                <div class="col-md-9">
                    <div class="product-grid-list">
                        <div class="row mt-30">

                            @foreach ($auditions as $singleAudition)
                                <div class="col-sm-12 col-lg-4 col-md-6">

                                    <!-- product card -->

                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">{{$singleAudition->name}}</h4>
                                            </div>

                                            <div class="card-body">
                                                <p class="card-header-pills"><i class="fa fa-calendar-check-o"> </i> Date & time</p>
                                                <p class="card-text">{{ $singleAudition->audition_date .' '. $singleAudition->audition_time }}</p>
                                                <p class="card-header-pills"><i class="fa fa-map-marker"> </i> Venue</p>
                                                <h6 class=cart-text"> {{ $singleAudition->venues->name }} </h6>
                                                <p class="card-text"> {{ $singleAudition->venues->address.' '.
                                                                         $singleAudition->venues->address_option.' '.
                                                                         $singleAudition->venues->city.' '.
                                                                         $singleAudition->venues->postal_code.' '}} </p>
                                                <p class="card-header-pills"><i class="fa fa-folder-open-o"></i> Category</p>
                                                <p class="badge-pills">
                                                    @foreach ($singleAudition->categories as $singleCategories)

                                                        <span class="badge badge-primary"> <a href="{{ route('category', [$singleCategories->id]) }}">{{ $singleCategories->name }}</a> </span>

                                                    @endforeach
                                                </p>
                                                <p class="card-header-pills"><i class="fa fa-file-o"> </i> About</p>
                                                <p class="card-text">{{ substr($singleAudition->details, 0, 200) }}... <a href="#" class="badge badge-pill badge-info">View Detail</a></p>

                                                <p class="card-header-pills"><i class="fa fa-bookmark-o"></i> Schools</p>
                                                    <p class="badge-pills">
                                                        @foreach ($singleAudition->companies as $singleCompanies)

                                                            <span class="badge badge-secondary"><a href="{{ route('company', [$singleCompanies->id]) }}">  {{ $singleCompanies->name }}</a> </span>

                                                         @endforeach
                                                    </p>

                                                <p class="card-header-pills"><i class="fa fa-credit-card"> </i> Application Fee: </p>{{ $singleAudition->fees }}.00 GBP

                                            </div>
                                                <div class="card-footer">
                                                    <button type="button" class="btn btn-primary btn-lg btn-block">Apply Now</button>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>


@stop