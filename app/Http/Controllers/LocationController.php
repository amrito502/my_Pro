<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\District;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
class LocationController extends Controller
{

    public function productShowByLocation(Request $request)
    {
        $districts = District::all();
        return view('customer.compoents.list_product.distruct', compact('districts'));
    }

    public function productShowByLocation_details($id)
    {
        $products = Product::where('district_id', $id)->get();
        return view('customer.compoents.list_product.distruct_details', compact('products'));
    }



    // =========================================//
    // ===========nearByProduct=================//
    public function showNearbyProducts(Request $request)
    {
        $locationController = new LocationController();
        $userLocation = $locationController->getLocation($request);

        $products = Product::all();
        $nearbyProducts = [];
        foreach ($products as $product) {
            $distance = $this->calculateDistance(
                $userLocation['latitude'],
                $userLocation['longitude'],
                $product->latitude,
                $product->longitude
            );

            if ($distance <= 10) {
                $nearbyProducts[] = $product;
            }
        }

        return view('app.customer.components.list_product.nearby_products', compact('nearbyProducts'));
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; 

        $latFrom = deg2rad($lat1);
        $lonFrom = deg2rad($lon1);
        $latTo = deg2rad($lat2);
        $lonTo = deg2rad($lon2);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(
            pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2) 
        ));

        return $angle * $earthRadius;
    }



    public function showSearchForm()
    {
        return view('app.customer.components.list_product.search_distance_products');
    }



    public function search(Request $request)
    {
        $userLocation = $this->getLocation($request);
        $userLat = $userLocation['latitude'];
        $userLon = $userLocation['longitude'];

        $distance = $request->input('distance');

        $products = Product::all();

        $nearbyProducts = [];
        foreach ($products as $product) {
            $productDistance = $this->calculateDistance(
                $userLat,
                $userLon,
                $product->latitude,
                $product->longitude
            );

            if ($productDistance <= $distance) {
                $nearbyProducts[] = $product;
            }
        }

        return view('app.customer.components.list_product.search_distance_products', [
            'nearbyProducts' => $nearbyProducts,
            'distance' => $distance,
        ]);
    }



    private function getLocation(Request $request)
    {
        $ipAddress = $request->ip();

        if ($ipAddress === '127.0.0.1') {
            return [
                'latitude' => '23.8103', 
                'longitude' => '90.4125', 
            ];
        }


        $response = Http::get("http://ip-api.com/json/{$ipAddress}");
        $locationData = $response->json();

        Log::info('Location Data:', $locationData);

        if (isset($locationData['lat']) && isset($locationData['lon'])) {
            return [
                'latitude' => $locationData['lat'],
                'longitude' => $locationData['lon'],
            ];
        } else {
            return [
                'latitude' => '23.8103', 
                'longitude' => '90.4125', 
            ];
        }
    }


}
