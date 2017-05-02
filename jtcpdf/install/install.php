<?php
/**
* @package     jelix
* @subpackage  jtcpdf module
* @author      Laurent Jouanneau
* @contributor
* @copyright   2009-2017 Laurent Jouanneau
* @link        http://www.jelix.org
* @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
*/


class jtcpdfModuleInstaller extends jInstallerModule2 {

    function installEntrypoint(jInstallerEntryPoint2 $entryPoint) {
        $this->getConfigIni()->setValue('tcpdf', "jtcpdf~jResponseTcpdf", "responses");
        $this->getConfigIni()->setValue('tcpdf', "jtcpdf~jResponseTcpdf", "_coreResponses");
    }
}