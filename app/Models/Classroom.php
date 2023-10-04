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
 * Class Classroom
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Lecture[] $lectures
 * @property Collection|Student[] $students
 */
class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classrooms';

    protected $fillable = [
        'name',
    ];

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class, 'lecture_classroom')
            ->withPivot('id')
            ->withTimestamps();
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
