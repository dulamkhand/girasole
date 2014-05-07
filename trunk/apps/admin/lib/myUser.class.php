<?php

class myUser extends sfBasicSecurityUser
{
    public function signIn($admin)
    {
        $this->setAuthenticated(true);
        
        // module credentials
        $rss = explode(";", $admin->getModPermissions());
        foreach ($rss as $rs){
            $this->addCredential($rs);  
        }

        // category permissions
        $catPermissions = array();
        $rss = explode(";", $admin->getCatPermissions());
        foreach ($rss as $rs){
            $catPermissions[] = $rs;
        }
        $this->setAttribute('catPermissions', $catPermissions);

        $this->setAttribute('id', $admin->getId());
        $this->setAttribute('email', $admin->getEmail());
    }
  
    public function signOut()
    {
        $this->clearCredentials();
        $this->setAuthenticated(false);
    }
  
    public function getId()
    {
       return $this->getAttribute('id', 0);
    }

    public function getEmail()
    {
        return $this->getAttribute('email', '');
    }
    
    public function getCatPermissions()
    {
        return $this->getAttribute('catPermissions', array());
    }
    
    public function getInstance()
    {
       return Doctrine::getTable('Admin')->find($this->getId());
    }

}