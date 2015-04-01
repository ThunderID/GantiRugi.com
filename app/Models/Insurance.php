<?php namespace App;

class Insurance extends BaseModel {

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
	function user()
	{
		return $this->belongsTo(__NAMESPACE__ . '\User');
	}

	function vendor()
	{
		return $this->belongsTo(__NAMESPACE__ . '\Vendor');
	}

	function vehicles()
	{
		return $this->belongsToMany(__NAMESPACE__ . '\Vehicle');
	}

	// ------------------------ SCOPE ------------------------

	// ------------------------ MUTATOR ------------------------

	// ------------------------ ACCESSOR ------------------------

	// ------------------------ FUNCTIONS ------------------------

}
