<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 'price', 'description', 'image_url'
    ];
    function image_url()
    {
        if ($this->image_url && file_exists(public_path('images/image/' . $this->image_url)))
            return asset('images/image/' . $this->image_url);
        else
            return asset('images/no_image.png');
    }

    function delete_image_url()
    {
        if ($this->image_url && file_exists(public_path('images/image/' . $this->image_url())))
            return unlink(public_path('images/image/' . $this->image_url));
    }

    public function productReviews()
    {
        return $this->hasMany('App/ProductReviews', 'product_id');
    }

    public function orderProducts($order_by) {
        $query = 'SELECT * FROM products ORDER BY created_at ASC';
        if ($order_by == 'best_seller') {
            $query = "SELECT p.*, oi.quantity FROM products AS p
                      LEFT JOIN (
                        SELECT product_id, SUM(quantity) as quantity from order_items
                            GROUP BY product_id
                        ) AS oi ON oi.product_id = p.id
                        ORDER BY oi.quantity DESC;";
        } else if ($order_by == 'terbaik') {
            $query = "SELECT * FROM products ORDER BY created_at DESC";
        } else if ($order_by == 'termurah') {
            $query = "SELECT * FROM products ORDER BY price ASC";
        } else if ($order_by == 'termahal') {
            $query = "SELECT * FROM products ORDER BY price DESC";
        } else if ($order_by == 'terbaru') {
            $query = "SELECT * FROM products ORDER BY created_at DESC";
        }

        return DB::select($query);
    }
}
