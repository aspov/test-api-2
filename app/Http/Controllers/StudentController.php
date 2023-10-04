<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(['success' => true, 'data' => new StudentResource(Student::all())]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): JsonResponse
    {
        $student = Student::create($request->all());

        return response()->json(['success' => true, 'data' => new StudentResource($student)]);
    }

    /**
     * Display the specified resource.
     * show
     */
    public function show(Student $student): JsonResponse
    {
        return response()->json(['success' => true, 'data' => new StudentResource($student->load(['classrooms']))]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student): JsonResponse
    {
        $student->name = $request->name;
        if ($request->classroom_id) {
            $student->classroom_id = $request->classroom_id;
        }
        $student->save();

        return response()->json(['success' => true, 'data' => new StudentResource($student)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): JsonResponse
    {
        $student->delete();

        return response()->json(['success' => true]);
    }
}
