<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 *
 * @property int $id
 * @property int $classroom_id
 * @property string $name
 * @property string $email
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Classroom $classroom
 */
class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $casts = [
        'classroom_id' => 'int',
    ];

    protected $fillable = [
        'classroom_id',
        'name',
        'email',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
