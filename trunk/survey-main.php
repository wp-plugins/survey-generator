<?php

/*
Plugin Name: Survey Generator
Description: Conduct custom surveys and summarize their responses.
Version:     1.0
Author:      Robert Hallsey (rhallsey@yahoo.com)
Author URI:  http://www.clicketyhome.com/survey
License:     GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined('ABSPATH') or exit('No direct access. This is a WordPress plugin.' );

define('DS', DIRECTORY_SEPARATOR);
define('SURVEY_BASE_PATH', str_replace(array('/', '\\'), DS, plugin_dir_path(__FILE__)));

include 'Survey.php';
include 'View.php';

add_shortcode('survey_conduct', 'survey_conduct');
add_shortcode('survey_summarize', 'survey_summarize');
add_shortcode('survey_name', 'survey_name');

add_action('init', 'survey_start_session', 1);
add_action('wp_logout', 'survey_end_session');
add_action('wp_login', 'survey_end_session');
add_action('wp_enqueue_scripts', 'survey_scripts');

function survey_start_session() {
	if (!session_id()) session_start();		
}

function survey_end_session() {
	session_destroy ();
}

function survey_scripts() {
	wp_register_style('survey', plugins_url('survey.css', __FILE__));
	wp_register_script('survey', plugins_url('survey.js', __FILE__));
	wp_enqueue_style('survey');
	wp_enqueue_script('survey');
}

function survey_conduct($given_survey) {
	$given_survey = $given_survey[0];
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$survey = new Survey(check_other_paths($given_survey));
		$survey->prepareSurvey();
		$_SESSION['survey_running'] = TRUE;
	}
	else { // must be POST
		if (!isset($_SESSION['survey_running'])) exit ('No running survey');
		$survey = new Survey($_POST['survey_file']);
		if ($survey->processSurvey($_POST['survey_save'], $_POST['survey_data']) == TRUE) {
			unset($_SESSION['survey_running']);
		}
	}
	echo $survey->theForm();
}

function survey_summarize($given_survey) {
	$given_survey = $given_survey[0];
	$survey = new Survey(check_other_paths($given_survey));
	$survey->prepareSummary();
	echo $survey->theSummary();
}

function check_other_paths($given_survey) {
	if (file_exists($given_survey)) return $given_survey;
	$upload_dir = wp_upload_dir();
	$test_file = $upload_dir['path'] . DS . $given_survey;
	if (file_exists($test_file)) return $test_file;
	$test_file = $upload_dir['basedir'] . DS . $given_survey;
	if (file_exists($test_file)) return $test_file;
	return $given_survey;
}

function survey_name($given_survey = '') {
	$given_survey = $given_survey[0];
	if (!file_exists($given_survey)) {
		$given_survey = check_other_paths($given_survey);
	}
	$survey = new Survey($given_survey);
	$line = '';
	if ($survey->loadSurveyFile() == '') {
		$file_handle = fopen($given_survey, 'r');
		$line = trim(fgets($file_handle), " ;\t\r\n\0\x0B");
		fclose($file_handle);
	}
	unset($survey);
	echo $line;
	return;
}
