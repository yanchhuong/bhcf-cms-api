<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->nullable();
                $table->unsignedInteger('invited_by')->nullable();
                $table->char('first_name', 120);
                $table->char('last_name', 120);
                $table->char('middle_name', 120)->nullable();
                $table->date('birthdate')->nullable();
                $table->enum('civil_status', ['Married', 'Widowed', 'Separated', 'Divorced', 'Single'])->nullable();
                $table->char('address', 255)->nullable();
                $table->char('city', 120)->nullable();
                $table->char('contact_no', 30)->nullable();
                $table->char('secondary_contact_no', 30)->nullable();
                $table->char('facebook_name', 120)->nullable();
                $table->char('avatar', 255)->nullable();
                $table->unsignedInteger('school_status_id')->nullable();
                $table->unsignedInteger('leadership_level_id')->nullable();
                $table->unsignedInteger('auxiliary_group_id')->nullable();
                $table->enum('status', ['Active', 'Inactive'])->default('Active');
                $table->mediumText('remarks')->nullable();
                $table->unsignedInteger('created_by');
                $table->timestamps();
                $table->softDeletes();
                $table->nestedSet();
    
                $table->foreign('invited_by')
                    ->references('id')->on('members');
                
                $table->foreign('created_by')
                    ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
