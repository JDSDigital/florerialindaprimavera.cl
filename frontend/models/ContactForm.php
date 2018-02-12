<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Nombre',
            'email' => 'Correo',
            'subject' => 'Asunto',
            'body' => 'Mensaje',
            'verifyCode' => 'Código de verificación',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        $message = <<<HTML
            <h4><b>Nombre: </b>$this->name</h4>
            <h4><b>Correo: </b>$this->email</h4>
            <h4><b>Asunto: </b>$this->subject</h4>
            <h4><b>Mensaje: </b></h4>
            <h4>$this->body</h4>
HTML;

        return Yii::$app->mailer->compose()
            ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom([Yii::$app->params['supportEmail'] => 'Florería Linda Primavera'])
            ->setSubject('Nuevo mensaje desde la página web. Remitente: ' . $this->name . ' - ' . $this->email)
            ->setHtmlBody($message)
            ->send();
    }
}
