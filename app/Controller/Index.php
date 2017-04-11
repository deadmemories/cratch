<?php

namespace App\Controller;

use Cratch\Storage\Files;

class Index
{
    public function show ()
    {
<<<<<<< HEAD
=======
        echo '
            <form action="upload" method="post" enctype="multipart/form-data">
                <input type="file" name="file">
                <input type="submit" value="upload">
            </form>
        ';
    }

    public function upload ()
    {
        $file = new Files();
        $file->upload('log', $_FILES['file']);
>>>>>>> dad42b1056e91b1cb1b88b3cd29769588eb72b45
    }
}