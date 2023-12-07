<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Menu extends Model
{
    use HasFactory;

    protected $table = "menus";
    protected $fillable = ["name","price","customer_name", "quantity"] ;
}