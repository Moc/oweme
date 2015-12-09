<?php

/*
 * Owe Me! - an e107 plugin by Tijn Kuyper
 *
 * Copyright (C) 2015-2016 Tijn Kuyper (http://www.tijnkuyper.nl)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

if (!defined('e107_INIT')) { exit; }

$OWEME_TEMPLATE['start'] = '
<table class="table table-bordered table-hover">
	<thead>
		<tr>
		  	<th>{OWEME_H_ID}</th>
		  	<th>{OWEME_H_DATE}</th>
		  	<th>{OWEME_H_CATEGORY}</th>
		  	<th>{OWEME_H_AMOUNT}</th>
		  	<th>{OWEME_H_DESCRIPTION}</th>
		  	<th>{OWEME_H_DEBTOR}</th>
		  	<th>{OWEME_H_STATUS}</th>
		</tr>
	</thead>
    <tbody>
';

$OWEME_TEMPLATE['items'] = '	    
		<tr>
	    	<td>{OWEME_ID}</td>
	    	<td>{OWEME_DATE}</td>
	    	<td>{OWEME_CATEGORY}</td>
	    	<td>{OWEME_AMOUNT}</td>
	    	<td>{OWEME_DESCRIPTION}</td>
	    	<td>{OWEME_DEBTOR}</td>
	    	<td><span class="label {OWEME_STATUS_LABEL}">{OWEME_STATUS_NAME}</span></td>
    	</tr>
';

$OWEME_TEMPLATE['end'] = '
	</tbody>
</table>
';