<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permissions
 *
 * @Table(name="permissions")
 * @Entity
 */
class Permissions
{
    /**
     * @var integer $permissionId
     *
     * @Column(name="permission_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $permissionId;

    /**
     * @var string $privilage
     *
     * @Column(name="privilage", type="string", length=250, nullable=true)
     */
    private $privilage;

    /**
     * @var string $description
     *
     * @Column(name="description", type="string", length=1000, nullable=true)
     */
    private $description;
    
    /**
     * @var string $resource
     *
     * @Column(name="resource", type="string", length=250, nullable=true)
     */
    private $resource;
    
    /**
     * @var string $displayName
     *
     * @Column(name="display_name", type="string", length=250, nullable=true)
     */
    private $displayName;
    
    /**
     * @var string $priority
     *
     * @Column(name="priority", type="integer", length=11, nullable=true)
     */
    private $priority;
    
    /**
     * @var string $parentId
     *
     * @Column(name="parent_id", type="integer", length=11, nullable=true)
     */
    private $parentId;


    /**
     * Get permissionId
     *
     * @return integer 
     */
    public function getPermissionId()
    {
        return $this->permissionId;
    }

    /**
     * Set privilage
     *
     * @param string $privilage
     * @return Permissions
     */
    public function setPrivilage($privilage)
    {
    	$this->privilage = $privilage;
    	return $this;
    }
    
    /**
     * Get privilage
     *
     * @return string
     */
    public function getPrivilage()
    {
    	return $this->privilage;
    }
    
    /**
     * Set resource
     *
     * @param string $resource
     * @return Permissions
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * Get resource
     *
     * @return string 
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Permissions
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set displayName
     *
     * @param string $displayName
     * @return Permissions
     */
    public function setDisplayName($displayName)
    {
    	$this->displayName = $displayName;
    	return $this;
    }
    
    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
    	return $this->displayName;
    }
    
    /**
     * Set priority
     *
     * @param integer $priority
     * @return Permissions
     */
    public function setPriority($priority)
    {
    	$this->priority = $priority;
    	return $this;
    }
    
    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
    	return $this->priority;
    }
    
    /**
     * Set parentId
     *
     * @param integer $parentId
     * @return Permissions
     */
    public function setParentId($parentId)
    {
    	$this->parentId = $parentId;
    	return $this;
    }
    
    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
    	return $this->parentId;
    }
}