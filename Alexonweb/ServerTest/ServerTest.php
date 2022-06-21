<?php

namespace Alexonweb\ServerTest;

class ServerTest
{

    public function __construct()
    {
        
    }



    private function generateRandomString($length = 10) {

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {

            $randomString .= $characters[rand(0, $charactersLength - 1)];

        }

        return $randomString;

    }


    // 
    private function randomArray()
    {

        $items = rand(50,100);

        for ($i = 0; $i < $items; $i++) {

            $randarr[] = $this->generateRandomString(256);

        }

        return $randarr;

    }


    // $type = 'json' or 'yaml'
    // $number - how many files generate
    // retrun milisecond
    public function createRandomFiles($dir, $type, $number)
    {

        $this->stopwatch();

        for ($i = 0; $i < $number; $i++) {

            $filename = $dir . DIRECTORY_SEPARATOR . $i . '.' . $type;
        
            if ($type == 'json') {

                file_put_contents($filename, json_encode($this->randomArray()));

            } elseif ($type == 'yaml') {

                yaml_emit_file($filename, $this->randomArray());

            }

        }

        echo 'Create ' . $number . ' ' . $type . ' files in ' . $dir . ' directory in ';
        // echo '<strong>';
        printf('%f seconds', $this->stopwatch('stop'));
        // echo '</strong>';

    }


    // Remove all files in dir
    public function removefiles($dir)
    {

        $this->stopwatch('start');

        $files = scandir($dir);
        
        $files = array_diff($files, array('.', '..'));

        $i = 0;

        foreach ($files as $file) {

            $file = $dir . DIRECTORY_SEPARATOR . $file;

            unlink($file);

            $i++;

        }

        echo "Delete $i files in $dir in ";
        printf('%f seconds', $this->stopwatch('stop'));

    }

    public function findinfiles($dir, $type, $string)
    {

        $this->stopwatch('start');

        $files = scandir($dir);

        $files = array_diff($files, array('.', '..'));

        $ifiles = 0;
        
        $iitems = 0;

        foreach ($files as $file) {

            $file = $dir . DIRECTORY_SEPARATOR . $file;

            if ($type == 'json') {

                $data = file_get_contents($file);

                $data = json_decode($data);

            } elseif ($type == 'yaml') {
                
                $data = yaml_parse_file($file);

            }
        
            foreach ($data as $item) {
             
                strpos($item, $string);

                $iitems++;

            }

            $ifiles++;

        }

        echo "Search in $ifiles files and $iitems items in $dir in ";
        printf('%f seconds', $this->stopwatch('stop'));

    }

    private function stopwatch($button = 'start')
    {
        if ($button == 'start') {

            $this->starttime = microtime(true);

        } elseif ($button == 'stop') {

            $endtime = microtime(true);

            return ($endtime - $this->starttime);
            
        }
        
    }


}