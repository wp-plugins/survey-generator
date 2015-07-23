=== Survey Generator Plugin ===
Contributors: hallsey
Tags: survey, statistics, business
Requires at least: 3.7
Tested up to: 4.2
Stable tag: 1.0a
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The Survey Generator plugin Survey Generator gives you an easy way to generate, conduct, and summarize the results of custom surveys.

== Description ==

Would you like to be able to put surveys anywhere on your web pages? This survey generator gives you an easy way to do that. And why would you want surveys on your web pages? Here are some reasons:

* Let your visitors rate your services, your business, your employees.
* See if your readers find your articles helpful.
* Get reactions to your web changes before implementing them.
* Quiz your visitors on their preferences.
* Conduct anonymous surveys on any topic you want!

To use Survey Generator, you must first write up the questions and answers you want in your survey. This is your survey definition file, and how to format it is explained in the documentation.htm file. Then put the Survey Generator code where you want the survey form to appear on your web page. When someone visits that web page on your web site, Survey Generator shows the form for your survey. If your web visitor submits the form, Survey Generator saves the responses in CSV format, which Excel and other applications can open natively. Survey Generator can also summarize the responses to a survey and return the results as HTML tables.</p>

The Survey Generator plugin does not use a database but instead uses plain text files in ordinary Windows INI format to define each survey, its questions, the type of questions, the possible answers, etc. Responses to the survey are collected in files of the same name, except with the added file extension of `CSV`. CSV stands for "comma separated values" and is a format that Excel and other applications can open natively. Survey Generator is implemented as a shortcode you can use in your content, so you don't have to set up templates, custom page types, or anything like that.

To conduct a survey, use the shortcode `[survey_conduct "survey-sample"]`, where "survey-sample" is the path to the survey definition file called "survey-sample." The path can be absolute or path relative to your upload directory. When conducting a survey, Survey Generator creates the survey as an HTML form. If a user submits that form, Survey Generator saves the data from it to its corresponding CSV file.

To summarize a survey, use the shortcode `[survey_summarize "survey-sample"]`. A survey summary shows, for each section in the survey, a table with the number and percentage of responses. Summarizing surveys changes no data at all, so surveys can be summarized as desired.

You can also use Survey Generator in your template or theme code. Just call the function in the usual PHP fashion, that is, `survey_conduct('survey-sample')` and `survey_summarize('survey_sample')`.

== Installation ==

1. Create the directory `survey_generator` in your plugin directory.
2. Put these files in it.
   * survey-main.php
   * Survey.php
   * View.php
   * survey.js
   * survey.css
3. Optionally, put these files in your upload directory.
   * survey-sample
   * survey-sample.csv

That's it. Please read `documentation.htm` to learn about survey defintion files and more.

== Frequently Asked Questions ==

1. Can I send you a question?

Yes, of course, to rhallsey at yahoo dot com. I'll reply and add it to the FAQ.

== Changelog ==

= 1.0 =
* Here it is.

= 1.0a =
* Improvements (I hope) to the documentation.
* No code changes.
