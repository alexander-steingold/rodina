<?php

use App\Models\Barcode;
use App\Models\Container;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('container_barcodes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Container::class)->nullable()->constrained()->cascadeOnDelete();;
            $table->foreignIdFor(Barcode::class)->nullable()->constrained()->cascadeOnDelete();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('container_barcodes');
    }
};
