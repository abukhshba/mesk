<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Properties & Benefits (bilingual rich text)
            $table->text('properties_ar')->nullable()->after('description_en');
            $table->text('properties_en')->nullable()->after('properties_ar');

            // Application rates type: 'text' for simple paragraph, 'table' for structured rows
            $table->string('application_rates_type')->default('text')->after('properties_en');

            // Text-based directions (simple paragraph format)
            $table->text('application_rates_text_ar')->nullable()->after('application_rates_type');
            $table->text('application_rates_text_en')->nullable()->after('application_rates_text_ar');

            // Table-based directions (structured JSON rows)
            // Each row: { crop_ar, crop_en, rate_ar, rate_en, notes_ar?, notes_en? }
            $table->json('application_rates_rows')->nullable()->after('application_rates_text_en');

            // Whether to show the "Notes" column in the table
            $table->boolean('application_rates_has_notes')->default(false)->after('application_rates_rows');

            // Footer note shown below the table (e.g. "For foliar spray: 2-3 kg...")
            $table->text('application_rates_footer_ar')->nullable()->after('application_rates_has_notes');
            $table->text('application_rates_footer_en')->nullable()->after('application_rates_footer_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'properties_ar',
                'properties_en',
                'application_rates_type',
                'application_rates_text_ar',
                'application_rates_text_en',
                'application_rates_rows',
                'application_rates_has_notes',
                'application_rates_footer_ar',
                'application_rates_footer_en',
            ]);
        });
    }
};
