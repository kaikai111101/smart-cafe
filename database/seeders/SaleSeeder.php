<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Sale;
use App\Models\Menu;
class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            for ($i = 0; $i < 500; $i++) {
                $sale = Sale::factory()->create();
                $num_menus = random_int(1, 3);
                $total = 0;
                for ($j = 0; $j < $num_menus;  $j++){
                    $menuId = random_int(1, 100);
                    $quantity = random_int(1, 10);
                    DB::table("sale_menu")->insert(["sale_id" => $sale->id, "menu_id" => $menuId, "quantity" => $quantity]);
                    $menu = Menu::where('id', $menuId)->first();
                    $total += $menu->price * $quantity;
                    echo $j;
                    echo "\n";
                }
                $sale->total_price = $total;
                $sale->save();
                echo $i;
                echo "\n";

            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }
}
