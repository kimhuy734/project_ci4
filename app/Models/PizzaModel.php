<?php
namespace App\Models;
use CodeIgniter\Model;

class PizzaModel extends Model{
    protected $table = "pizzas";
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['name','ingredients','price'];
    
    public function createPizza($pizzaInfo){
        $this->insert([
            'name' => $pizzaInfo['name'],
            'price' => $pizzaInfo['price'],
            'ingredients' => $pizzaInfo['ingredients'],
        ]);
    }
}
