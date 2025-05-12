<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory,Notifiable;
    protected $fillable =[
            'product_name',
            'description',
            'category',
            'price',
            'image',
            'quantity',
    ];


    public function user():BelongsTo
    {

        return $this->belongsTo(User::class);
    }
    public function sales()
    {
        return $this->hasOne(Sale::class);
    }

}
