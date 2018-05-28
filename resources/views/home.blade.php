@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                  <a class="btn btn-success"  href="{{url('manager/post/create')}}"> ลงขายสินค้า</a>
                  <a class="btn btn-success"  href="{{url('manager/post/')}}"> ดูรายการสินค้า</a>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}


                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
