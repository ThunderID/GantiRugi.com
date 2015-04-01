<?php namespace App;

class Vendor extends BaseModel {

	// Properties
	protected 	$table 		= 'insurances';
	protected 	$fillable	= [];
	public 		$timestamps = true;
	protected 	$dates 		= ['deleted_at'];

	// ------------------------ BOOT ------------------------
	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);
	}

	// ------------------------ RELATIONSHIP ------------------------
	function insurances()
	{
		return $this->hasMany(__NAMESPACE__ . '\Insurance');
	}

	// ------------------------ SCOPE ------------------------

	// ------------------------ MUTATOR ------------------------

	// ------------------------ ACCESSOR ------------------------

	// ------------------------ FUNCTIONS ------------------------
}
