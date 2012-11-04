<?php

class myUser extends sfBasicSecurityUser
{
  public function signIn($user)
  {
    $this->setAuthenticated(true);
    $this->setAttribute('id', $user->getId());
    $user->setLoggedAt(date('Y-m-d H:i:s'));
    $user->save();
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
}
