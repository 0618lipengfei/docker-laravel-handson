<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesPreprocessModel extends Model
{
    use HasFactory;

    Protected $table = 'types_preprocess';

    // Table's primary key
    Protected $primaryKey = 'preprocess_type_id';
    
    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case object
    // parameter names
    Protected $columns = array(
        array( 'db' => 'preprocess_type_id', 'dt' => 'preprocess_type_id' ),
        array( 'db' => 'name', 'dt' => 'name' ),
        array( 'db' => 'formula',  'dt' => 'formula' ),
        array( 'db' => 'description',   'dt' => 'description' )
    );
    
    // SQL server connection information
    Protected $sql_details = array(
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
