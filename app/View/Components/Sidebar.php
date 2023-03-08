<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Category;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $show;
    
    
    public function __construct($show)
    {

        $this->show = $show;
       
  
    }

    public function custom_function(){

        $data = ['categoryArr' => Category::all()];
        // dd($data);
        return $data;
    }
 
    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
