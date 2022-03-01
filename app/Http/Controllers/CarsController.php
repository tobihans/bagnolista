<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $limit = $request->input('limit', 15);
        $cars = Car::latest()->simplePaginate(20);

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $brands = Brand::all()->pluck('name', 'id');
        return view('cars.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCarRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCarRequest $request)
    {
        $desc_keys = $request->input('desc_keys');
        $desc_values = $request->input('desc_values');
        $specs = [];
        $count = min(count($desc_keys), count($desc_values));

        for ($i = 0; $i < $count; $i++) {
            if (!$desc_keys[$i] || !$desc_values[$i]) continue;
            $specs[$desc_keys[$i]] = $desc_values[$i];
        }

        $specs_json = json_encode($specs);
        $brand = $request->input('brand');
        $category = $request->input('category');
        $desc = $request->input('description');
        $pricing = $request->input('pricing');
        $model = $request->input('model');
        $photos = null;

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('images', 'public');
            if (is_null($photos)) {
                $photos = $path;
                continue;
            }
            $photos = "$photos\n$path";
        }

        $car  = Car::create([
            'model' => $model,
            'brand_id' => $brand,
            'category_id' => $category,
            'pricing' =>$pricing,
            'specs' => $specs_json,
            'description' => $desc,
            'photos' => $photos,
            'is_available' => true,
        ]);

        return response()->redirectTo('/cars/' . $car->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return Application|Factory|View
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Car $car
     * @return Application|Factory|View
     */
    public function edit(Car $car)
    {
        $categories = Category::all()->pluck('name', 'id');
        $brands = Brand::all()->pluck('name', 'id');
        return view('cars.edit', compact('brands', 'car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCarRequest $request
     * @param Car $car
     * @return RedirectResponse
     */
    public function update(UpdateCarRequest $request, Car $car)
    {
        $desc_keys = $request->input('desc_keys', []);
        $desc_values = $request->input('desc_values', []);
        $specs = [];
        $count = min(count($desc_keys), count($desc_values));

        for ($i = 0; $i < $count; $i++) {
            if (!$desc_keys[$i] || !$desc_values[$i]) continue;
            $specs[$desc_keys[$i]] = $desc_values[$i];
        }
        $specs_json = null;

        if (count($specs) == 0) $specs_json = $car->specs;
        else $specs_json = json_encode($specs);

        $brand = $request->input('brand', $car->brand_id);
        $category = $request->input('category', $car->category_id);
        $desc = $request->input('description', $car->description);
        $pricing = $request->input('pricing', $car->pricing);
        $model = $request->input('model', $car->model);
        $photos = null;

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('images', 'public');
                if (is_null($photos)) {
                    $photos = $path;
                    continue;
                }
                $photos = "$photos\n$path";
            }
        }
        $photos = $photos ?? $car->photos;

        $car->update([
            'model' => $model,
            'brand_id' => $brand,
            'category_id' => $category,
            'pricing' =>$pricing,
            'specs' => $specs_json,
            'description' => $desc,
            'photos' => $photos,
        ]);

        return response()->redirectTo('/cars/' . $car->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return RedirectResponse
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return \response()->redirectTo('/cars');
    }
}
