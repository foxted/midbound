
/*
 |--------------------------------------------------------------------------
 | Laravel Spark Components
 |--------------------------------------------------------------------------
 |
 | Here we will load the Spark components which makes up the core client
 | application. This is also a convenient spot for you to load all of
 | your components that you write while building your applications.
 */

require('./../spark-components/bootstrap');

require('./home');
require('./modal');

// Registration
require('./auth/registration');

// Guest
require('./guest/plans');

// Websites
require('./websites/install-website');

// Activity
require('./activity/activity');

