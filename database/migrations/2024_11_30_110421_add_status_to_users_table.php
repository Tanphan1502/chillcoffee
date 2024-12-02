<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToUsersTable extends Migration
{
public function up()
{
Schema::table('users', function (Blueprint $table) {
$table->string('status')->default('active'); // Thêm cột status với giá trị mặc định
});
}

public function down()
{
Schema::table('users', function (Blueprint $table) {
$table->dropColumn('status'); // Xóa cột khi rollback
});
}
}