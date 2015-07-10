=== Survey Generator Plugin ===
Contributors: hallsey
Tags: survey, statistics, business
Requires at least: 3.7
Tested up to: 3.7
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The Survey Generator plugin Survey Generator gives you an easy way to generate, conduct, and summarize the results of custom surveys.

== Description ==

The Survey Generator plugin does not use a database but instead uses plain text files in ordinary Windows INI format to define each survey, its questions, the type of questions, the possible answers, etc. Responses to the survey are collected in files of the same name, except with the added file extension of `CSV`. CSV stands for "comma separated values" and is a format that Excel and other applications can open natively. Survey Generator is implemented as a shortcode you can use in your content, so you don't have to set up templates, custom page types, or anything like that.

To conduct a survey, use the shortcode `[survey_conduct "survey-sample"]`. The file name supplied can have an absolute path or a path relative to your upload directory. When conducting a survey, Survey Generator creates the survey as an HTML form. If a user submits that form, Survey Generator saves the data from it to its corresponding CSV file.

To summarize a survey, use the shortcode `[survey_summarize "survey-sample"]`. A survey summary shows, for each section in the survey, a table with the number and percentage of responses. Summarizing surveys changes no data at all, so surveys can be summarized as desired.

== Installation ==

1. Create the directory `survey_generator` in your plugin directory.
2. Put these files in it.
   * survey_generator.php
   * script.js
   * style.css
3. Optionally, put these files in your upload directory.
   * survey-sample
   * survey-sample.csv

That's it. Please read `documentation.htm` to learn about survey defintion files and more.

== Frequently Asked Questions ==

1. Can I send you a question?

Yes, of course. I'll add it to the FAQ.


== Changelog ==

= 1.0 =
* Here it is.
