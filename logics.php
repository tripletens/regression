<?php 
	class regression{
		function __construct(){

		}
		//getting input as associative array 
		// x is the months and they are 12 
		// y is the sales for each month
		public function sum_x($data_x){
			return array_sum($data_x);
		}
		public function sum_y($data_y){
			return array_sum($data_y);
		}
		public function times_sum($data_x,$data_y){
			return $this->sum_x($data_x) * $this->sum_y($data_y);
		}
		//for the (summation $x)^2
		public function power_sum_x($data_x){
			$x = $this->sum_x($data_x); 
			return pow($x, 2);
		}
		public function sum_x_power($data_x_power){
			return array_sum($data_x_power);
		}
		public function n_sum_x_power($n,$data_x_power){
			return $n * $this->sum_x_power($data_x_power);
		}
		public function x_y($data_x_y){
			return array_sum($data_x_y);
		}
		public function n_x_y($n,$data_x_y){
			return $n * $this->x_y($data_x_y);
		}
		public function numerator($n,$data_x,$data_y,$data_x_y){
			return $this->n_x_y($n,$data_x_y) - $this->times_sum($data_x,$data_y);
		}
		public function denominator($n,$data_x_power,$data_x){
			return $this->n_sum_x_power($n,$data_x_power) - $this->power_sum_x($data_x);
		}
		public function b1($n,$data_x,$data_y,$data_x_y,$data_x_power){
			return $this->numerator($n,$data_x,$data_y,$data_x_y) / $this->denominator($n,$data_x_power,$data_x);
		}
		public function mean_x($data_x, $n ){
			return array_sum($data_x) / $n; 
		}
		public function mean_y($data_y , $n){
			return array_sum($data_y) / $n;
		}
		public function mean_x_and_b1($n,$data_x,$data_y,$data_x_y,$data_x_power){
			return $this->b1($n,$data_x,$data_y,$data_x_y,$data_x_power) * $this->mean_x($data_x, $n);
		}
		public function b0($n,$data_x,$data_y,$data_x_y,$data_x_power){
			return $this->mean_y($data_y, $n) - $this->mean_x_and_b1($n,$data_x,$data_y,$data_x_y,$data_x_power);
		}
	}
	// $obj = new regression();

	// $data_x = array(1,2,3);
	// echo $obj->mean_y($data_x, 3);
?>