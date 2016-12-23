<?php

namespace EasyTransac\Entities;

/**
 * Represents a client
 * @author klyde
 * @copyright EasyTransac
 */
class Client extends Entity
{
	/** @map:Id **/
	protected $id = null;
	/** @map:Email **/
	protected $email = null;
	/** @map:Firstname **/
	protected $firstname = null;
	/** @map:Lastname **/
	protected $lastname = null;
	/** @map:Phone **/
	protected $phone = null;
	/** @map:Address **/
	protected $address = null;
	/** @map:ZipCode **/
	protected $zipCode = null;
	/** @map:City **/
	protected $city = null;
	
	public function getId() 
	{
		return $this->id;
	}
	
	public function setId($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	public function getEmail() 
	{
		return $this->email;
	}
	
	public function setEmail($email) 
	{
		$this->email = $email;
		return $this;
	}
	
	public function getFirstname() 
	{
		return $this->firstname;
	}
	
	public function setFirstname($firstname) 
	{
		$this->firstname = $firstname;
		return $this;
	}
	
	public function getLastname() 
	{
		return $this->lastname;
	}
	
	public function setLastname($lastname) 
	{
		$this->lastname = $lastname;
		return $this;
	}
	
	public function getPhone() 
	{
		return $this->phone;
	}
	
	public function setPhone($phone) 
	{
		$this->phone = $phone;
		return $this;
	}
	
	public function getAddress() 
	{
		return $this->address;
	}
	
	public function setAddress($address) 
	{
		$this->address = $address;
		return $this;
	}
	
	public function getZipCode() 
	{
		return $this->zipCode;
	}
	
	public function setZipCode($zipCode) 
	{
		$this->zipCode = $zipCode;
		return $this;
	}
	
	public function getCity() 
	{
		return $this->city;
	}
	
	public function setCity($city) 
	{
		$this->city = $city;
		return $this;
	}
}

?>