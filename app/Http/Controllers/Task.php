<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class Task extends Controller
{
    public function index()
    {
        // 1.1
        $vendor1_1 = Vendor::with(['products', 'products.images'])->get();
        // 1.2
        $vendor1_2 = Vendor::with(['products' => function($query) {
                return $query->has('images','>', 1);
            }])
            ->get();
        // 2 I didn't understand clear that task
        // 3
        $vendor_and_total = $p = \DB::table('vendor_products')
            ->select('vendor_id')
            ->selectRaw('price * quantity as total')
            ->get();
        // 4
        /*function ($car, $hours) {
            return $car * $hours;
        }*/
        // 5
        $sourceArray = [2,2,2,2,3,2];
        $strArr = implode(',', $sourceArray);
        $unArr = array_unique($sourceArray);
        $min = 10**6;
        foreach ($unArr as $i => $v) {
            preg_match_all('/{$v}/', $strArr, $res);
            $arr[min($min, count($res[0]))] = $v;
        }
        ksort($arr);
        $uniqueNumber = array_shift($arr);

        return view('welcome');
    }
}
