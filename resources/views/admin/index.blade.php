@extends('theme.default')

@section('heading')
Dashboard
@endsection

@section('content')
    <div class="row">
            <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center text-right">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Products number</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_of_product }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gifts fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center text-right">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users Number</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_of_users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center text-left">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Codes Number</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $number_of_codes }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-code fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     


@endsection








































<div class="row">
    <!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <a href="{{route('products.index')}}">
                <div class="row no-gutters align-items-center text-right">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">المنشورات</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-th-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>


