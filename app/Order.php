<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function getTotalPrice() {
        $sum = 0;
        foreach ($this->products as $product) {
           $sum += $product->price;
        }

        return $sum;
    }

    public function confirmOrder($name, $phone) {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            if (empty($this->user_id)) {
                $this->user_id =  Auth::id();
            }
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }
}
