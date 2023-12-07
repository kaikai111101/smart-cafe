<?php 

namespace App\Services;
use App\Models\Sale;
use Carbon\Carbon;
class SaleService{
    public static function createSale(array $data){
        Sale::create($data);
    }

    public static function updateSale($id, array $data){
        Sale::where('id', $id)->update($data);
    }

    public static function deleteSale($id){
        Sale::where('id', $id)->delete();
    }

    public static function getSale($id){
        $sale = Sale::where('id', $id)->first();
        return $sale;
    }
    public static function getSalesForLastNMonth($nMonth){
        $data = [];
        $now = Carbon::now();
        for ($i = 0; $i < $nMonth; $i++) {
            $fromDate = $now->startOfMonth()->copy();
            $tillDate = $now->endOfMonth()->copy();
            $d = Sale::whereBetween('sale_date', [$fromDate->toDateString(), $tillDate->toDateString()])->get();
            $count = 0;
            $total_price = 0;
            $count_menu = 0;
            foreach ($d as $dd) {  
                $items = $dd->menus;
                foreach( $items as $item ) {
                    $total_price += $item-> price * $item->pivot->quantity;
                    $count_menu += $item->pivot->quantity;
                }
                $count += 1;
            }
            $data[$fromDate->format('Ym')] = ["sales_count" => $count,"sales_total"=> $total_price, "total_items" => $count_menu];
            $now = $now->addMonthsNoOverflow(-1);
        }
        return $data;
    }
    public static function getSalesForLastNYear($nYear){
        $data = [];
        $now = Carbon::now();
        for ($i = 0; $i < $nYear; $i++) {
            $fromDate = $now->startOfYear()->copy();
            $tillDate = $now->endOfYear()->copy();
            $d = Sale::whereBetween('sale_date', [$fromDate->toDateString(), $tillDate->toDateString()])->get();
            $count = 0;
            $total_price = 0;
            $count_menu = 0;
            foreach ($d as $dd) {  
                $items = $dd->menus;
                foreach( $items as $item ) {
                    $total_price += $item-> price * $item->pivot->quantity;
                    $count_menu += $item->pivot->quantity;
                }
                $count += 1;
            }
            $data[$fromDate->format('Y')] = ["sales_count" => $count,"sales_total"=> $total_price, "total_items" => $count_menu];
            $now = $now->addYearsNoOverflow(-1);
        }
        return $data;

    }

    public static function getSalesOfTheYear($year){

        $year = (int)$year;
        if ($year < 1000|| $year > 9999){
            return response()->json(["message" => "invalid year."], 400);
        }
        $startDate = Carbon::createFromDate($year, 1, 1);
        $endDate = Carbon::createFromDate($year,12, 31);
        $sales = Sale::whereBetween("sale_date", [$startDate, $endDate])->get();
        return $sales->toArray();
    }
}
