<?php
namespace App\Providers;

use Exception;
use Illuminate\Support\Arr;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;


class MecasAuthProvider extends AbstractProvider implements ProviderInterface {
    protected $scopes = ['openid'];
    protected $scopeSeparator = ' ';
    /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://sso.mecas.space/auth/realms/mecas/protocol/openid-connect/auth', $state);
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return 'https://sso.mecas.space/auth/realms/mecas/protocol/openid-connect/token';
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
        $response = $this->getHttpClient()->get('https://sso.mecas.space/auth/realms/mecas/protocol/openid-connect/userinfo', [
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
        if ($this->hasInvalidState()) {
            throw new InvalidStateException;
        }
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
        return (new User)->setRaw($user)->map([
            'id'       => $user['sub'],
            // 'name'     => $user['preferred_username'],
            'name'     => $user['name'],
            'email'    => $user['email'],
            'groups'     => $user['groups']
        ]);
    }

}
?>