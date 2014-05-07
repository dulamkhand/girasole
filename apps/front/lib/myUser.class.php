<?php

class myUser extends sfBasicSecurityUser
{
  public function signIn($user)
  {
      $this->setAuthenticated(true);
      
      $this->setAttribute('id', $user->getId());
      $this->setAttribute('firstname', $user->getFirstname());
      $this->setAttribute('lastname', $user->getLastname());
      $this->setAttribute('fullname', $user->getFullname());
      $this->setAttribute('avator', $user->getAvator());
      $this->setAttribute('image', $user->getImage());

      $user->setLoggedAt(date('Y-m-d H:i:s'));
      $user->save();
  }

  public function getId()
  {
     return $this->getAttribute('id', 0);
  }
  
  public function getCode()
  {
     return $this->getAttribute('code', null);
  }
  
  public function setCode($code)
  {
     return $this->setAttribute('code', $code);
  }

  public function signOut()
  {
      $this->getAttributeHolder()->removeNamespace();
  
      $this->setAuthenticated(false);
      $this->clearCredentials();
  }

  
  public function getInstance()
  {
      return Doctrine::getTable('User')->find($this->getAttribute('id'));
  }
  
  /*public function getAttribute()
  {
      return $this->setAuthenticated;
  }*/
}
