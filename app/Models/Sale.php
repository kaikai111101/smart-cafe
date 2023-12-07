<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Sale extends Model
{
    use HasFactory;
    protected $table = "sales";
    protected $fillable = ["sale_date","code","customer_name", "total_price"];
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(
            Menu::class,
            'sale_menu'
        )->withPivot(["quantity"]);
    }
}