<?php

/**
 * Project:		DB_CRITERIA: A database criteria builder.
 * File:		DB_CRITERIA.php
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @link http://www.jjwdesign.com/
 * @copyright 2008 JJW Design
 * @author Jeffrey J. Walters <design@jjwdesign.com>
 * @package DB_CRITERIA
 * @version 1.1
 * @modified 09/09/2008
 */

// DB_CRITERIA Class

class db_criteria {

	var $case_sensitive = true;
	var $exact_match = false;
	var $request = array('var' => '');  // $_REQUEST

	var $criteria_definition = array(
			array(
				'name' => '',
				'field_names' => '',
				'condition' => '',
				'type' => '',
				'case_sensitive' => '',
				'exact_match' => '',
			)
		);

// WHERE CRITERIA:
// $query_criteria_array
//
// Db_variables for WHERE Query:
//
// Query Format: 
//		name
//  	field_names
//		condition
//		type
//		case_sensitive
//		exact match
//
//   name: variable name to be used in FORMs or URLs.
//   field name(s): fields to be use for comparison, seperated by commas.
//   condition: logical comparison operator <, <=, =, <=>, >= >.
//   type:
//		number - compare as a number
//		date - compare as a date (Input: MM-DD-YYYY Format!)
//		string_equal - check for exact string (Example: Category Search)
//		string - compare as a string
//   case sensitive: true or false --> string and string_equal types only! (BINARY field types!)
//   exact match: true or false --> string types only! (doesn't apply to string_equal types)
//
// Note: To use case-sensitive matches the MySQL field(s) must be 
// defined as binary!


//  mysql_build_criteria_expression - This routine builds the WHERE
//  query expression based on the search criteria array.

function mysql_build_criteria_expression()
{
// Set $case_sensitive equal to "true" to remove the UPPER() functions from 
// the MySQL statement.  This can be done because case sensitivity is based on
// wether or not the field type is BINARY.  This simplifies the query expression!

  $this->case_sensitive = true;
  $mysql_where_expr = "";

  foreach ($this->criteria_definition as $criteria)
  {
	$criteria_expression = $this->_mysql_build_criteria($this->case_sensitive, $this->exact_match, $criteria, $this->request);
	if ($criteria_expression != "") {
		$mysql_where_expr .= $criteria_expression." AND ";
	}
  }
  $mysql_where_expr = preg_replace("/ AND $/i", "", $mysql_where_expr);
  if ($mysql_where_expr == '') $mysql_where_expr = '1';

  return $mysql_where_expr;
}


############################################################
# 
# subroutine: mysql_build_criteria
#  Usage:
#      &mysql_build_criteria($case_sensitive, $exact_match, $criteria);
#
#   Last Modified: Jeff Walters, 09-09-2008
#
#   Parameters:
#      $exact_match and $case_sensitive are input parameters
#       which always OVERRIDE the individual case sensitive and
#       exact matching from the search criteria array.
#
#      $criteria is the current criteria that we
#       are applying to the MySQL search.
#
#   Output:
#      $criteria_string = returns the 'partially'
#      developed MySQL WHERE query string based
#      on the current $criteria.
# 
############################################################

function _mysql_build_criteria($case_sensitive, $exact_match, $criteria, $request)
{

				# The format of the $criteria_string will
				# be developed based on the $criteria from
				# the $sc_query_criteria array.
				#
				# Each element of the $criteria array has 6 parts:
				#
				# 1.) c_name - DB Field Name
				# 2.) c_fields - DB Field(s) to Compare Against
				# 3.) c_op - Comparison Operator ( >, <, =, >=, etc.)
				# 4.) c_type - type of comparison (number, date or string)
				# 
				# For STRING types we also have (true or false):
				# 5.) c_case_sensitive - case sensitive pattern match
				# 6.) c_exact_match - exact word/phrase matching
				#
				# Subroutine Input Parameters $exact_match and
				# $case_sensitive are input from FORM values and
				# are used to override the individual values.


				# Output: partial MySQL WHERE query string
  $criteria_string = "";

  if (!isset($criteria['name'])) $criteria['name'] = '';
  if (!isset($criteria['field_names'])) $criteria['field_names'] = '';
  if (!isset($criteria['condition'])) $criteria['condition'] = '=';
  if (!isset($criteria['type'])) $criteria['type'] = '';
  if (!isset($criteria['case_sensitive'])) $criteria['case_sensitive'] = '';
  if (!isset($criteria['exact_match'])) $criteria['exact_match'] = '';

				# Split the criteria information
  $c_name = $criteria['name'];
  $c_fields = $criteria['field_names'];
  $c_op = $criteria['condition'];
  $c_type = $criteria['type'];
  $c_case_sensitive = $criteria['case_sensitive'];
  $c_exact_match = $criteria['exact_match'];

				# The criteria can match more than ONE
				# field in the database! Thus, we get the
				# names of the fields in each row
				# of the database that the form variable
				# will be compared against.

  $criteria_fields = preg_split("/,/",$c_fields);

				# We get the value of the search string from
				# the input; HTTP POST or GET - or return
				# Note the use of the stripslashes() function.

  if (@$request[$c_name] != "") {
	$form_value = stripslashes($request[$c_name]);
  } else {
	return;
  }

				# Revome any characters which may cause the
				# MySQL server return errors or fail. This
				# needs some further development!

				# Remove any instances of "\" or ";"
				# and replace with "." (any character).
				# This is for security reasons.

  $form_value = preg_replace("/[\\\;]/", ".", $form_value);

				# There are three cases of comparison
				# that will return a value.
				# 
				# Case 1: The form field for the criteria
				# was not filled out, so nothing is added
				# to the WHERE string.
				# Or someone tried using the wildcard:
				# *, "*", "", or ".

  if ($form_value == "" || $form_value == "\*" || $form_value == "\"\*\"" || 
      $form_value == "\"\"" || $form_value == "\"" || $form_value == "''")
	{
	return;
	}

//echo "Criteria: $criteria<BR>";
//echo "c_name: $c_name<BR>";
//echo "request: $request[$c_name]<BR>";
//echo "form_value: $form_value<BR>";
//echo "<BR>";

				# Case 2: The data type is a number or a date. OR if
				# the data type is a string and the operator is NOT
				# =. So we match against the operator directly based on the
				# data type. (A string,= match is considered a separate case
				# below).

  if (preg_match("/date|number/i", $c_type) || $c_op != "=")
  {
				# Go through each database field
				# specified in @criteria_fields
				# and compare it

	reset($criteria_fields);
	foreach ($criteria_fields as $db_name)
	{
				# If the type of data comparison
				# we are doing is based on a date compare,
				# then we need to convert the date
				# into the format YYYY-MM-DD instead of 
				# MM/DD/YY. This is because MySQL needs the
				# date in the YYYY-MM-DD format to compare.
				# 
				# 2 digit years are converted to 4
				# digit years so that this script
				# will still comply with the year 2000
				# problem.

		if (preg_match("/date/i", $c_type)) {

				# Split out the DATE & TIME if $form_value
				# is in "DATE TIME" format.
				# Correct for Year 2000 & Format Problems

			$form_value = preg_replace("/\//", "-", $form_value);
			$split_date = preg_split("/\-/",$form_value);
			$month = $split_date[0];
			$day = $split_date[1];
			$year = $split_date[2];
			if (strlen($month) < 2) { $month = "0" . $month; }
			if (strlen($day) < 2) { $day = "0" . $day; }
			if ($year > 50 && $year < 1900) { $year += 1900; }
			if ($year < 1900) { $year += 2000; }
			$form_date = $year."-".$month."-".$day;

			$criteria_string .= "(".$db_name." ".$c_op." '".$form_date."') OR ";

				# If the data type is a number then we
				# perform normal number comparisons.

		} elseif (preg_match("/number/i", $c_type)) {

			$criteria_string .= "(".$db_name." ".$c_op." ".$form_value.") OR ";

				# If the data type is a string
				# then we take the operators and
				# apply the corresponding
				# operation. For example, != is ne,
				# > is gt, etc.

		} else { # $c_type is a string. $c_op is something other than =.

			$criteria_string .= "(".$db_name." ".$c_op." ".$form_value.") OR ";

		}

	} # End of foreach $form_field

	$criteria_string = preg_replace("/ OR $/i", "", $criteria_string);


  } else { # End of case 2, Begin Case 3

				# Case 3: The data type is a string or string_equal
				#         and the operator is =. This is much more complex!

				# ENTIRE PHRASE MATCHING:
				# If the search string ($form_value) begins and ends with
				# a double quote " then we search for the entire phrase,
				# else we split the words by spaces (white-space character, "\s")
				# and search for each word individually.

	$word_list = array ();
	$entire_phrase_search = false;
	if (preg_match("/^\".*\"$/", $form_value) || preg_match("/string_equal/i", $c_type)) {
		$form_value = preg_replace("/^\"/", "", $form_value);   # Remove the beginning "
		$form_value = preg_replace("/\"$/", "", $form_value);   # Remove the trailing "
		$word_list[0] = $form_value;
		$entire_phrase_search = true;
	} else {
		$word_list = preg_split("/\s+/",$form_value);
	}

				# For each word, check/replace characters and
				# make sure the remaining is not equal to "".

	$new_word_list = array ();
	foreach ($word_list as $word)
	{
				# Replace any typical characters that the USER
				# might enter.  This is to avoid boundary word
				# logic confusion, EXACT MATCHING.

		$word = preg_replace("/^[\(\)\,\-\;\:\.\&\']/", "", $word); # Remove from beginning of word.
		$word = preg_replace("/[\(\)\,\-\;\:\.\&\']$/", "", $word); # Remove from ending of word.

				# Escape most of the REGEXP characters which might
				# be misunderstood as part of the REGEXP logic.
		$word = preg_quote($word);

				# Add to new word list if not equal to "".
				# This prevents phrase such as "dogs & cats", from
				# messing up the logic.

		if ($word != "") { $new_word_list[] = $word; }

	} # End of foreach


				# For each $word in @wordlist we search
				# the fields for a match.  (AND condition)

	$criteria_string = "(";

	foreach ($new_word_list as $word)
	{
				# '?' and '*' wildcards are switched later (below).

				# Escape any single quotes ('). This must be done
				# because the REGEXP below uses single quotes
				# to define the query expression.

		$word = preg_replace("/\'/", "\\\'", $word);

				# EXACT MATCHING / BOUNDARY WORD MATCHING:
				# If exact_matching "true" is to be performed then we add the
				# boundary strings to the REGEXP to limit the results.
				# If exact_matching "no" then we do nothing.

				# If double quotes were used around a phrase or word
				# ($entire_phrase_search = true), then search on boundary!

        $wc_leading = "";  # word class/character leading
        $wc_trailing = "";  # word class/character trailing

		if ( ( $c_exact_match && $exact_match ) || $exact_match || $entire_phrase_search) {
		   $wc_leading = '[[:<:]]';
		   $wc_trailing = '[[:>:]]';
		}

				# WILDCARD MATCHING:
				# Check for any leading or trailing wildcards.
				# Change * to .* and change ? to .?

		$word = preg_replace("/\*/", ".*", $word); # Switch * for .* (zero or more any char)
		$word = preg_replace("/\?/", ".?", $word); # Switch ? for .? (zero or one any char)

				# Replace [[:<:]].* and .*[[:<:]] combinations which
				# will basically add up to nothing, so remove these combinations.

		if (preg_match("/^\.\*/", $word) && $wc_leading == '[[:<:]]') {
			$wc_leading = "";    # Remove any boundary word constraint
			$word = preg_replace("/^\.\*/", "", $word);  # Remove any leading wildcard .*
		}
		if (preg_match("/\.\*$/", $word) && $wc_trailing == '[[:>:]]') {
			$wc_trailing = "";   # Remove any boundary word constraint
			$word = preg_replace("/\.\*$/", "", $word);  # Remove any leading wildcard .*
		}

				# SPECIAL BOOK GARDEN ADDITION:
				# Criteria Type: string_equal
				#
				# If criteria type is "string_equal" then 
				# we want to match the entire string without
				# and wildcards or boundary constraints

		if (preg_match("/string_equal/i", $c_type)) {
			$wc_leading = "\^";  # ^ matches beginning
			$wc_trailing = "\$"; # $ matches ending
			$word = preg_replace("/^\.\*/", "", $word);  # Remove any leading wildcard .*
			$word = preg_replace("/\.\*$/", "", $word);  # Remove any leading wildcard .*
		}


				# Again, we go through the fields in the
				# database which are searched for this 
				# particular criteria definition.
				# (OR condition for the fields)

		reset($criteria_fields);
		foreach ($criteria_fields as $db_name)
		{
				# Start to Add the criteria expression.
			$criteria_string .= "(";

				# CASE SENSITIVITY:
				# As of MySQL 3.23.43, REGEXP are case insensitive
				# for normal (NOT BINARY) strings. Check your version!
				# This script assumes that your current version
				# of MySQL treats REGEXP's as case insensitive!
				# For case sensitivity to function properly
				# your column types should be BINARY!

				# Different MySQL Versions or Unusual Column types
				# could effect the result of this REGEXP.
				# If $c_case_sensitive is not = "true" then we use the 
				# UPPER() function to make the search case insensitive.
				# $case_sensitive (FORM input) will override $c_case_sensitive!

			if (preg_match("/string_equal/i", $c_type)) {
				$criteria_string .= $db_name." = '".$word."'";
				
			} elseif ( ($c_case_sensitive && $c_case_sensitive) || $case_sensitive ) {
				# This is the CASE SENSITIVE REGEXP search (Only if BINARY string types!)
				$criteria_string .= $db_name." REGEXP '".$wc_leading.$word.$wc_trailing."'";
			} else {
				# This is the CASE IN-SENSITIVE REGEXP search
			$criteria_string .= "UPPER(".$db_name.") REGEXP UPPER('".$wc_leading.$word.$wc_trailing."')";
			}

		   $criteria_string .= ")  OR  ";

        } # End of foreach $db_index

    $criteria_string = preg_replace("/  OR  $/i", "", $criteria_string);
    $criteria_string .= ")  AND  (";

    } # End of foreach $word

  $criteria_string = preg_replace("/  AND  \($/i", "", $criteria_string);

  } # End of case 3


  return $criteria_string;


} # End of mysql_build_criteria


} // end of class


?>