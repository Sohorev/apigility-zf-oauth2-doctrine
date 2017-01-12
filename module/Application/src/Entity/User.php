<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZF\OAuth2\Doctrine\Entity\UserInterface;
use Zend\Stdlib\ArraySerializableInterface;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User implements UserInterface, ArraySerializableInterface
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=120, nullable=false)
     */
    protected $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=60, nullable=false)
     */
    protected $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="blocked", type="integer", nullable=false)
     */
    private $blocked = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=200, nullable=true)
     */
    protected $firstname;
    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=200, nullable=true)
     */
    protected $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=100, nullable=true)
     */
    private $token;

    /**
     * @var ZF\OAuth2\Doctrine\Entity\Client
     */
    protected $client;

    /**
     * @var ZF\OAuth2\Doctrine\Entity\AccessToken
     */
    protected $accessToken;

    /**
     * @var ZF\OAuth2\Doctrine\Entity\AuthorizationCode
     */
    protected $authorizationCode;

    /**
     * @var ZF\OAuth2\Doctrine\Entity\RefreshToken
     */
    protected $refreshToken;

    public function exchangeArray(array $data)
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'username':
                    $this->setUsername($value);
                    break;
                case 'password':
                    $this->setPassword($value);
                    break;
                case 'blocked':
                    $this->setBlocked($value);
                    break;
                case 'firstname':
                    $this->setFirstname($value);
                    break;
                case 'lastname':
                    $this->setLastname($value);
                    break;
//                case 'phone_number':
//                case 'phoneNumber':
//                    $this->setPhoneNumber($value);
//                    break;
                default:
                    break;
            }
        }

        return $this;
    }

    public function getArrayCopy()
    {
        return array(
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'blocked' => $this->getBlocked(),
            'firstname' => $this->getFirstname(),
            'lastname' => $this->getLastname(),
//            'phone_number' => $this->getPhoneNumber(), // underscore formatting for openid
//            'phoneNumber' => $this->getPhoneNumber(),
        );
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set blocked
     *
     * @param integer $blocked
     *
     * @return User
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * Get blocked
     *
     * @return integer
     */
    public function getBlocked()
    {
        return $this->blocked;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return ZF\OAuth2\Doctrine\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return ZF\OAuth2\Doctrine\Entity\AccessToken
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @return ZF\OAuth2\Doctrine\Entity\AuthorizationCode
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @return ZF\OAuth2\Doctrine\Entity\RefreshToken
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
    * @return string
    */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    /**
    * @return string
    */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }
}