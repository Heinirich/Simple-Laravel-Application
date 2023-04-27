@extends('user.layouts.master') 
@section('content')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
                <h1>{{ $ch['title'] }}</h1>
                <p class="breadcrumbs"><span><a href="{{route('user.dashboard')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Product
                </p>
            </div>
            <div>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal"> Add {{ $ch['title'] }}</a>
            </div>
        </div>
        @livewire('product-component',['ch'=>$ch])
    </div>	
    <!-- End Content Wrapper -->
</div>
<!-- End Content -->
@endsection 

@push('scripts')
    <script>
        window.addEventListener('close-modal', event =>{
            $('#addProductModal').modal('hide');
            $('#deleteProductModal').modal('hide');
            $('#editProductModal').modal('hide');
        });

        window.addEventListener('show-edit-product-modal', event =>{
            $('#editProductModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteProductModal').modal('show');
        });
       
        window.addEventListener('show-view-product-modal', event =>{
            $('#viewProductModal').modal('show');
        });
    </script>
	@endpush