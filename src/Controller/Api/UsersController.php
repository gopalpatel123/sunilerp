<?php
namespace App\Controller\Api;
use Cake\Event\Event;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Validation\Validation;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
	 public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add', 'login','send_otp','signup','country','state','city','categorylist','home','filter','like','sendotpforgetpassword','setpassword','profileedit','profilelist','citybycountry','updatedevicetoken','certificationdelete','aboutus','interestkbc','messageshow','talentplatform','subcategorylist','send_otpall']);
    }
	
    public function login()
    {
        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            $company_user = $this->Users->CompanyUsers->find()->where(['user_id'=>$this->Auth->user('id')])->first();

            $success = true;
            $message = "User found successfully";
            $response = $user;
            $response['company_id'] = $company_user->company_id;
            $response['location_id'] = $company_user->location_id;
        }
        else
        {
            $success = false;
            $message = "Username Or Password Is Wrong";
        }
            
        $this->set(compact(['response','success','message']));
        $this->set('_serialize', ['success','message','response']);
    }
}
