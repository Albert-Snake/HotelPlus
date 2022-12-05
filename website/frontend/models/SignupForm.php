<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nome;
    public $apelido;
    public $cargo;
    public $nif;
    public $telefone;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['nome', 'required'],
            ['apelido', 'required'],
            ['cargo', 'required'],
            ['nif', 'required'],
            ['telefone', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        try{
            if(!$this->validate()){
                return null;
            }
            $usertype = User::find()->where(['nif'=>$this->nif])->one();
            if ($usertype==null) {
                $user = new User();
                $user->username = $this->username;
                $user->email = $this->email;
                $user->setPassword($this->password);
                $user->generateAuthKey();
                $user->nome = $this->nome;
                $user->apelido = $this->apelido;
                $user->cargo = 'Cliente';
                $user->nif = $this->nif;
                $user->telefone = $this->telefone;
                $user->save(false);

                // the following three lines were added:
//                $auth = \Yii::$app->authManager;
//                $role = $auth->getRole('cliente');
//                $auth->assign($role, $user->getId());

                return $user;
            }
            else{
                return Yii::$app->session->setFlash('warning', 'Contribuinte já registado.');
            }
        }
        catch (yii\db\IntegrityException $error){
            return Yii::$app->session->setFlash('warning', 'Ocorreu um erro de registo. Tente novamente mais tarde.');
        }

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
