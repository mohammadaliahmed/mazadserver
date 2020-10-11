<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('third_name')->nullable();
            $table->string('sir_name')->nullable();
            $table->boolean('phone_verified')->default(false);
            $table->string('user_type')->nullable();
            $table->string('individual_type')->nullable();
            $table->string('institutional_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_registry_number')->nullable();
            $table->string('registry_date')->nullable();
            $table->string('registry_expiry_date')->nullable();
            $table->string('registry_issuing_area')->nullable();
            $table->string('registry_area')->nullable();
            $table->string('registry_pic_url')->nullable();
            $table->string('residence_permit_pic_url')->nullable();
            $table->string('identity_or_residence')->nullable();
            //
        });
    }

    public function down()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name', 'second_name', 'sir_name', 'phone_verified',
                'user_type', 'individual_type', 'institutional_type', 'company_name',
                'company_registry_number', 'registry_date', 'registry_expiry_date', 'registry_issuing_area',
                'registry_area', 'registry_pic_url', 'identity_of_registry', 'residence_permit_pic_url','identity_of_residence');
        });

    }
}
