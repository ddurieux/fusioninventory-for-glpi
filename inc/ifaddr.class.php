<?php
/*
 * @version $Id$
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2009 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

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
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: MAZZONI Vincent
// Purpose of file: modelisation of a networking switch ports
// ----------------------------------------------------------------------

if (!defined('GLPI_ROOT')) {
	die("Sorry. You can't access directly to this file");
}

/**
 * Class to use networking interface address
 **/
class PluginFusioninventoryIfaddr  extends PluginFusioninventoryCommonDBTM {
	/**
	 * Constructor
	**/
   function __construct() {
      parent::__construct("glpi_plugin_fusioninventory_networking_ifaddr");
   }

   /**
    * Add a new ifaddr with the instance values
    *
    *@param $p_id Networking ID
    *@return nothing
    **/
   function addDB($p_id) {
      if (count($this->ptcdUpdates)) {
         $this->ptcdUpdates['FK_networking']=$p_id;
         $this->add($this->ptcdUpdates);
      }
   }
}

?>