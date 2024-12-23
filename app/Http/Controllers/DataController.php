<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataController extends Controller
{
    public function pieChart()
    {
        // Directly pass the raw SQL query as a string
        $query = "
            SELECT r.region, COUNT(DISTINCT s.cust_id) AS customer_count
            FROM ship s
            JOIN region r ON s.region_id = r.region_id
            GROUP BY r.region 
            ORDER BY customer_count DESC;
        ";

        // Fetch data from the database using the raw query string
        $result = DB::select($query);

        // Prepare the data for the chart
        $data = "";
        foreach ($result as $val) {
            $data .= "['" . $val->region . "', " . $val->customer_count . "],";
        }
        
        $dataChart = rtrim($data, ',');  // Remove trailing comma

        return view('dashboard', compact('dataChart'));
    }
    
}