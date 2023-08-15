<?php

use App\Models\City;
use App\Models\Country;
use App\Models\Courier;
use App\Models\Customer;
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
            $table->string('barcode', 15)->nullable();
            $table->tinyInteger('weight')->nullable();
            $table->tinyInteger('boxes')->nullable();
            $table->float('prepayment')->nullable()->default(0);
            $table->float('payment')->nullable()->default(0);
            $table->float('total_payment')->nullable()->default(0);
            $table->text('remarks')->nullable();
            // $table->string('status')->default('active');
            // $table->foreignIdFor(City::class)->nullable()->constrained();
            $table->foreignIdFor(Country::class)->nullable()->constrained();
            $table->foreignIdFor(Customer::class)->nullable()->constrained();
            $table->foreignIdFor(Courier::class)->nullable()->constrained();
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
