<?php

class myUser extends sfBasicSecurityUser
{
    public function signIn($admin)
    {
        $this->setAuthenticated(true);
        $this->addCredential("admin-broshure");
        
        $this->setAttribute('id', $admin->getId());
        $this->setAttribute('fullname', $admin->getFirstname().' '.$admin->getLastname());
      
    }
  
    public function signOut()
    {
        $this->clearCredentials();
        $this->setAuthenticated(false);
    }
  
    public function getId()
    {
       return $this->getAttribute('user_id', 0);
    }

    public function getFullname()
    {
        return $this->getAttribute('fullname', '');
    }
    
    public function getInstance()
    {
       return Doctrine::getTable('User')->find($this->getId());
    }

}