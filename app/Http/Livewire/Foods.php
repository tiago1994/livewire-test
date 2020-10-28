<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Foods extends Component
{
    public $count = 0;
    public $search_label = "";
    public $listFull = [];
    public $listFiltered = [];

    public function mount(){
        $this->getList();
    }

    public function getList(){
        $foods = Http::get('https://taco-food-api.herokuapp.com/api/v1/food');
        $this->listFull = $foods->json();
        $this->listFiltered = $this->listFull;
    }
    
    public function search(){
        $field = $this->search_label;
        if($field != ''){
            $new_list = array_filter($this->listFull, function ($l) use ($field) {
                return $l['description'] === $field;
            });
        }else{
            $new_list = $this->listFull;
        }
        $this->listFiltered = $new_list;
    }

    public function render(){
        return view('livewire.foods');
    }
}
