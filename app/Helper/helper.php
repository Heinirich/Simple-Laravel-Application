<?php
    use App\Models\Product;
    use App\Models\User;

    function inter_routeName(){
        $name = Route::currentRouteName();
        return $name;
    }
    function inter_products($type="all",$id=0){
        switch($type){
            case "all":
                $data = Product::all();
                return $data;
                break;
            case "user":
                $data = Product::where('user_id',$id)->get();
                return $data;
                break;
            default:
                $data = Product::where('id',$id)->get();
                return $data;
                break;
                
        }
    }

    function inter_users($type="all",$id=0){
        switch($type){
            case "all":
                $data = User::all();
                return $data;
                break;
            case "registered_today":
                $data = User::whereDay('created_at', now()->day)->get();
                return $data;
                break;

            default:
                $data = User::where('id',$id)->get();
                return $data;
                break;
                
        }
    }

    function inter_generateBarcode() {
        return mt_rand(1000000000, 9999999999);      
    }
?>