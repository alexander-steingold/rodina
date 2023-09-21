<?php


use App\Models\Country;
use App\Models\Customer;
use App\Models\Route;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('oid');
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('mobile', 50);
            $table->tinyInteger('weight_kg')->nullable();
            $table->integer('weight_gr')->nullable();
            $table->float('box_price')->nullable();
            $table->float('payment')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->float('total_payment')->nullable();
            $table->text('content')->nullable();
            $table->text('remarks')->nullable();
            $table->string('barcode', 30)->nullable();
            $table->foreignIdFor(Country::class)->nullable()->constrained();
            $table->foreignIdFor(Customer::class)->nullable()->constrained();
            $table->foreignIdFor(Route::class)->nullable()->constrained();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
