<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePhoneInCountryView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW phone_in_country_view AS
            SELECT
                SUBSTR(phone, 7) AS phone, CONCAT('+', SUBSTR(phone, 2, 3)) AS code,
                CASE
                    WHEN SUBSTR(phone, 2, 3) = '237' THEN 'Cameroon'
                    WHEN SUBSTR(phone, 2, 3) = '251' THEN 'Ethiopia'
                    WHEN SUBSTR(phone, 2, 3) = '212' THEN 'Morocco'
                    WHEN SUBSTR(phone, 2, 3) = '258' THEN 'Mozambique'
                    WHEN SUBSTR(phone, 2, 3) = '256' THEN 'Uganda'
                    else 'unknown'
                END AS country,
                CASE
                    WHEN SUBSTR(phone, 2, 3) = '237' AND phone REGEXP '^\\\\(237\\\\) ?[2368][0-9]{7,8}$' THEN 'OK'
                    WHEN SUBSTR(phone, 2, 3) = '251' AND phone REGEXP '^\\\\(251\\\\) ?[1-59][0-9]{8}$'   THEN 'OK'
                    WHEN SUBSTR(phone, 2, 3) = '212' AND phone REGEXP '^\\\\(212\\\\) ?[5-9][0-9]{8}$'    THEN 'OK'
                    WHEN SUBSTR(phone, 2, 3) = '258' AND phone REGEXP '^\\\\(258\\\\) ?[28][0-9]{7,8}$'   THEN 'OK'
                    WHEN SUBSTR(phone, 2, 3) = '256' AND phone REGEXP '^\\\\(256\\\\) ?[0-9]{9}$'         THEN 'OK'
                    else 'NOK'
                END AS status,
                phone AS cust_phone
            FROM customer
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS phone_in_country_view');
    }
}
