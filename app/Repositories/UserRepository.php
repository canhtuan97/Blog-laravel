<?php

namespace App\Repositories;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserRepository extends EloquentRepository
{
	public function model()
	{
		return \App\User::class;
	}	
	// get all usser
	public function getAllUser(){
		$users = $this->model->get();
		return $users; 
	}
	// update user
	public function updateUser($request){
		$user = Auth::user();

		$this->model
		->where('id', $user->id )
		->update(['username' => $request->username,
		'email' => $request->email,
		'sdt' =>$request->sdt
		]);;
	}
	// update password
	public function updatePassword($request){
		$user = Auth::user();
		if (Hash::check($request->passwordold,$user->password)) {
			$user->password =Hash::make($request->passwordnew);
			$user->save();
		
		}
	}
	//delete user with id
	public function deleteUserId($id){
		$this->model->where('id', '=',$id)->delete();
	}
	// find id
	public function find($userId)
	{
		return $this->model->find($userId);
	}
}