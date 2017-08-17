<?php

/**
 * @package KMA
 * @subpackage kstrap
 * @since 1.0
 * @version 1.2
 */

include('modules/social/sociallinks.php');
include('modules/testimonials/testimonials.php');
include('modules/layouts/Layouts.php');
include('modules/slider/Slider.php');
include('modules/leads/leads.php');
include('modules/team/Team.php');
include('modules/listings/BusinessListings.php');

$socialLinks = new SocialSettingsPage();
if (is_admin()) {
    $socialLinks->createPage();
}

$testimonials = new Testimonials();
$testimonials->createPostType();
$testimonials->createAdminColumns();
$testimonials->createShortcode();

$layouts = new Layouts();
$layouts->createPostType();
$layouts->createDefaultFormats();
//$layouts->createLayout('two-column','two column page layout','twocol'); //does not work?

$slider = new Slider();
$slider->createPostType();
$slider->createAdminColumns();

$team = new Team();
$team->createPostType();
$team->createAdminColumns();
$team->createShortcode();

$team = new BusinessListings();
$team->createPostType();
$team->createAdminColumns();
$team->createShortcode();

$leads = new kmaLeads();
$leads->createPostType();
$leads->createAdminColumns();
