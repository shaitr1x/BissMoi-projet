<?php

// namespace App\models;
// use App\Utils\Eloquent;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint as Blueprint;

class User extends Eloquent
{
    protected $table = 'users';
    protected $fillable = ["username", 'email', "password"];
    protected $hidden = [
        'password',
    ];


    // Verify password
    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }
    // Mutator to hash password automatically
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
    }

    public static function attemptLogin($email, $password)
    {
        $user = static::select(["id", "email", "username", "changes_tracker", "password"])->where('email', $email)->first();
        if ($user && $user->verifyPassword($password)) {
            return $user;
        }
        return null;
    }

    public static function createTable(): void
    {
        $table_name = 'users';
        if (Capsule::schema()->hasTable($table_name)) {
            return;
        }
        Capsule::schema()->create($table_name, function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger("changes_tracker")->default(0);
            $table->timestamps();
        });
    }
    public static function tableExists()
    {
        return Capsule::schema()->hasTable('users');
    }
}
