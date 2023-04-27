<div>
    <style>
        .text-danger {
            color: #dc3545 !important;
        }
    </style>
    <div class="row">
        <div class="col-12">
            @if (session()->has('message'))
            <div class="alert alert-success text-center">{{ session('message') }}</div>
            @endif
        </div>
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                    @if(inter_routeName() != 'user.dashboard')
                                    <th width="280px">Action</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($products as $product)
                                <tr>
                                    <td>{{$product->barcode}}</td>
                                    <td><img class="tbl-thumb" src="{{asset($product->image)}}" alt="Product Image" />
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{env('CURRENCY').$product->price}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td>{{ __('YOU')}}</td>
                                    
                                    @if(inter_routeName() != 'user.dashboard')
                                    <td>
                                        <div class="btn-group mb-1">
                                            <button class="btn btn-sm btn btn-outline-success" wire:click="viewProductDetails({{ $product->id }})">Info</button>
                                            <button class="btn btn-sm btn btn-outline-primary " wire:click="editProducts({{ $product->id }})">Edit</button>
                                            <button class="btn btn-sm btn btn-outline-danger" wire:click="deleteConfirmation({{ $product->id }})">Delete</button>
                                            <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                <span class="sr-only">Info</span>
                                            </button>


                                        </div>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="storeProductData">
                        <div class="form-group row">
                            <label for="name" class="col-3">Product Name</label>
                            <div class="col-9">
                                <input type="text" id="name" class="form-control" wire:model="name"> @error('name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-3">Image</label>
                            <div class="col-9">

                                <input type="file" id="image" class="form-control" wire:model="image"> @error('image')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-3">Product Price</label>
                            <div class="col-9">
                                <input type="number" id="price" class="form-control" wire:model="price"> @error('price')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="description">Product Description</label>

                            <textarea name="description" class="form-control" id="description" wire:model="description"></textarea> @error('description')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> @enderror

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteProductModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Product data!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteProductData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="viewProductModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product Information</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Image: </th>
                                <td><img class="tbl-thumb" src="{{asset($view_image)}}" alt="Product Image" /></td>
                            </tr>

                            <tr>
                                <th>Name: </th>
                                <td>{{ $view_name }}</td>
                            </tr>

                            <tr>
                                <th>Price: </th>
                                <td>{{ $view_price }}</td>
                            </tr>

                            <tr>
                                <th>Description: </th>
                                <td>{{ $view_description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editProductModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="editProductData">
                        <div class="form-group row">
                            <label for="name" class="col-3">Product Name</label>
                            <div class="col-9">
                                <input type="text" id="name" class="form-control" wire:model="edit_name"> @error('edit_name')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-3">Image</label>
                            <div class="col-9">
                                <tr>
                                    <td><img class="tbl-thumb" src="{{asset($edit_image)}}" alt="Product Image" /></td>
                                </tr>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-3">Product Price</label>
                            <div class="col-9">
                                <input type="number" id="price" class="form-control" wire:model="edit_price"> @error('edit_price')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="description">Product Description</label>

                            <textarea name="description" class="form-control" id="description" wire:model="edit_description"></textarea> @error('edit_description')
                            <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span> @enderror

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Edit Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>