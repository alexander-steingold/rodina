<?php

use App\Models\Customer;
use App\Models\Order;
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
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('status',
                [
                    'call',
                    'supply',
                    'pickup',
                    'arrived',
                    'absorbed',
                    'waiting',
                    'packaged',
                    'taxes',
                    'transfer',
                    'taxes_destination',
                    'arrived_destination',
                    'delivered',
                ]
            )->default('call');
            $table->foreignIdFor(Order::class)->nullable()->constrained();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_statuses');
    }
};
