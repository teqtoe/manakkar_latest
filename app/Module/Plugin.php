<?php

// Initialize the filter globals.
require( dirname( __FILE__ ) . '/TeqtoeHook.php' );

/** @var TeqtoeHook[] $teqtoe_filter */
global $teqtoe_filter, $teqtoe_actions, $teqtoe_current_filter;

if ( $teqtoe_filter ) {
	$teqtoe_filter = TeqtoeHook::build_preinitialized_hooks( $teqtoe_filter );
} else {
	$teqtoe_filter = array();
}

if ( ! isset( $teqtoe_actions ) ) {
	$teqtoe_actions = array();
}

if ( ! isset( $teqtoe_current_filter ) ) {
	$teqtoe_current_filter = array();
}

/**
 * @param $tag
 * @param $function_to_add
 * @param int $priority
 * @param int $accepted_args
 * @return bool
 */
function add_filter( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
	global $teqtoe_filter;
	if ( ! isset( $teqtoe_filter[ $tag ] ) ) {
		$teqtoe_filter[ $tag ] = new TeqtoeHook();
	}
	$teqtoe_filter[ $tag ]->add_filter( $tag, $function_to_add, $priority, $accepted_args );
	return true;
}

/**
 * @param $tag
 * @param bool $function_to_check
 * @return bool|int
 */
function has_filter( $tag, $function_to_check = false ) {
	global $teqtoe_filter;

	if ( ! isset( $teqtoe_filter[ $tag ] ) ) {
		return false;
	}

	return $teqtoe_filter[ $tag ]->has_filter( $tag, $function_to_check );
}

/**
 * @param $tag
 * @param $value
 * @return mixed
 */
function apply_filters( $tag, $value ) {
	global $teqtoe_filter, $teqtoe_current_filter;

	$args = func_get_args();

	// Do 'all' actions first.
	if ( isset( $teqtoe_filter['all'] ) ) {
		$teqtoe_current_filter[] = $tag;
		_teqtoe_call_all_hook( $args );
	}

	if ( ! isset( $teqtoe_filter[ $tag ] ) ) {
		if ( isset( $teqtoe_filter['all'] ) ) {
			array_pop( $teqtoe_current_filter );
		}
		return $value;
	}

	if ( ! isset( $teqtoe_filter['all'] ) ) {
		$teqtoe_current_filter[] = $tag;
	}

	// Don't pass the tag name to TeqtoeHook.
	array_shift( $args );

	$filtered = $teqtoe_filter[ $tag ]->apply_filters( $value, $args );

	array_pop( $teqtoe_current_filter );

	return $filtered;
}

/**
 * @param $tag
 * @param $args
 * @return mixed
 */
function apply_filters_ref_array( $tag, $args ) {
	global $teqtoe_filter, $teqtoe_current_filter;

	// Do 'all' actions first
	if ( isset( $teqtoe_filter['all'] ) ) {
		$teqtoe_current_filter[] = $tag;
		$all_args            = func_get_args();
		_teqtoe_call_all_hook( $all_args );
	}

	if ( ! isset( $teqtoe_filter[ $tag ] ) ) {
		if ( isset( $teqtoe_filter['all'] ) ) {
			array_pop( $teqtoe_current_filter );
		}
		return $args[0];
	}

	if ( ! isset( $teqtoe_filter['all'] ) ) {
		$teqtoe_current_filter[] = $tag;
	}

	$filtered = $teqtoe_filter[ $tag ]->apply_filters( $args[0], $args );

	array_pop( $teqtoe_current_filter );

	return $filtered;
}

/**
 * @param $tag
 * @param $function_to_remove
 * @param int $priority
 * @return bool
 */
function remove_filter( $tag, $function_to_remove, $priority = 10 ) {
	global $teqtoe_filter;

	$r = false;
	if ( isset( $teqtoe_filter[ $tag ] ) ) {
		$r = $teqtoe_filter[ $tag ]->remove_filter( $tag, $function_to_remove, $priority );
		if ( ! $teqtoe_filter[ $tag ]->callbacks ) {
			unset( $teqtoe_filter[ $tag ] );
		}
	}

	return $r;
}

/**
 * @param $tag
 * @param bool $priority
 * @return bool
 */
function remove_all_filters( $tag, $priority = false ) {
	global $teqtoe_filter;

	if ( isset( $teqtoe_filter[ $tag ] ) ) {
		$teqtoe_filter[ $tag ]->remove_all_filters( $priority );
		if ( ! $teqtoe_filter[ $tag ]->has_filters() ) {
			unset( $teqtoe_filter[ $tag ] );
		}
	}

	return true;
}

/**
 * @return mixed
 */
function current_filter() {
	global $teqtoe_current_filter;
	return end( $teqtoe_current_filter );
}

/**
 * @return string
 */
function current_action() {
	return current_filter();
}

/**
 * @param null $filter
 * @return bool
 */
