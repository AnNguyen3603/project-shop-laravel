<?php
namespace App\Http\Services\Product;
use App\Models\Menu;
class ProductAdminService{
    public function getMenu(){
        return Menu::where('active', 1)->get();
    }
   
    protected function isValidPrice($request){
        if($request->input('price') != 0 && $request->input('price_sale') != 0 && $request->input('price_sale') >= $request->input('price')){
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if($request->input('price_sale') != 0 && (int)$request->input('price') == 0 ){
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
        return true;

    }
    public function insert($request){
        $isValidPrice = $this->isValidPrice($request);

    }
}


?>