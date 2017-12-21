<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\NotBlank(message="Please, enter an email.")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     * @Assert\NotBlank(message="Please, add your password.")
     */
    private $plainPassword;

    /**
     * @var string
     * @ORM\Column(name="initial_cash", type="decimal", precision=11, scale=2)
     */
    private $initialCash;

    /**
     * @var string
     *
     * @ORM\Column(name="spent_money", type="decimal", precision=11, scale=2)
     */
    private $spentMoney;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_enabled", type="boolean")
     */
    private $enabled;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Role")
     * @ORM\JoinTable(name="user_roles",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     *     )
     * @var Collection|Role[]
     */

    private $roles;

    /**
     * @var Book[]|ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Book", inversedBy="buyers")
     * @ORM\JoinTable(name="user_orders", joinColumns={@ORM\JoinColumn(name="user_id",referencedColumnName="id")}, inverseJoinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")})
     */
    private $orders;

    /**
     * @var Book[]|ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Book", inversedBy="buyersComplete")
     * @ORM\JoinTable(name="user_purchases", joinColumns={@ORM\JoinColumn(name="user_id",referencedColumnName="id")}, inverseJoinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id")})
     */
    private $purchases;

    /**
     * @var Review[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Review", mappedBy="user")
     */
    private $reviews;

    public function __construct()
    {
        $this->purchases = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->reviews = new ArrayCollection();
        $this->roles = new ArrayCollection();
        $this->setSpentMoney(0);
        $this->setEnabled(true);
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
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
     * @return mixed
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param mixed $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return mixed
     */
    public function getInitialCash()
    {
        return $this->initialCash;
    }

    /**
     * @param mixed $initialCash
     */
    public function setInitialCash($initialCash)
    {
        $this->initialCash = $initialCash;
    }

    /**
     * @return int
     */
    public function getSpentMoney()
    {
        return $this->spentMoney;
    }

    /**
     * @param int $spentMoney
     */
    public function setSpentMoney($spentMoney)
    {
        $this->spentMoney = $spentMoney;
    }

    /**
    * @return bool
    */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }


    /**
     * Returns the roles granted to the user.

     * @return array
     */
    public function getRoles()
    {
       $roles = [];
       foreach ($this->roles as $role) {
           $roles[] = $role->getName();
       }
       return $roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
        return $this;
    }


    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(
            [
                $this->getId(),
                $this->getUsername(),
                $this->getPassword()
            ]
        );
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password
            ) = unserialize($serialized);
    }


    /**
     * Checks whether the user's account has expired.
     *
     * Internally, if this method returns false, the authentication system
     * will throw an AccountExpiredException and prevent login.
     *
     * @return bool true if the user's account is non expired, false otherwise
     *
     * @see AccountExpiredException
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * Checks whether the user is locked.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a LockedException and prevent login.
     *
     * @return bool true if the user is not locked, false otherwise
     *
     * @see LockedException
     */
    public function isAccountNonLocked()
    {
        return true;
    }

    /**
     * Checks whether the user's credentials (password) has expired.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a CredentialsExpiredException and prevent login.
     *
     * @return bool true if the user's credentials are non expired, false otherwise
     *
     * @see CredentialsExpiredException
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * Checks whether the user is enabled.
     *
     * Internally, if this method returns false, the authentication system
     * will throw a DisabledException and prevent login.
     *
     * @return bool true if the user is enabled, false otherwise
     *
     * @see DisabledException
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    public function __toString()
    {
       return $this->username;
    }

    /**
     * @return Book[]|ArrayCollection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * @param Book[]|ArrayCollection $orders
     */
    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    public function addOrder(Book $order)
    {
        $this->getOrders()->add($order);
    }

    /**
     * @return Review[]|ArrayCollection
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param Review[]|ArrayCollection $reviews
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }

    public function getBalance()
    {
        return $this->initialCash - $this->spentMoney;
    }

    public function decreaseBalance(int $amount)
    {
        $this->spentMoney = $this->spentMoney + $amount;
    }

    /**
     * @return Book[]|ArrayCollection
     */
    public function getPurchases()
    {
        return $this->purchases;
    }

    /**
     * @param Book[]|ArrayCollection $purchases
     */
    public function setPurchases($purchases)
    {
        $this->purchases = $purchases;
    }

    public function addPurchase(Book $purchase)
    {
        $this->getPurchases()->add($purchase);
    }

}

