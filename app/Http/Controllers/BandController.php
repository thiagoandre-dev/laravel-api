<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
    public function getAll(){

			$bands = $this->getBands();

			return response()->json($bands);

		}

		public function getById($id){

			$band = null;

			foreach ($this->getBands() as $_band){
				if ($_band['id'] == $id){
					$band = $_band;
				}
			}

			return $band ? response()->json($band) : abort(code: 404);
		}

		public function getBandsByGenderId($genderId){

			$bands = [];

			foreach ($this->getBands() as $_band){
				if ($_band['gender'] == $genderId){
					$bands[] = $_band;
				}
			}

			return response()->json($bands);
		}

		public function store(Request $request){
			$validate = $request->validate([
				'id' => 'numeric',
				'name' => 'required|min:3',
			]);

			return response()->json( $request->all() );
		}

		protected function getBands(){
			return [
				["id" => 1, 'name' => 'dream teather', 'gender' => 1],
				["id" => 2, 'name' => 'megadeth', 'gender' => 2],
			];
		}
}
