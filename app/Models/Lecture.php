<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lecture
 *
 * @property int $id
 * @property string $topic
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Classroom[] $classrooms
 */
class Lecture extends Model
{
    use HasFactory;

    protected $table = 'lectures';

    protected $fillable = [
        'topic',
        'description',
    ];

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'lecture_classroom');
    }

    /**
     * getLectureStudents
     */
    public function getLectureStudents(): Student
    {
        return Student::whereIn('classroom_id', $this->classrooms->map->id->all())->get();
    }
}
