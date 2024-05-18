<?php 

namespace App\Components\Appstack;

class ButtonAdd 
{
    
    public static function render($url="")
    {

        return '<a href="' . $url .'" class="btn btn-primary btn-lg"> 
                                        <i class="align-middle me-2" data-lucide="plus"></i>
                                        <span>Tambah</span>
                                    </a>';
    }
}