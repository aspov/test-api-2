<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Http\Resources\ClassroomResource;
use App\Models\Classroom;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => new ClassroomResource(Classroom::all())]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request): JsonResponse
    {
        $classroom = Classroom::create($request->all());

        return response()->json(['success' => true, 'data' => new ClassroomResource($classroom)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom): JsonResponse
    {
        return response()->json(['success' => true, 'data' => new ClassroomResource($classroom->load(['students']))]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom): JsonResponse
    {
        $classroom->update($request->all());

        return response()->json(['success' => true, 'data' => new ClassroomResource($classroom)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom): JsonResponse
    {
        $classroom->delete();

        return response()->json(['success' => true]);
    }

    /**
     * получить учебный план (список лекций) для конкретного класса
     */
    public function getLectures(Classroom $classroom): JsonResponse
    {
        return response()->json(['success' => true, 'data' => $classroom->load('lectures')['lectures']]);
    }

    /**
     *создать/обновить учебный план (очередность и состав лекций) для конкретного класса
     * $id передаются как строка с айди лекций и разделителем ','
     */
    public function updateLectures(Request $request, Classroom $classroom): JsonResponse
    {
        $classroom->lectures()->detach();
        $classroom->lectures()->attach($request->lectures_ids);

        return response()->json(['success' => true, 'data' => new ClassroomResource($classroom->load(['lectures' => function ($query) {
            $query->orderBy('id', 'desc');
        }]))]);
    }
}
