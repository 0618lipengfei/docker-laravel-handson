<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeWeatherModel extends Model
{
    use HasFactory;

    protected $table = 'types_weather';

    // // Table's primary key
    // protected $primaryKey = 'type_id';
    
    // // Array of database columns which should be read and sent back to DataTables.
    // // The `db` parameter represents the column name in the database, while the `dt`
    // // parameter represents the DataTables column identifier. In this case object
    // // parameter names
    // protected $columns = array(
    //     array( 'db' => 'type_id', 'dt' => 'type_id' ),
    //     array( 'db' => 'name', 'dt' => 'name' ),
    //     array( 'db' => 'value_unit',  'dt' => 'value_unit' ),
    //     array( 'db' => 'time_interval',   'dt' => 'time_interval' )
    // );
    
    // // SQL server connection information
    // protected $sql_details = array(
    //     'user' => 'root',
    //     'pass' => 'secret',
    //     'db'   => 'shimizuGUI',
    //     'host' => 'localhost'
    // );
    
    
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    * If you just want to use the basic configuration for DataTables with PHP
    * server-side, there is no need to edit below this line.
    */
    
    // require( 'ssp.class.php' );
    
    // echo json_encode(
    //     SSP::simple( $_GET, $table, $primaryKey, $columns, $sql_details )
    // );
}
