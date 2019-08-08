<?php
namespace App\Model\Traits;

trait BaseTrait
{
	public $timestamps = true;

	public function getIdLabelAttribute(){
		$label = null;
		if($this->id){
			$label = str_pad($this->id, 5, "0", STR_PAD_LEFT);
		}

		return $label;
	}

	public function getSlug()
	{
		return ($this->slug ?? $this->id ?? NULL);
	}

}
