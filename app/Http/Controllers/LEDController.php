<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LEDController extends Controller
{
    public function index()
    {
        $file = fopen('buttonStatus.txt', 'r');
        $status = trim(fgets($file, 1024));
        $animation = trim(fgets($file, 1024));

        return view('led', [
            'status' => $status,
            'animation' => $animation
        ]);
    }

    public function store()
    {
        // Update txt
        $file = "buttonStatus.txt";
        $handle = fopen($file,'w+');
        if (isset($_POST['upload'])) { // Update image
            $tempName = '';
            if(isset($_FILES['image']['tmp_name'])) {
                $tempName = $_FILES['image']['tmp_name'];
            }

            $newName  = '';
            $newName .= 'image.png';
            if($tempName && file_exists($tempName)) {
                rename($tempName, $newName);
            }
            chmod($newName, 0777);
        } elseif (isset($_POST['on'])) {
            $onstring = "ON";
            $animation = $_POST['animation'];
            fwrite($handle,$onstring.PHP_EOL);
            fwrite($handle,$animation);
            fclose($handle);
        } elseif(isset($_POST['off'])) {
            $offstring = "OFF";
            fwrite($handle, $offstring);
            fclose($handle);
        }

        return redirect('/');
    }
    
    public function status()
    {
		$file = "buttonStatus.txt";
        $handle = fopen($file,'r');
        $status = fgets($handle);
        return $status;
	}
}
