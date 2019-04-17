<?php
	
namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdatePasswordRequest;
use App\Repositories\UserRepository;
class UserControllers extends Controller
{
  private $userRepository;
  public  function __construct(UserRepository $userRepository){
      $this->userRepository  = $userRepository;

  }
  /**
   * [getUser display  info a user]
   * @return [type] [view user/info/info_user]
   */
   public function getUser(){
   	
   	return view('user/info/info_user');
   }
   /**
    * [updateUser update info of user]
    * @param  Request $request [receive info  change of a user ]
    */
    public function updateUser(Request $request){
      $this->userRepository->updateUser($request);
      return back();
    }
    /**
     * [updatePassword change password of a user]
     * @param  UpdatePasswordRequest $request [receive a variable have info a password change]
     * @return [type]                         [description]
     */
   public function updatePassword(UpdatePasswordRequest $request){
    $request->validate();
    $this->userRepository->updatePassword($request);
    return back();
   }

}
