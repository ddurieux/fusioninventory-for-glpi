<?php
/*
 * @version $Id$
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copynetwork (C) 2003-2006 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org/
 ----------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: David DURIEUX
// Purpose of file:
// ----------------------------------------------------------------------

define('GLPI_ROOT', '../../..'); 

include (GLPI_ROOT."/inc/includes.php");

checkRight("printer","r");
PluginFusioninventoryAuth::checkRight("snmp_printers","r");

$printer_history = new PluginFusioninventoryPrintersHistory;

if ((isset($_POST['delete']))) {
	
	PluginFusioninventoryAuth::checkRight("snmp_printers","w");
	
	if (isset($_POST['limit'])) {
		for ($i=0 ; $i<$_POST['limit'] ; $i++) {
			if ((isset($_POST["checked_$i"])) && ($_POST["checked_$i"] == 1)) {
				if (isset($_POST["ID_$i"])) {
   				$input['ID'] = $_POST["ID_$i"];
            }
				$printer_history->delete($input);
			}
		}
	}
}

glpi_header($_SERVER['HTTP_REFERER']);

?>