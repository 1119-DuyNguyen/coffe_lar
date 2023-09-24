@extends('templates.clients.frontend')
@section('content')
<!-- <div class="breadcrumbs_wrap dark">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center">
                    <h2 class="breadcrumbs_title">Tin tức</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ti-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div> -->
<!-- =========================== Breadcrumbs =================================== -->


<!-- =========================== News & Articles =================================== -->
<section class="gray">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                {!! html_entity_decode($policyDetails->noidung) !!}
            </div>
        </div>
    </div>
</section>

@stop