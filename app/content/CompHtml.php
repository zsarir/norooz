<?php

namespace app\content;

use app\database\Select;
use app\database\Database;
use app\App;

class CompHtml
{
    public $select;
    public function __construct()
    {
        $this->select = new Select;
    }

    // Inputs
    public function inputSingle($name, $label, $placeholder = '', $type = 'text', $value = '')
    {
        return '<div class="bd-input-simple">
                    <label class="bd-input-simple_label" for="' . $name . '">' . $label . '</label>
                    <input type="' . $type . '" name="' . $name . '" class="bd-input-simple_input" value="' . $value . '" placeholder="' . $placeholder . '">
                </div>';
    }

    public function categorySelectDD()
    {
        $categories = $this->select->ListingsCat();
        $options = '';
        foreach ($categories as $category => $value) {
            $options .= '<option name ="category" value="' . $value . '">' . $value . '</option>';
        }
        $result = '<div class="bd-input-simple">' .
            '<label class="bd-input-simple_label" for="category">Category</label>' .
            '<select name="category" class="bd-input-simple_input">' .
            $options .
            '</select>' .
            '</div>';

        return $result;
    }

    public function backBtn($url = '/')
    {
        return '<div class="bd-back-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="none" viewBox="0 0 24 25">
                        <path stroke="#569AF6" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12.5H5m7 7-7-7 7-7" />
                    </svg>
                   <a href="' . $url . '">back</a>
                </div>';
    }
    public function gap($value)
    {
        return '<div class="bd-gap-' . $value . '"></div>';
    }

    public function progress_bar(int $item)
    {
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 25 25">
                <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m20.447 6.226-11 11-5-5" />
                </svg>';
        $process_text = [
            'Plan Selection',
            'Listing information',
            'Listing images',
            'Listing attachments'
        ];
        $bar = '';
        switch ($item) {
            case 1:
                $bar =       '<div class="bd-progressline_circle bd-progressline_circle_active">1</div>
                            <div class="bd-progressline_circle "> 2 </div>
                            <div class="bd-progressline_circle ">3</div>
                            <div class="bd-progressline_circle ">4</div>';
                break;
            case 2:
                $bar =      '<div class="bd-progressline_circle bd-progressline_circle_active">' .
                    $icon . '</div>
                            <div class="bd-progressline_circle bd-progressline_circle_active"> 2 </div>
                            <div class="bd-progressline_circle ">3</div>
                            <div class="bd-progressline_circle ">4</div>';
                break;
            case 3:
                $bar =      '<div class="bd-progressline_circle bd-progressline_circle_active">' .
                    $icon . '</div>
                            <div class="bd-progressline_circle bd-progressline_circle_active"> ' .
                    $icon . '</div>
                            <div class="bd-progressline_circle bd-progressline_circle_active">3</div>
                            <div class="bd-progressline_circle ">4</div>';
                break;
            case 4:
                $bar =      '<div class="bd-progressline_circle bd-progressline_circle_active">' .
                    $icon . '</div>
                            <div class="bd-progressline_circle bd-progressline_circle_active"> ' .
                    $icon . '</div>
                            <div class="bd-progressline_circle bd-progressline_circle_active"> ' .
                    $icon . '</div>
                            <div class="bd-progressline_circle bd-progressline_circle_active">4</div>';
                break;
        }
        $progressBar = '<div class="bd-progressline">' .
            $bar .
            '</div>' .
            '<div class="bd-progressText">' .
            '<div>Plan <br>Selection</div>' .
            '<div> Listing <br>information </div>' .
            '<div> Listing <br>images </div>' .
            '<div> Listing <br>attachments </div>' .
            '</div>';

        return $progressBar;
    }



    public function btn_back_next($backID, $nextID)
    {
        return '<div class="bd-grid-2">
                    <button type="button" id="' . $backID . '" class="btn-tertiary  bd-grid-justifyself-end  bd-widht-60p  ">
                        Back
                    </button>
                    <button type="button" id="' . $nextID . '"class="btn-primary  bd-widht-60p ">
                        Next
                    </button>
                 </div>';
    }
}
