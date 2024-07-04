<?php

namespace App\Http\Controllers;

//require '../../../vendor/autoload.php';


//require_once('../../../../vendor/gasparesganga/php-shapefile/src/Shapefile/ShapefileAutoloader.php');
//Shapefile\ShapefileAutoloader::register();

use Shapefile\Shapefile;
use Shapefile\ShapefileException;
use Shapefile\ShapefileReader;




class ShapefileController extends Controller
{

    public function index(){
        try {
            // Open Shapefile
            $publicPath = public_path();
            $shapefilePath = $publicPath . '/shapefiles/Inund_act.shp';

            $Shapefile = new ShapefileReader($shapefilePath);
            $step="archivos leidos";
            echo $step;

            //dd($Shapefile);
            try{
                $Geometry = $Shapefile->fetchRecord();

            }
            catch(ShapefileException $e){
                $step="dentro del catch 1:".$e;
                dd($step);
            }
            dd($Geometry);
            
            // Read all the records
            while ($Geometry = $Shapefile->fetchRecord()) {
                $step="dentro del while";
                
                // Skip the record if marked as "deleted"
                if ($Geometry->isDeleted()) {
                    continue;
                }
                
                 // Print Geometry as an Array
                print_r($Geometry->getArray());
                
                // Print Geometry as WKT
                print_r($Geometry->getWKT());
                
                // Print Geometry as GeoJSON
                print_r($Geometry->getGeoJSON());
                
                // Print DBF data
                print_r($Geometry->getDataArray());
            }
        
        } catch (ShapefileException $e) {
            $step="dentro del catch";
            dd($step);
            // Print detailed error information
            echo "Error Type: " . $e->getErrorType()
                . "\nMessage: " . $e->getMessage()
                . "\nDetails: " . $e->getDetails();
        }
        $step="antes de la vista";
        
        return view('place.shape');

    }

    public function riesgo(){

        return view('place.riesgo');
    }

}