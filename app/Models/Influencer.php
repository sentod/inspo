<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    use HasFactory;
    protected $table = 'influencers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category', 'rating', 'followers', 'pictures'];
}

// database/migrations/xxxx_xx_xx_create_influencers_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('influencers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->integer('rating');
            $table->string('followers');
            $table->integer('pictures');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('influencers');
    }
};
