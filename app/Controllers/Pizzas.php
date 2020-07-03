<?php namespace App\Controllers;
use App\Models\PizzaModel;
class Pizzas extends BaseController
{
	// display Pizza data in table list
	public function index()
	{	
		$pizza = new PizzaModel();
		$data['pizzas'] = $pizza->findAll();
		return view('index',$data);
	}

// add pizza to pizza list
	public function addPizza(){
		$data = [];
		helper(['form']);
		if($this->request->getMethod() == "post"){
			$rules = [
				'name'=>'required',
				'price'=>'required|numeric|max_length[50]|min_length[1]',
				'ingredients'=>'required',
			];
		    if(!$this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to("/dashboard");
			}
			else{
				$pizza = new PizzaModel();
					$name = $this->request->getVar('name');
					$price = $this->request->getVar('price');
					$ingredients = $this->request->getVar('ingredients');
					$pizzaData = array(
						'name'=>$name,
						'price'=>$price,
						'ingredients'=>$ingredients
					);
				$pizza->createPizza($pizzaData);
				return redirect()->to("/dashboard");
			}
	    }	
		return view("index",$data);
	}

	// edit data of pizza
	public function editPizza($id)
	{
		$pizza = new PizzaModel();
		$data['pizza'] = $pizza->find($id);
		return view('index',$data);
	}

		// update data of pizza
		public function updatePizza(){
			$data = [];
			helper(['form']);
			if($this->request->getMethod() == "post"){
				$rules = [
					'name'=>'required',
					'price'=>'required|min_length[1]|max_length[50]',
					'ingredients'=>'required',
				];
				 if($this->validate($rules)){
					$pizza = new PizzaModel();
					$id = $this->request->getVar('id');
					$name = $this->request->getVar('name');
					$price = $this->request->getVar('price');
					$ingredients = $this->request->getVar('ingredients');
					$pizzaData = array(
						'name'=>$name,
						'price'=>$price,
						'ingredients'=>$ingredients
					);
					$pizza->update($id,$pizzaData);
					return redirect()->to('/dashboard');
				}else{
					$data['validation'] = $this->validator;
					return redirect()->to('/dashboard');
				}
			}
			return view('/index',$data);
			
		}

	// delete pizza data from list pizza
	public function deletePizza($id){
		$pizza = new PizzaModel();
		$pizza->find($id);
		$delete = $pizza->delete($id);
		return redirect()->to("/dashboard");
	}
}
