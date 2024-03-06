<?php

namespace App\Http\Controllers;
use App\Models\Polygon;
use Illuminate\Http\Request;
use App\Models\DrawnItem;
class DrawnItemController extends Controller
{
    public function index()
    {
        // Retrieve the drawn shapes from your database
        $drawnItems = DrawnItem::all(); // Adjust this query based on your database structure
    
        // Return the drawn shapes as JSON
        return response()->json($drawnItems);
    }
    public function store(Request $request)
{
    try {
        // Get the drawn item data from the request
        $data = $request->all();

        // Create a new DrawnItem instance and fill it with the data
        $drawnItem = new DrawnItem();
        $drawnItem->type = $data['type'];
        $drawnItem->color = $data['color'];
        $drawnItem->coordinates = $data['coordinates'];

        // Save the drawn item to the second database
        $drawnItem->save();

        return response()->json(['message' => 'Drawn item saved successfully']);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error saving drawn item: ' . $e->getMessage());

        return response()->json(['error' => 'Failed to save drawn item'], 500);
    }
}

    public function save(Request $request)
{
    // Validate and save the drawn item to the second database
    $data = $request->all();

    $drawnItem = new DrawnItem();
    $drawnItem->type = $data['type'];
    $drawnItem->color = $data['color'];
    $drawnItem->coordinates = json_encode($data['coordinates']); // If coordinates are stored as JSON

    // Assuming you have set up the second database connection in your model
    $drawnItem->setConnection('second_db');

    $drawnItem->save();

    return response()->json(['message' => 'Drawn item saved successfully']);
}


// Inside your controller


public function savePolygon(Request $request)
{
    $coordinates = json_decode($request->input('coordinates'));

    // You may want to associate the polygon data with a specific user or some identifier
    $user_id = auth()->id(); // Adjust as needed

    Polygon::create([
        'user_id' => $user_id,
        'coordinates' => json_encode($coordinates),
        // Add any other relevant fields
    ]);

    return response()->json(['message' => 'Polygon data saved successfully']);
}
// Inside your controller
public function getPolygon($id)
{
    $polygon = Polygon::find($id);

    if ($polygon) {
        return response()->json($polygon);
    }

    return response()->json(['error' => 'Polygon not found'], 404);
}

}
