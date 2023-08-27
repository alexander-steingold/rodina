<?php

use App\Models\Container;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\Event;
use App\Models\Order;
use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trackers', function (Blueprint $table) {
            $table->id();
//            $table->enum('module',
//                [
//                    'customers',
//                    'orders',
//                    'couriers',
//                    'routes',
//                    'events',
//                    'containers',
//                ]
//            );
            $table->enum('action',
                [
                    'create',
                    'edit',
                    'delete',
                ]
            );
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Order::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Customer::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Courier::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Route::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Event::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Container::class)->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trackers');
    }
};
