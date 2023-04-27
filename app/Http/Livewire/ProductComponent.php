<?php

namespace App\Http\Livewire;

use File;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;

class ProductComponent extends Component
{

    use WithFileUploads;

    public $products;

    public $p_id,$user_id,$name,$description,$image,$price;
    public $view_p_id,$view_user_id,$view_name,$view_description,$view_image,$view_price;
    public $edit_p_id,$edit_user_id,$edit_name,$edit_description,$edit_image,$edit_price;
    public $searchTerm;

    public function storeProductData()
    {
        //on form submit validation
        $this->validate([
            'name' => 'required', 
            'description' => 'required',
            'image' => 'required',
            'price' => 'required',
        ]);

        $image_name=time().inter_generateBarcode().'-'.$this->image->getClientOriginalName();
        $res=$this->image->storeAs('images',$image_name, 'public');
        $img_path='images/'.$image_name;
       
        //Add Product Data
        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->name = $this->name;
        $product->image = $img_path;
        $product->barcode = inter_generateBarcode();
        $product->price = $this->price;
        $product->description = $this->description;
        $product->save();
        session()->flash('message', 'New product has been added successfully');
        $this->resetform();
       
        $this->dispatchBrowserEvent('close-modal');
    }
    public function editProductData()
    {
        //on form submit validation
        $this->validate([
            'edit_name' => 'required', 
            'edit_description' => 'required',
            // 'image' => 'required',
            'edit_price' => 'required',
        ]);

        $product = Product::where('id', $this->p_id)->first();
        $product->name = $this->edit_name;        
        $product->price = $this->edit_price;
        $product->description = $this->edit_description;

        $product->save();

        session()->flash('message', 'Product has been updated successfully');

        
        $this->dispatchBrowserEvent('close-modal');
    }
    public function deleteProductData(){
        $product = Product::where('id', $this->p_id)->first();
        $productImage = $product->image;

        if (File::exists(public_path($productImage))) {
            File::delete(public_path($productImage));
        }
        $product->delete();
        session()->flash('message', 'Product has been deleted successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->p_id = '';
    }



    public function deleteConfirmation($id)
    {
        $this->p_id = $id;

        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }

    public function viewProductDetails($id)
    {
        $product = Product::where('id', $id)->first();

        $this->view_user_id = $product->user_id;
        $this->view_name = $product->name;
        $this->view_image = $product->image;
        $this->view_price = env('CURRENCY').$product->price;
        $this->view_description = $product->description;

        $this->dispatchBrowserEvent('show-view-product-modal');
    }

    public function editProducts($id)
    {
        $product = Product::where('id', $id)->first();
        $this->p_id = $product->id;
        $this->edit_user_id = $product->user_id;
        $this->edit_name = $product->name;
        $this->edit_image = $product->image;
        $this->edit_price = $product->price;
        $this->edit_description = $product->description;

        $this->dispatchBrowserEvent('show-edit-product-modal');
    }
    public function resetform(){
        $this->user_id = '';
        $this->name = '';
        $this->image = '';
        $this->price = '';
        $this->description = '';
    }

    
    public function render()
    {
        $u_id = auth()->user()->id;
        $products = Product::where('user_id',$u_id)->where('name', 'like', '%'.$this->searchTerm.'%')->get();
        $this->products = $products;
        
       
        return view('livewire.product-component');
    }
}   
