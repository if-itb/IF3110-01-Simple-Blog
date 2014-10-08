<?php
/**
 * File untuk penanganan konfigurasi
 * Misanya environment, database
 */

/**
 * Value yang diperbolehkan:
 *		development
 *		testing
 *		production
 **/
$CONFIG['env'] = 'development';

/**
 * Alamat web home, tanpa tanda / di belakang
 */
$CONFIG['siteurl'] = 'http://localhost/IF3110-01-Simple-Blog';

/**
 * Database configuration
 */
$CONFIG['mysql']['database'] = 'IF3110-01-Simple-Blog';
$CONFIG['mysql']['host'] = 'localhost';
$CONFIG['mysql']['username'] = 'root';
$CONFIG['mysql']['password'] = '';