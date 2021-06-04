<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesTargetsModel extends Model
{
    use HasFactory;

    protected $table = 'types_targets';

    // Table's primary key
    protected $primaryKey = 'target_type_id';
    
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case object
    // parameter names
    protected $columns = array(
        array( 'db' => 'target_type_id', 'dt' => 0 ),
        array( 'db' => 'name', 'dt' => 1 ),
        array( 'db' => 'value_unit',  'dt' => 2 ),
        array( 'db' => 'time_interval',   'dt' => 3 )
    );
    
    // SQL server connection information
    protected $sql_details = array(
        'user' => 'root',
        'pass' => 'secret',
        'db'   => 'shimizuGUI',
        'host' => 'localhost'
    );
    
    
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    * If you just want to use the basic configuration for DataTables with PHP
    * server-side, there is no need to edit below this line.
    */
    
    // require( 'ssp.class.php' );
    
    // echo json_encode(
    //     SSP::simple( $_GET, $table, $primaryKey, $columns, $sql_details )
    // );
}
