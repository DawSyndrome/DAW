<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Shelter_model
{
    public static function getCategories(){
		return collect(DB::select(
			"
				SELECT * 
				FROM petcategories
			"
		));
	}

	public static function getCategory($category_id){
		return collect(DB::select("SELECT * FROM petcategories WHERE id=?", [$category_id]))->first();
	}

	public static function getAllUnadoptedAnimals(){
		return collect(DB::select(
			"
				SELECT *
				FROM pets
				WHERE status = 0 OR status = NULL
			"
		));
	}

	public static function getUnadoptedAnimalsByID($id){
		return collect(DB::select(
			"
				SELECT *
				FROM pets
				WHERE (status = 0  OR status = NULL) AND cat_id = ?
			",
			[
				$id
			]
		));
	}

	public static function getAnimalByID($id){
		return collect(DB::select(
			"
				SELECT * 
				FROM pets 
				WHERE id=?
			"
			, 
			[
				$id
			]
		)) -> first();
	}

	public static function adoptAnimal($id, $owner){
		$animal = Shelter_model::getAnimalByID($id);
		if($animal->status == 0 || $animal->status == null){
			DB::insert(
				"
					INSERT INTO adoptions (
						petlover_id, 
						pet_id, 
						created_at 
					) VALUES (
						?,
						?,
						NOW()
					)
				"
				,
				[
					$owner, 
					$id
				]
			);
			DB::update(
				"
					UPDATE pets SET status=1 WHERE id=?
				"
				,
				[
					$id
				]
			);
			return true;
		}
		return false;
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////AUTH///////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	public static function exists($email){
			return collect(DB::select("SELECT id, name FROM petlovers WHERE email=?", [$email]))->first() != null;
		}

	public static function login($email, $pw){
		return collect(DB::select(
			"
				SELECT id, name 
				FROM petlovers 
				WHERE 
					email=? 
					AND 
					password_digest=?
			"
			, 
			[
				$email, 
				md5($pw)
			]
		)) -> first();
	}

	public static function register($name, $email, $pw){
		DB::insert(
			"
				INSERT INTO petlovers (
					name, 
					email, 
					password_digest, 
					created_at,
					updated_at
				) VALUES (
					?,
					?,
					?, 
					NOW(),
					NOW()
				)
			"
			,
			[
				$name, 
				$email, 
				md5($pw)
			]
		);
		return true;
	}
}
