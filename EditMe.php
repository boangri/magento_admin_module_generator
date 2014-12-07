<?php

$codePool = 'local';  // should be either 'local' or 'community'
$packageName = 'Boangri'; // Replace with your package name, e.g. 'Cyberhull'
$moduleName = "Chess"; // Replace with your module name

// This header will be included in all the generated files.
// Edit it as appropriate.
//
$header = <<<EOT
/**
 * Behavioral Pricing ( @see #4618 )
 * 
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *    
 * @copyright Copyright (c) 2014 Cyberhull LLC (www.cyberhull.com)
 * @author Boris Gribovskiy (boris.gribovskiy@cyberhull.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)       
 */
/**
 * @category {{PACKAGE}}
 * @package {{PACKAGE}}_{{MODULE}} 
 */
        
EOT;

