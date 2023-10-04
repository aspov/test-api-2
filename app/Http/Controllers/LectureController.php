<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use Illuminate\Http\JsonResponse;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => new LectureResource(Lecture::all())]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLectureRequest $request): JsonResponse
    {
        $lecture = Lecture::create($request->all());

        return response()->json(['success' => true, 'data' => new LectureResource($lecture)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture): JsonResponse
    {
        $lecture->students = $lecture->getLectureStudents();

        return response()->json(['success' => true, 'data' => new LectureResource($lecture->load(['classrooms']))]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLectureRequest $request, Lecture $lecture): JsonResponse
    {
        $lecture->update($request->all());

        return response()->json(['success' => true, 'data' => new LectureResource($lecture)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture): JsonResponse
    {
        $lecture->delete();

        return response()->json(['success' => true]);
    }
}