function doing_filter( $filter = null ) {
	global $teqtoe_current_filter;

	if ( null === $filter ) {
		return ! empty( $teqtoe_current_filter );
	}

	return in_array( $filter, $teqtoe_current_filter );
}

/**
 * @param null $action
 * @return bool
 */
function doing_action( $action = null ) {
	return doing_filter( $action );
}

/**
 * @param $tag
 * @param $function_to_add
 * @param int $priority
 * @param int $accepted_args
 * @return true
 */
function add_action( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
	return add_filter( $tag, $function_to_add, $priority, $accepted_args );
}

/**
 * @param $tag
 * @param mixed ...$arg
 */
function do_action( $tag, ...$arg ) {
	global $teqtoe_filter, $teqtoe_actions, $teqtoe_current_filter;

	if ( ! isset( $teqtoe_actions[ $tag ] ) ) {
		$teqtoe_actions[ $tag ] = 1;
	} else {
		++$teqtoe_actions[ $tag ];
	}

	// Do 'all' actions first
	if ( isset( $teqtoe_filter['all'] ) ) {
		$teqtoe_current_filter[] = $tag;
		$all_args            = func_get_args();
		_teqtoe_call_all_hook( $all_args );
	}

	if ( ! isset( $teqtoe_filter[ $tag ] ) ) {
		if ( isset( $teqtoe_filter['all'] ) ) {
			array_pop( $teqtoe_current_filter );
		}
		return;
	}

	if ( ! isset( $teqtoe_filter['all'] ) ) {
		$teqtoe_current_filter[] = $tag;
	}

	if ( empty( $arg ) ) {
		$arg[] = '';
	} elseif ( is_array( $arg[0] ) && 1 === count( $arg[0] ) && isset( $arg[0][0] ) && is_object( $arg[0][0] ) ) {
		// Backward compatibility for PHP4-style passing of `array( &$this )` as action `$arg`.
		$arg[0] = $arg[0][0];
	}

	$teqtoe_filter[ $tag ]->do_action( $arg );

	array_pop( $teqtoe_current_filter );
}

/**
 * @param $tag
 * @return int
 */
function did_action( $tag ) {
	global $teqtoe_actions;

	if ( ! isset( $teqtoe_actions[ $tag ] ) ) {
		return 0;
	}

	return $teqtoe_actions[ $tag ];
}

/**
 * @param $tag
 * @param $args
 */
function do_action_ref_array( $tag, $args ) {
	global $teqtoe_filter, $teqtoe_actions, $teqtoe_current_filter;

	if ( ! isset( $teqtoe_actions[ $tag ] ) ) {
		$teqtoe_actions[ $tag ] = 1;
	} else {
		++$teqtoe_actions[ $tag ];
	}

	// Do 'all' actions first
	if ( isset( $teqtoe_filter['all'] ) ) {
		$teqtoe_current_filter[] = $tag;
		$all_args            = func_get_args();
		_teqtoe_call_all_hook( $all_args );
	}

	if ( ! isset( $teqtoe_filter[ $tag ] ) ) {
		if ( isset( $teqtoe_filter['all'] ) ) {
			array_pop( $teqtoe_current_filter );
		}
		return;
	}

	if ( ! isset( $teqtoe_filter['all'] ) ) {
		$teqtoe_current_filter[] = $tag;
	}

	$teqtoe_filter[ $tag ]->do_action( $args );

	array_pop( $teqtoe_current_filter );
}

/**
 * @param $tag
 * @param bool $function_to_check
 * @return false|int
 */
function has_action( $tag, $function_to_check = false ) {
	return has_filter( $tag, $function_to_check );
}

/**
 * @param $tag
 * @param $function_to_remove
 * @param int $priority
 * @return bool
 */
function remove_action( $tag, $function_to_remove, $priority = 10 ) {
	return remove_filter( $tag, $function_to_remove, $priority );
}

/**
 * @param $tag
 * @param bool $priority
 * @return true
 */
function remove_all_actions( $tag, $priority = false ) {
	return remove_all_filters( $tag, $priority );
}

/**
 * @param $args
 */
function _teqtoe_call_all_hook( $args ) {
	global $teqtoe_filter;

	$teqtoe_filter['all']->do_all_hook( $args );
}

function _teqtoe_filter_build_unique_id( $tag, $function, $priority ) {
	global $teqtoe_filter;
	static $filter_id_count = 0;

	if ( is_string( $function ) ) {
		return $function;
	}

	if ( is_object( $function ) ) {
		// Closures are currently implemented as objects
		$function = array( $function, '' );
	} else {
		$function = (array) $function;
	}

	if ( is_object( $function[0] ) ) {
		// Object Class Calling
		return spl_object_hash( $function[0] ) . $function[1];
	} elseif ( is_string( $function[0] ) ) {
		// Static Calling
		return $function[0] . '::' . $function[1];
	}
}
