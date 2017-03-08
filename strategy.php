<?php
	$strategy1 = array(
		"18" => 0,
		"Swim" => 0,
		"Experience" => 2,
		"CPR" => 2
	);
	
	$strategy2 = array(
		"18" => 1,
		"Swim" => 1,
		"Experience" => 0,
		"CPR" => 2
	);
	
	$strategy3 = array(
		"18" => 1,
		"Swim" => 0,
		"Experience" => 0,
		"CPR" => 2
	);

	$strategy4 = array(
		"18" => 0,
		"Swim" => 1,
		"Experience" => 0,
		"CPR" => 0
	);	
	
	
	$answers1 = array (
		"18" => 1,
		"Swim" => 1,
		"Experience" => 1,
		"CPR" => 0
	);
	
	$answers2 = array (
		"18" => 0,
		"Swim" => 1,
		"Experience" => 1,
		"CPR" => 0
	);

	$answers3 = array (
		"18" => 0,
		"Swim" => 1,
		"Experience" => 0,
		"CPR" => 0
	);	
	
	$answers4 = array (
		"18" => 0,
		"Swim" => 0,
		"Experience" => 0,
		"CPR" => 0
	);	
	
	$answers5 = array (
		"18" => 0,
		"Swim" => 0,
		"Experience" => 0,
		"CPR" => 0
	);	
	function apply_strategy($answers, $strategy) {
		$mandatory = array_keys($strategy, 1);
		$niceToHave = array_keys($strategy, 2);
		
		$score = 1;
		$nSum = 0;
		$nCount = count($niceToHave);
		
		foreach ($mandatory as $key) {
			$score*= $answers[$key];
		};
		
		foreach ($niceToHave as $key) {
			$nSum += $answers[$key]; 
		};
		if ($nCount > 0)
			$score += 4 * ($nSum/$nCount);
		
		return $score;
	}
	
	{ // a1 scores
	$a1score1 = apply_strategy($answers1, $strategy1);
	
	$a1score2 = apply_strategy($answers1, $strategy2);
	
	$a1score3 = apply_strategy($answers1, $strategy3);
	
	$a1score4 = apply_strategy($answers1, $strategy4);
	}
	
	{ // a2 scores
	$a2score1 = apply_strategy($answers2, $strategy1);
	
	$a2score2 = apply_strategy($answers2, $strategy2);
	
	$a2score3 = apply_strategy($answers2, $strategy3);
	
	$a2score4 = apply_strategy($answers2, $strategy4);
	}
	
	{ // a3 scores
	$a3score1 = apply_strategy($answers3, $strategy1);
	
	$a3score2 = apply_strategy($answers3, $strategy2);
	
	$a3score3 = apply_strategy($answers3, $strategy3);
	
	$a3score4 = apply_strategy($answers3, $strategy4);
	}
	
	{ // a4 scores
	$a4score1 = apply_strategy($answers4, $strategy1);
	
	$a4score2 = apply_strategy($answers4, $strategy2);
	
	$a4score3 = apply_strategy($answers4, $strategy3);
	
	$a4score4 = apply_strategy($answers4, $strategy4);
	}
	
	{ // a5 scores
	$a5score1 = apply_strategy($answers5, $strategy1);
	
	$a5score2 = apply_strategy($answers5, $strategy2);
	
	$a5score3 = apply_strategy($answers5, $strategy3);
	
	$a5score4 = apply_strategy($answers5, $strategy4);
	}
	
	echo "a1: s1: $a1score1, s2: $a1score2, s3: $a1score3, s4: $a1score4 \n";
	echo "a2: s1: $a2score1, s2: $a2score2, s3: $a2score3, s4: $a2score4 \n";
	echo "a3: s1: $a3score1, s2: $a3score2, s3: $a3score3, s4: $a3score4 \n";
	echo "a4: s1: $a4score1, s2: $a4score2, s3: $a4score3, s4: $a4score4 \n";
	echo "a5: s1: $a5score1, s2: $a5score2, s3: $a5score3, s4: $a5score4 \n";
?>