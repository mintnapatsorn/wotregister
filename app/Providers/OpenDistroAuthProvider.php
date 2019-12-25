<?php
namespace App\Providers;

use Exception;
use Illuminate\Support\Arr;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;


class OpenDistroAuthProvider extends AbstractProvider implements ProviderInterface {
    protected $scopes = ['openid'];
    protected $scopeSeparator = ' ';
    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(env('OPENDISTRO_REDIRECT_URL'), $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return env('OPENDISTRO_GET_TOKEN_URL');
    }


    /**
     * {@inheritdoc}
     */
    protected function getTokenFields($code)
    {
        return array_add(
            parent::getTokenFields($code), 'grant_type', 'authorization_code'
        );
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {

        $response = $this->getHttpClient()->get(env('OPENDISTRO_GET_USER_URL'), [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);
        return json_decode($response->getBody(), true);
    }

    /**
     * {@inheritdoc}
     */
    public function user()
    {
        // if ($this->hasInvalidState()) {
        //     throw new InvalidStateException;
        // }
        $response = $this->getAccessTokenResponse($this->getCode());
        $user = $this->mapUserToObject($this->getUserByToken(
            $token = Arr::get($response, 'access_token')
        ));
            return $user->setToken($token)
                    ->setRefreshToken(Arr::get($response, 'refresh_token'))
                    ->setExpiresIn(Arr::get($response, 'expires_in'));

    }
    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        if(array_key_exists('email', $user)){
            return (new User)->setRaw($user)->map([
                'id'=>$user['sub'],
                'preferred_username'=>$user['preferred_username'],
                'email'=>$user['email'],
                'groups'=>$user['groups']
            ]);
        }else{
            return (new User)->setRaw($user)->map([
                'id'=>$user['sub'],
                'preferred_username'=>$user['preferred_username'],
                'email'=>'default@meca.in.th',
                'groups'=>$user['groups']
            ]);
        }

        
    }

}
?>